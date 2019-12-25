<div class="card card-outline card-warning  ">
  <div class="card-header bg-primary">
      <h3 class="card-title">Form Data</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
  </div>
  <form class="form-horizontal formx" action='<?= base_url('cabang/create')?>' method="POST">  
  <div class="card-body">

        <div class="row">
          <div class="col-sm-5">

            <div class="form-group row">
              <label for="inputKode" class="col-sm-4 col-form-label">Kode</label>
              <div class="col-sm-6">
                <input type="text" name="kode_cabang" class="form-control " autofocus id="ikode_cabang" placeholder="Kode Cabang">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputCabang" class="col-sm-4 col-form-label">Cabang</label>
              <div class="col-sm-7">
                <input type="text" name="cabang" class="form-control " id="icabang" placeholder="Nama Cabang">
              </div>
            </div>                      
            
            
            
          </div>

          <div class="col-sm-5">

            <div class="form-group row">
              <label for="inputUnit" class="col-sm-5 col-form-label">Kabupaten / Kota</label>
              <div class="col-sm-7">
              <select name="id_kabupaten" id="iid_kabupaten" class="select2 form-control">
                <?php foreach($cabang as $c): ?>
                  <option value="<?= $c['id_kabupaten']?>"><?= $c['name'] ?></option>
                <?php endforeach;?>
              </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputUnit" class="col-sm-5 col-form-label">Unit</label>
              <div class="col-sm-6">
                <input type="text" name="unit" class="form-control " id="iunit" placeholder="Unit">
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