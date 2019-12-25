import page from './info.js'
import { formDataToJSON } from './fungsi_kecil.js'
import { Pesan, inputWarning } from './pesan.js'
// import { singleEdit } from './cabang.js'

class Formx {
	constructor(){
		// this._action= null
		// this.url = null
		// this.method = 'POST'
	}
	post(){
		const formData = document.querySelector(".formx")
		const formDataKirim = new FormData(formData)
        
        // console.log(formDataToJSON(formDataKirim))
		if(!isNaN(this._id)){
			formDataKirim.append(`id_${page.currentPage}`, this._id)
		}
		// console.log(new URLSearchParams(formDataKirim).toString());
		const opsi = {
			method	: 'POST',
			body	:  formDataKirim,
            // body	:  formDataToJSON(formDataKirim),
            // body     : new URLSearchParams(formDataKirim).toString(),
			// headers: {
            // 	'Content-Type': 'application/json',
        	// },
		}
		// return false;
		// console.log(opsi)
        // fetch(`${page.currentPage}/create`, opsi)
        fetch(formData.action, opsi)
        // .then(d => {
		// 	console.log(d)
		// })
        .then(d => d.json())
		.then(data => {
			console.log(data);
			
			Pesan(data.status, data.data)

			if(data.status != 202){
				inputWarning(data.data)
			}else{
				$("input").removeClass("is-invalid")
				formData.reset()
			}
		 		// resetFormClass()
			 	// if (typeof data.message == 'object'){
			 	// 	// console.log(data);
			 	// 		Object.keys(data.message).forEach(id => {
				// 		$(`.formx [name=${id}]`).addClass("is-invalid");
				// 		// $(`.formx [name=${id}]`).addClass("is-invalid").parent().append(data.message[id]);
				// 				})
			 	// 	throw "Data Tidak Lengkap"
			 	// 	// console.log(data);

			 	// 		// Pesan.gagal()	 		
			 	// 	// throw "Data Kurang Lenkap" + page.currentPage
			 	// }
			 	return 1
		 })
		//  .then(() => {
		//  	console.log(this._id);
		// 	 if(isNaN(this._id) || this._id == null){
		// 	 		console.log("masuk tambah " + this._id);
  		// 		// tambah
		// 	 		// resetForm()
		// 	 		setTimeout( function(){
		// 				window.location.href = 'google.com'
		// 			}, 1500)

		// 	 }else{
  		// 		$(page.modal).modal("hide") 		
		// 	 	console.log("masuk edit");
		// 	 }
        //  })
         .catch(e => {
			 	console.log(e);
		 })
	}	 
	set isTab(tab = true){
		if (document.querySelector(".formx").dataset.tipe === 'undefined') {
			return false
		}
	}
	set(formOpsi){
		if(typeof formOpsi == 'object'){		
		console.log(formOpsi);	
			this._id = formOpsi.id
			this._action= 'Edit'
		}
		else if(typeof formOpsi == 'boolean'){
			this._id = null
			this._action= 'Tambah'
		}

		// console.log(this._id);
		// document.getElementById('bukaModalLabel').innerHTML = `${this._action} 	${page.currentPage}`
	}
	edit(id, isTab = false){
		this._id = id
		console.log("idnya jadi ", this._id)
		// console.log("fungsi edit dijalankan", this._id);
		// return false
		// console.log(this._action,this._id);
			// const tab = (document.getElementsByClassName("tab").length > 0)?true:false
		// const opsi = {
		// 	method 	: 'POST',
		// 	body	: 
		// }
		console.log(`${page.currentPage}/get_where/${id}`);
		fetch(`${page.currentPage}/get_where/${id}`)
		.then(d => { return d.json() })
		.then(data => {
			console.log(data)
			const primaryKey = data[`id_${page.currentPage}`]
			
			Object.keys(data).forEach(kolom => {
				let value = data[kolom]
      			$(`[name=${kolom}]`).val(value)
			})
			
			if(isTab){
				let id_tab = document.getElementById("dataku_tab").dataset.id 
				let api = document.getElementById("dataku_tab").dataset.api
 				// function function singleEdit(pk, url, pk_kolom){

				console.log(id_tab, data[id_tab],api);
				singleEdit(data[id_tab], api, id_tab) 
			}
			
			return primaryKey
		})
		.then(pk => {
	    $(page.modal)
		    .attr("data-id", pk)
	    	.attr('data-tipe','Ubah ' + page.currentPage)
	    	.modal("show")    
			})
		.catch(e => {
			console.error(e);
		})
	}
	hapus(id_primary){
		// console.log("id priamry " + id_primary);
		// return id_primary
		let data = new FormData()
		data.append("id", id_primary)
		const opsi 	= {
			method: 'POST',
			body	: data

		} 
		return fetch(`${page.currentPage}/hapus`, opsi)
		
	}
}

export default new Formx()