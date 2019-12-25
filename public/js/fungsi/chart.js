'use strict'
import page from './info.js'
class FormatChart {
    construct()
    {        
        this.semuaChart = new Array
    }
    /**
     * Untuk mengubah canvas menjadi grafik
     * @params : element dari masing2 kotak 
     * Pengganti ID element  
     */
    chart()
    {
        // if ( el == null ) return 
        // return false
        var ctx = document.getElementById('grafikke' + this.grafikke).getContext('2d');
        // var ctx = el.getContext('2d');
        const a = new Chart(ctx, {
            type: 'bar',
            data: this.dataset(),
            options: {
                maintainAspectRatio: false,
                tooltips           : {
                    mode     : mode,
                    intersect: intersect
                    },
                hover              : {
                    mode     : mode,
                    intersect: intersect
                },
                responsive: true,
                // legend untuk keterangan target / realisasi
                legend: {
                    display: false,
                    position: 'right',
                    labels: {
                        boxWidth : 15,
                        fontSize: 11
                    },
                },
                //
                // scale yAxes - xAxes
                scales: {
                    yAxes: [{
                        gridLines: {
                            display      : true,
                            lineWidth    : '4px',
                            color        : 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                return (parseInt(value) === value) ? value : '';
                            }
                           
                            }, ticksStyle)
                    }],
                    xAxes: [{
                        display  : true,
                        gridLines: {
                            display: false
                        },
                        ticks    : ticksStyle
                    }],
                }
            }
        }
        
    )
    this.semuaChart.push(a)
    } // end of function chart

}
/**
 * Urutan pemanggilan
 * 1. Muat()
 * 2. Info() => API / GET DATA... menghasilkan datasex (sebudah data yg akan digunakan untuk dataset exp.. label, realisasi, target) 
 * 3. Sekotak => Perulangan yg mengirimkan el / element dari masing2 canvas, sekaligus mengubah nama cabang dan jumlah agen
 *      Loop - Chart => Membuat / mengubah canvas menjadi grafik sesuai element yg dikiirm dari sekotak
 *                  - Chart - Dasatset sesuai this.grafikke yg didapat di perulangan sekotak 0,1,2,3
 */
class Grafik  extends FormatChart{

