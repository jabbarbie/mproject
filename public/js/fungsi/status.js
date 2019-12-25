/**
 * Fungsi untuk menghandle status agen
 * mengambil semua status (AK, SPK...) sesuai user yg login
 * mengubah status (fetch)
 */
function getStatus(e)
{
    const currentStatus = e.currentTarget.options[0]
    console.log(currentStatus.value);
    
    fetch(`api/status/getstatusupdate/${currentStatus.value}`)
        .then(d => d.json())
        .then(res => {            
            if(res.data.length > 0)
            {
                res.data.forEach(r => {
                    if(r.id_status == currentStatus.value) return
                    const opsi = new Option(r.status, r.id_status)
                    opsi.className = `bg-${r.warna}`
                    e.currentTarget.options.add(opsi)
                });   
            }
        })
}
function ubahStatus(e)
{
    const  updateStatusto = e.currentTarget.value
    const  currentStatus = e.currentTarget.options[0].value
    const id_estimasi   = e.currentTarget.dataset.id
    const formDataKirim = new FormData()

    formDataKirim.append('id_estimasi', id_estimasi)
    formDataKirim.append('beforestatus', currentStatus)
    formDataKirim.append('afterstatus', updateStatusto)

    console.log(e.currentTarget.dataset.id);
    const opsi = {
        method: 'POST',
     	body	:  formDataKirim,

    }
    fetch('api/status', opsi)
    .then(d => d.json())
    .then(data => {
        console.log(data);
        
    })
}

export { getStatus, ubahStatus }