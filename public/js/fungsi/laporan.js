import page from './info.js'
class dtable{
  muat(){
    this._data = $("#laporandtable").DataTable({
      "autoWidth" : true,
      // "paging":   false,
      // "ordering": false,
      // "info":     false,
      "searching": false,
      "processing": true,
      "serverSide": true,
      "ordering":  false,
      // "ajax": {url: set.page + '/dtable', type: "POST"},
      "ajax": {url: `${page.currentPage}/dtable`, type: "POST", data: this._pencarian},        
      // "ajax": {url: `${page.currentPage}/dtable`, type: "POST"},        
      // "language" : {
      //   "emptyTable" : "Data tidak ditemukan",
      //   "search": "Pencariaxn",
      // },

      // dom: 'Bfrtip',
      // buttons: [
          // 'copy',
          // {
          //   text: 'Excel', 
          //   extend: 'excel', 
          //   className: 'bg-success'
          // },
          
          // {
          //   text: 'print', 
          //   extend: 'print'
          // },
          // {
          //   text: 'pdf',
          //   extend: 'pdf',
          //   messageTop: 'Pesan ini ada di atas',
          //   messageBottom: 'Pesan ini ada di bawah',
          //   title: 'Laporan Sate Kambing'
          // }
          // {
          //   text: 'Tambah Data',
          //   action: function(e){
          //     alert ('sate kambing')
          //   }
          // }
      // ]
    });
  }
  pencarian(dataPencarian){
    this._data.clear().destroy()
    this._pencarian = dataPencarian
    
    this.muat()
  }

  reset(){
    this._data.ajax.reload()
  }

}
export default new dtable()
