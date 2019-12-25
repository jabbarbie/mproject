<div class="card card-outline card-warning collapsed-card ">
  <div class="card-header bg-gradient-primary">
      <h3 class="card-title">
        Pencarian
      </h3>
      <div class="card-tools">
        <!-- <button type="button" class="btn btn-outline-dark btn-sm" style="margin: -0.75rem 0">
          Tambah Data
        </button> -->
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>

        
      </div>
  </div>
  
  <div class="card-body">
      <form class="form-horizontal forms" action="">

        <div class="row">
          <div class="col-sm-5">

            <div class="form-group row">
              <label for="inputKode" class="col-sm-4 col-form-label">Kota / Kabupaten</label>
              <div class="col-sm-6">
                <select name="id_kabupaten" id="iid_kabupaten" class="select2 form-control">
                    <option value="">Semua Kota</option>
                  <?php foreach($cabang as $c): ?>
                    <option value="<?= $c['id_kabupaten']?>"><?= $c['name'] ?></option>
                  <?php endforeach;?>
                </select> 
              </div>
            </div>

                   
            <div class="form-group row">
              <label for="inputAgen" class="col-sm-4 col-form-label"></label>
              <div class="col-sm-3">
                <input type="submit" class="btn btn-block bg-gradient-warning btn-sm" value="Cari">
              </div>
            </div>                

          </div>

          <div class="col-sm-5">

          
          
          </div>
        </div>

      
      
      </form>
      <!-- endForm -->
  </div>
</div>