<div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i>Informasi!</h5>
                  Periode dan Target boleh dikosongkan, jika tidak diisi maka akan mengikuti <i>default</i> target dari masing-masing kategori.
                </div>
<div class="card card-outline card-warning  ">
  <div class="card-header bg-primary">
      <h3 class="card-title">Form Data</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
  </div>
  <form class="form-horizontal formx" action='<?= base_url('pegawai/create')?>' method="POST">  
  <div class="card-body">

        <div class="row">
          <div class="col-sm-5">

            <div class="form-group row">
              <label for="inputKode" class="col-sm-4 col-form-label">NIK</label>
              <div class="col-sm-6">
                <input type="text" name="nik" class="form-control " autofocus id="inik" placeholder="NIK">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputCabang" class="col-sm-4 col-form-label">Nama Pegawai</label>
              <div class="col-sm-7">
                <input type="text" name="nama_pegawai" class="form-control " id="inama_pegawai" placeholder="Nama Pegawai">
              </div>
            </div>                      
            
            
            
          </div>

          <div class="col-sm-5">

            <div class="form-group row">
              <label for="inputUnit" class="col-sm-5 col-form-label">Kategori</label>
              <div class="col-sm-7">
              <select name="id_kategori" id="iid_kategori" class="select2 form-control">
                <?php foreach($kategori as $k): ?>
                  <option value="<?= $k['id_kategori']?>"><?= $k['kategori'] ?> - <?= $k['default_target'] ?></option>
                <?php endforeach;?>
              </select>
              </div>
            </div>

     
          
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-5">

            <div class="form-group row">
              <label for="inputCabang" class="col-sm-4 col-form-label">Periode</label>
              <div class="col-sm-7">
                <input type="text" min="1" name="periode" class="form-control reservation opensleft" id="periode" >
              </div>
            </div>    

            <div class="form-group row">
              <label for="inputCabang" class="col-sm-4 col-form-label">Target</label>
              <div class="col-sm-7">
                <input type="text" min="1" name="target" class="form-control col-4" id="itarget" placeholder="Target Perolehan Agen">
              </div>
            </div>    

          </div>
        </div>

      
      
      <!-- endForm -->
  </div><!-- End of CardBody-->
  <div class="card-footer">
    <input type="submit" class="btn bg-gradient-primary col-1" value="Simpan">
    <input type="reset" class="btn bg-gradient-dark col-1" value="Reset">
  </div>
  </form>

</div>