    /**
     * Constructor
     * Set variable awal
     */
    clearkotak()
    {
        const kotaks = document.querySelectorAll(".clsgrafik")
        for (let index = 0; index < kotaks.length; index++) {
            console.log("kotak ke", index);

            const namaCabang = kotaks[index].children[0].children[0].children[0].children[0]
            const jumlah = kotaks[index].children[0].children[0].children[0].children[1]

            namaCabang.textContent = ''
            jumlah.textContent = ''

            if (kotaks[index].children[2]) return 
            let tunggu = document.createElement('div')
            tunggu.className = 'overlay'
            let i = document.createElement('i')
            i.className = 'fas fa-2x fa-sync-alt'
            tunggu.appendChild(i)

            kotaks[index].append(tunggu)


        }

    }
    async sekotak()
    {
        const kotaks = document.querySelectorAll(".clsgrafik")
        // console.log(kotaks);
        this.clearkotak()
        for (let index = 0; index < kotaks.length; index++) {
            const namaCabang = kotaks[index].children[0].children[0].children[0].children[0]
            const jumlah = kotaks[index].children[0].children[0].children[0].children[1]


            if(!this.datasetx[index]) return

            // hapus loading
            if (kotaks[index].children[2]) kotaks[index].children[2].remove() 
             
            const cabang = kotaks[index].children[1].children[0].children[1]
            // console.log(cabang);
            cabang.setAttribute("id", "grafikke" + index)
            


            
            namaCabang.textContent = this.datasetx[index][0]
            jumlah.textContent = `Jumlah agen ${this.datasetx[index][1]} `

            this.grafikke = index
            // await this.
            await this.chart()
            // console.log(index);
            //mencari element canvas sesuai class card
            

            // await this.chart(cabang)
            // console.log(cabang);
            
        }
    }
    constructor()
    {
        super()
        // this.label = new Array()
        // this.realisasi = new Array()
        // this.target  = new Array()
        this.datasetx = new Array
        this.grafikke = 1     
        this.periode = new Object  
        this.semuaChart=  new Array
    }
    async muat()
    {
        if( page.currentPage != 'dashboard' ) return false;

        this.reset()
        await this.info()   
        await this.sekotak()

        // console.log(this.g);
        
    }
    reset()
    {
        // console.log(this.semuaChart);
        if(this.semuaChart.length > 0)
        {
            this.semuaChart.forEach((r, i) => {
                // console.log(r);

                // r.clear() // pertama hilang, dan jika dihover akan muncul kembali grafiknya 
                // r.reset() // kebalikan dari clear
                r.destroy() // hilang permanent
                
            })
        }
        
    }
    /**
     * Fetch : Ambil semua data dari api 
     * Kalau bisa cukup 1x fetch data saja
     * Baru didistribusikan ke kotak/cabang yg lain
     * Data
     *  - Cabang
     *    - nama cabang
     *      - Target
     *      - Realisasi
     *      - Nama Pegawai
     * 
     */
    async info()
    {
        console.log(this.periode);
        
        const semuacabang = new Array
        const formDataKirim = new FormData()

        if ( ! isNaN(this.periode.tanggal_mulai) ) {
            console.log(this.periode);
            
            formDataKirim.append('tanggal_mulai', this.periode.tanggal_mulai)
            formDataKirim.append('tanggal_akhir', this.periode.tanggal_akhir)
        }
        const opsi = {
            method: 'POST',
            body: formDataKirim
        }
        const respond = await fetch('api/informasi', opsi)
        const j =   await respond.json()
        
        
        j.data.forEach((c,i) => {            
            const cabang = new Array
            cabang.push(c.cabang)
            cabang.push(c.jumlah)

            const terape = new Array


            const subpegawai    = new Array
            const subrealisasi  = new Array
            const subtarget     = new Array

            c.data.forEach(pegawai => {

                subpegawai.push(pegawai.nama_pegawai)
                subrealisasi.push(pegawai.jumlah)
                subtarget.push(!isNaN(pegawai.target)?pegawai.default_target:pegawai.target)

            })
            terape.push(subpegawai)
            terape.push(subrealisasi)
            terape.push(subtarget)

            cabang.push(terape)
    
            semuacabang.push(cabang)
       
        });
        this.datasetx = semuacabang
    }
    /**
     * Dataset
     */
    dataset()
    {
        // console.log("dataset");
        
        // console.log(this.label);
        // console.log(this.realisasi);
        // console.log(this.target);
        // console.log(this.label);
        
        // console.log(this.getdata().label);
        
        return {
            labels     : this.datasetx[this.grafikke][2][0],
            // labels  : ['Fauzi', 'Jabbar', 'Apri', 'Surya', 'Randy', 'Daindra', 'Faisal'],
            // labels  : this.label,
            // labels  : this.label,
            datasets: [
            {
                label               : 'Realisasi',
                backgroundColor     : '#007bff',
                borderColor         : '#007bff',
                // data                : [1,1],
                data                : this.datasetx[this.grafikke][2][1]
            },
            {
                label               : 'Target',
                backgroundColor     : 'rgba(210, 214, 222, 1)',
                borderColor         : 'rgba(210, 214, 222, 1)',
                data                : this.datasetx[this.grafikke][2][2]

                // data                : this.target
            },
            ]
        }
        // return data
    }

    /**
     * Index
     */
    async hancurkan()
    {
        // console.log(isNaN(this.periode.tanggal_mulai));
        
        await this.reset()
        await this.info()
        await this.sekotak()

        console.log(this.semuaChart);
        
        return
        await this.reset()
        // this.periode = 11
        // await this.info()
        // await this.dataset()

        await this.muat()
        // console.log(this.datasetx);
        
        // this.g[0].config.data.labels = [10,5]
        // this.g[0].config.data.labels = this.datasetx[1][2][1]
        // console.log(this.datasetx[1][2][1]);
        // console.log(this.g[0].config.data.labels);
        

        // console.log(this.g);
        // tinggal cari cara buat mindahin hasil fetch ke dalam dataset grafiknya
        this.datasetx.forEach((r,i) => {
            // console.log(r);
            this.g[i] = r[i]
            // this.g[i].update() 
            console.log(this.g[i]);
            
        })
        this.g.forEach((r, i) => {
            this.g[i].update()
        })


        // this.g[0].update()

    }
}

var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }
var mode      = 'index'
var intersect = true



async function index()
{
    // await info()
    // document.getElementById("kotak1").onload = ab()
    // ab().ctx.update({
    //     duration: 800,
    //     easing: 'easeOutBounce'
    // })
    
}
export default new Grafik()
