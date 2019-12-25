class status {
    pegawaiku(){
        this.query("side_pegawai","api/statusterkini/totalpegawai")       
    }
    cabang(){
        this.query("side_cabang","api/statusterkini/totalcabang")       
    }
    agen(){
        this.query("side_agen","api/statusterkini/totalagen")       
        this.query("side_agen","api/statusterkini/totalStatusAK","danger")       
    }   
    query(id, url, warna = "primary")
    {        
        fetch(url)
        .then(d => d.json())
        .then(dd => {

            var menunya = document.getElementById(id)

            var j = document.createElement("span")
            j.className = `badge badge-${warna} right`
            j.appendChild(document.createTextNode(dd.data))
    
            menunya.appendChild(j)

        })
        return true
       
    }
}
const index = async () => {
    const a = new status()

    await a.cabang()
    await a.pegawaiku()
    await a.agen()
}

index()
export default {}