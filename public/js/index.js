'use strict'
import page from './fungsi/info.js'
import { objectFromFormData } from './fungsi/fungsi_kecil.js'

import { tanggalrange } from './fungsi/tanggal.js'
import dtable from './fungsi/datatable.js'
import laporandtable from './fungsi/laporan.js'
import setForm from './fungsi/form.js'
import { getStatus, ubahStatus } from './fungsi/status.js'
import { } from './fungsi/statusterkini.js'


// dashboard - grafik
import { info } from './fungsi/informasi.js'
import grafik from './fungsi/chart.js'

dtable.muat()
grafik.muat()
laporandtable.muat()
info()

$(".formx").submit(async function(e){
	console.log("Proses simpan");
    e.preventDefault()
    
	await setForm.post()
	// await dtable.reset()
})

$(".forms").submit(async function(e){
	e.preventDefault()
	console.log("oke");
	
	let dataForm = new FormData(e.originalEvent.target)  
	dataForm.append('pencarian', true)
	const data = objectFromFormData(dataForm)
  
	console.log(data);
	await dtable.pencarian(data)
	// dtable.ajax.reload()
	// await dtable.muat()
	await dtable.reset()
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
