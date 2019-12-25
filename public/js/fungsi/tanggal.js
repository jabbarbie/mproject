import page from './info.js'
import chart from './chart.js'
import { info } from './informasi.js'

/**
 * Untung menghandle pencarian periode di halaman dashboard
 */
function handleChart(opsi)
{
    let {start, end, pilihan} = opsi

    console.log("ok ada");
    
    if(pilihan == 'Custom Range'){
        $('#side_tanggal').html(start.format('MMMM') + ' - ' + end.format('MMMM YYYY'))

    }
    else{
        $('#side_tanggal').html(start.format('MMMM YYYY'))
    }
    // $('#side_tanggal').html(start.format('MMMM YYYY') + ' - ' + end.format('MMMM YYYY'))

      console.log(start.format('MMMM D, YYYY'), start.unix());
      
      // console.log(chart);
      chart.periode = new Object({'tanggal_mulai' : start.unix(), 'tanggal_akhir': end.unix()})
      chart.hancurkan()  
}

/**
 * Untuk menghandle pencarian periode di halaman table informasi
 */
function handleTable(opsi)
{
    let kirim = {
        start   : opsi.start.unix(),
        end     : opsi.end.unix(),
        pilihan : opsi.pilihan,
    }
    info(kirim)
    
}
export function tanggalrange()
{
  $('#daterange-btn').daterangepicker({
    ranges   : {
      // 'Hari Ini'    : [moment(), moment()],
      // 'Kemarin'     : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Bulan Ini'  : [moment().startOf('month'), moment().endOf('month')],
      'Bulan kemarin' : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end, pilihan) {
        let data = {start: start, end: end, pilihan: pilihan}

        if (page.currentPage == 'dashboard') handleChart(data)
        else if (page.currentPage == 'informasi') {
            if(pilihan == 'Custom Range'){
                $('#side_tanggal').html(start.format('MMMM') + ' - ' + end.format('MMMM YYYY'))
                $('#card_tanggal').html(start.format('MMMM') + ' - ' + end.format('MMMM YYYY'))
            }
            else{
                $('#side_tanggal').html(start.format('MMMM YYYY'))
                $('#card_tanggal').html(start.format('MMMM YYYY'))
            }
            handleTable(data)

        }
        else{
          // untuk yg selain chart / grafik
          if(pilihan == 'Custom Range'){
              $('#side_tanggal').html(start.format('MMMM') + ' - ' + end.format('MMMM YYYY'))
          }
          else{
              $('#side_tanggal').html(start.format('MMMM YYYY'))
          }
          
          $("#tanggal_mulai").val(start.unix())
          $("#tanggal_akhir").val(end.unix())
        }
  }) 
    
  
}