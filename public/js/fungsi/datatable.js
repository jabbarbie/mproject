import page from './info.js'
class dtable{
  muat(){
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

      // "dom" : '<"toolbar">frtip' 
      // "bLengthChange" : false,
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
// // export dtablex = (pencarian) => {
// export function dtable(pencarian) {
//   // const dtable = $("#dataku")

//   // dtable.DataTable().clear().destroy();
//   $("#dataku").DataTable({
//     "fixedColumns": true,
//     "autoWidth" : true,
//     "columnDefs": [
//             { width: '8%', targets: -1 }
//         ],
//     "processing": true,
//     "serverSide": true,
//     "order": [],
//     // "ajax": {url: set.page + '/dtable', type: "POST"},
//     // "ajax": {url: `${set.page}/dtable`, type: "POST"},
//     "ajax": {url: `${page.currentPage}/dtable`, type: "POST", data: pencarian},
      
//     "language" : {
//       "emptyTable" : "Data tidak ditemukan",
//       "search": "Pencarian",
//     },
//     // "dom" : '<"toolbar">frtip' 
//     // "bLengthChange" : false,
//   });
// }
// // console.log(page.currentPage);
// export function dtable_laporan(rep){
//   $("#laporanku").DataTable().clear().destroy();
//   $("#laporanku").DataTable({
//     "paging":   false,
//     "ordering": false,
//     "info":     false,
//     "searching": false,
//     "order": [],

//     "processing": true,
//     "serverSide": true,
//     "ajax": {url: page.currentPage + '/dtable_laporan', type: "POST", data: rep},

//   });
// }

// export function buka(){
//   console.log("buka");
// }