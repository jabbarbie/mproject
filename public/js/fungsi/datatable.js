import page from './info.js'
class dtable{
  muat(){
    console.log(page.currentPage)
    this._data = $("#dtable").DataTable({
      "autoWidth" : true,
    //   "columnDefs": [
    //           { width: '8%', targets: -1 }
    //       ],

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

      // "dom" : '<"toolbar">frtip', 
      // "bLengthChange" : false,
      dom: 'Bfrtip',
      buttons: [
        {
            text: '<i class="fas fa-file-excel"></i>', 
            extend: 'excel', 
            className: 'btn-success btn-sm mr-1'
        },
        {
          text: '<i class="fas fa-file-pdf"></i>', 
          extend: 'pdf', 
          className: 'btn-info btn-sm '
        }

        // 'excel'
      ]
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
