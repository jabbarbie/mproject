'use strict'
import page from './fungsi/info.js'
import { objectFromFormData, objectToURL, formDataToJSON } from './fungsi/fungsi_kecil.js'

import { tanggalrange } from './fungsi/tanggal.js'
import dtable from './fungsi/datatable.js'
import laporandtable from './fungsi/laporan.js'
import setForm from './fungsi/form.js'
import { getStatus, ubahStatus } from './fungsi/status.js'
import { } from './fungsi/statusterkini.js'


// dashboard - grafik
import { info } from './fungsi/informasi.js'
import grafik from './fungsi/chart.js'


console.log(page.currentPage)
dtable.muat()
grafik.muat()
laporandtable.muat()
info()

$(".formx").submit(async function(e){
	console.log("Proses simpan");
    e.preventDefault()
    
	await setForm.post()
	await dtable.reset()
})

$(".forms").submit(async function(e){
	e.preventDefault()
	console.log("oke");
	
	let dataForm = new FormData(e.originalEvent.target)  
	dataForm.append('pencarian', true)

	dataForm.append('id_pegawai', 1)
	const data = objectFromFormData(dataForm)
  
	console.log(data);
	await dtable.pencarian(data)
	// dtable.ajax.reload()
	// await dtable.muat()
	await dtable.reset()
})

/**
 * Khusus Pencarian di laporan
 */
$(".forml").submit(async function(e){
	e.preventDefault()
	
	let dataForm = new FormData(e.originalEvent.target)  
	dataForm.append('pencarian', true)

	const data = objectFromFormData(dataForm)
  
	console.log(data);
	await laporandtable.pencarian(data)
	await laporandtable.reset()
})


// Ubah Status Agen
$("#dtable tbody").on('click','.status', function(e){
	if(e.currentTarget.options.length == 1) getStatus(e)
})
$("#dtable tbody").on('change','.status', async function(e){
	await ubahStatus(e)	
	await dtable.reset()

})

// Fungsi kecil
tanggalrange()


// laporan btn
$("#btnlaporan_pdf").on('click', function(e) {
	const form = document.querySelector(".forml")
	
	console.log(form)
	e.preventDefault()
	
	let dataForm = new FormData(form)  
	dataForm.append('pencarian', true)

	console.log(dataForm)
	const j = objectFromFormData(dataForm)
	const a = objectToURL(j)
	
	window.open(`${page.currentPage}/show/${a}`,'Laporan')
})
