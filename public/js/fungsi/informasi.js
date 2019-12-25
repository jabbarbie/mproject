import page from './info.js'
function warna(angkaPersen)
{
    if(angkaPersen < 50)
        return 'danger'
    else if(angkaPersen >= 50 && angkaPersen < 70 )
        return 'warning'
    else 
        return 'success'
    // else 
    //     return 'dark'
}
function tambahRow(data)
{
    let namaTable = document.querySelector("#tb_informasi tbody")
    namaTable.innerHTML = ""

    let jumlah = 0
    let memenuhi = 0
    let tidakmemenuhi = 0
    let persentidak = 0
    let perseniya = 0

    data.forEach((r,i) => {
        // console.log(r);
        // let jumlahdata = r.data.length
        
        r.data.forEach((d,ii) => {
            let target = d.target | d.default_target
            let persen = ((d.jumlah / target) * 100)
            let gap = (target - d.jumlah)

            // untuk keperluan badge
            jumlah += parseInt(d.jumlah)
            if(target > parseInt(d.jumlah)){
                tidakmemenuhi++
            }else{
                memenuhi++
            }
            //

            let tr = document.createElement("tr")
            let no = document.createElement("td")
            no.appendChild(document.createTextNode(i+1))

            let cabang = document.createElement("td")
            cabang.appendChild(document.createTextNode(r.cabang))
            if(r.jumlah > 1)
            {
                no.setAttribute('rowspan', (r.jumlah-1))
                cabang.setAttribute('rowspan', (r.jumlah-1))
            }
            
    
            // subrow
            let tdmks = document.createElement("td")

            tdmks.appendChild(document.createTextNode(d.nama_pegawai))


            let tdtarget = document.createElement("td")
            tdtarget.appendChild(document.createTextNode(target))
            if((d.target)){
                tdtarget.className = 'text-primary'
            }
            let tdrealisasi = document.createElement("td")
            tdrealisasi.appendChild(document.createTextNode(d.jumlah))

            let tdpersen = document.createElement("td")
            let badgepersen = document.createElement("span")
            badgepersen.appendChild(document.createTextNode(persen + '%'))
            badgepersen.className = 'badge badge-' + warna(persen)
            tdpersen.appendChild(badgepersen)


            let tdgap = document.createElement("td")
            tdgap.appendChild(document.createTextNode(gap))

            // Hanya yg data pertama yg akan ditampilkan rowspan
            if (ii == 0){
                tr.appendChild(no)
                tr.appendChild(cabang)
            }

            // Sub Row
            
            tr.appendChild(tdmks)
            tr.appendChild(tdtarget)
            tr.appendChild(tdrealisasi)
            tr.appendChild(tdpersen)
            tr.appendChild(tdgap)

            namaTable.appendChild(tr)

        })        

    })
    return {
        'jumlah' : jumlah,
        'memenuhi' : memenuhi,
        'tidakmemenuhi' :  tidakmemenuhi,
    }

}
export function info(periode = undefined)
{
    if (page.currentPage != 'informasi') return 
    // console.log(periode);
    console.log(typeof(periode));
    
    const formDataKirim = new FormData()
    if ( typeof(periode) == 'object' ) {   

        const { start, end}  = periode

        console.log('ada pencarian');
        console.log(periode);
        

        formDataKirim.append('tanggal_mulai', start)
        formDataKirim.append('tanggal_akhir', end)
    }
    const opsi = {
        method: 'POST',
        body: formDataKirim
    }

    fetch('api/informasi', opsi)
        .then(j => j.json())
        .then(d => {
            const data = d.data

            // sort cabang berdasarkan count dari data 
            // const dataSort = data.sort((a, b) => {
            //     return b.data.length - a.data.length
            // })
            // return dataSort
            return data
        })
        .then(data => {
            return tambahRow(data)
        })
        .then(badge => {
            console.log(badge);

            const labelbadge = document.querySelectorAll(".txt_jumlah")
            
            labelbadge[0].textContent = badge.jumlah + ' Agen'
            labelbadge[1].textContent = badge.memenuhi + ' Pegawai'
            labelbadge[2].textContent = badge.tidakmemenuhi + ' Pegawai'

            const persenbadge = document.querySelectorAll(".txt_persen")

            
        })

}
function kategori(kode_kategori)
{
    if(kode_kategori == 1) return 'Teal'
    if(kode_kategori == 2) return 'Navy'
    if(kode_kategori == 3) return 'Orange'
    return 'secondary'
}