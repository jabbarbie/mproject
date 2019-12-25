import page from './info.js'

function tambahRow(data)
{
    let namaTable = document.querySelector("#tb_informasi")
    
    data.forEach((r,i) => {
        console.log(r);
        let tr = document.createElement("tr")
        let no = document.createElement("td")
        no.appendChild(document.createTextNode(i+1))
       
        let cabang = document.createElement("td")
        cabang.appendChild(document.createTextNode(r.cabang))

        let mks = document.createElement("td")
        let ulmks = document.createElement('ol')
        r.data.forEach(d => {
            
            // ulmks.appendChild(document.createElement('li'))
            let ullimks = document.createElement("li")
            ullimks.appendChild(document.createTextNode(d.nama_pegawai))
            ulmks.appendChild(ullimks)
        })
        mks.appendChild(ulmks)
        
        // let tr = document.createElement("tr")
        // let no = document.createElement("td")
        // no.appendChild(document.createTextNode(i+1))
       
        // let cabang = document.createElement("td")
        // cabang.appendChild(document.createTextNode(r.cabang))

        // let mks = document.createElement("td")
        // let ulmks = document.createElement('ol')
        // r.data.forEach(d => {
        //     // ulmks.appendChild(document.createElement('li'))
        //     let ullimks = document.createElement("li")
        //     ullimks.appendChild(document.createTextNode(d.nama_pegawai))
        //     ulmks.appendChild(ullimks)
        // })
        // mks.appendChild(ulmks)

        // kalau menggunakan field tersusun
        // Object.values(r).forEach(e => {
        //     let td = document.createElement("td")
        //     let text = document.createTextNode(e)
        //     td.appendChild(text)
        //     tr.appendChild(td)            
        // })
         
        // r.each
        // let dataObject.entries(r)
        tr.appendChild(no)
        tr.appendChild(cabang)
        tr.appendChild(ulmks)
        namaTable.appendChild(tr)
    })

}
function info()
{
    const tbinfo = document.getElementById('tb_informasi')
    fetch('api/informasi')
        .then(j => j.json())
        .then(d => {
            const data = d.data

            // sort cabang berdasarkan count dari data 
            const dataSort = data.sort((a, b) => {
                return b.data.length - a.data.length
            })
            return dataSort
        })
        .then(data => {
            tambahRow(data)
        })

}

// -------------------------- //
if (page.currentPage == 'informasi')
{
    // export default info
    info()
}