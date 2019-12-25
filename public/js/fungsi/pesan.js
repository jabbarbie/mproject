import { objectToArray, arrayToList } from './fungsi_kecil.js'
/* 
    * Params :  status code yg diterima dari respon http request
                keterangan singkat berupa string
*/
const Pesan = (status, keterangan) => {

    if(typeof(keterangan) == 'object')
    {
        let data = objectToArray(keterangan)
        keterangan = arrayToList(data)
    }

    console.log(keterangan);
    
    const setx = { color : 'warning', title : 'warning', icon : ''}
    switch (status) {
        case 202:
            setx.color  = 'bg-success'
            setx.title  = 'Success'
            setx.icon   = 'fas fa-check'
            break;
        default:
            setx.color  = 'bg-danger'
            setx.title  = 'Error'
            setx.icon   = 'far fa-times-circle'
            break;
    }

    $(document).Toasts('create', {
        class: `${setx.color} toast-top-right lebarNotif`, 
        title: setx.title,
        subtitle: '',
        body: keterangan,
        icon: setx.icon,
        // delay: 7000,
        // autohide: true
    })    
}

/*
    * Params : Object key, id dari input form dengan format inamaid
*/
function inputWarning(data)
{
    Object.keys(data).forEach(errorMessage => {
        document.getElementById("i" + errorMessage).classList.add('is-invalid')						
    })
}

export { Pesan, inputWarning }