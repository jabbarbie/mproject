<div class="card card-outline card-warning collapsed-card ">
  <div class="card-header bg-primary">
      <h3 class="card-title">Pencarian</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
  </div>
  
  <div class="card-body">
      <form class="form-horizontal forms" action="">

        <div class="row">
          <div class="col-sm-5">

            <div class="form-group row">
              <label for="inputKode" class="col-sm-4 col-form-label">Kategori</label>
              <div class="col-sm-6">                
                <select name="id_kategori" id="sid_kategori" class="form-control"> 
                    <option value="">Semua Kategori</option>
                    <?php foreach($kategori as $r): ?>
                        <option value="<?= $r['id_kategori'] ?>">
                            <?= $r['kategori'] ?>
                        </option>
                    <?php endforeach; ?>
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

            <!-- <div class="form-group row">
              <label for="inputUnit" class="col-sm-5 col-form-label">Unit</label>
              <div class="col-sm-6">
                <input type="text" name="unit" class="form-control form-control-sm" id="inputUnit" placeholder="Unit">
              </div>
            </div> -->
          
          </div>
        </div>

      
      
      </form>
      <!-- endForm -->
  </div>
</div>