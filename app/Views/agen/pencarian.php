<div class="card card-outline card-warning collapsed-card">
  <div class="card-header bg-primary">
      <h3 class="card-title">Pencarian</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
  </div>
  
  <div class="card-body">
      <form class="form-horizontal forms" action="">
        <input type="hidden" name="tanggal_mulai" id="tanggal_mulai" />
        <input type="hidden" name="tanggal_akhir" id="tanggal_akhir" />

        <div class="row">
          <div class="col-sm-5">

            <div class="form-group row">
              <label for="inputKode" class="col-sm-4 col-form-label">Cabang</label>
              <div class="col-sm-6">
                <select name="id_cabang" id="sid_kabupaten" class="select2 form-control">
                  <option value="">Semua Cabang</option>
                  <?php foreach($cabang as $c): ?>
                    <option value="<?= $c['id_cabang']?>"><?= $c['cabang'] ?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="inputUnit" class="col-sm-4 col-form-label">Pegawai</label>
              <div class="col-sm-6">
                <select name="id_pegawai" id="sid_pegawai" class="select2 form-control">
                  <option value="">Semua Pegawai</option>
                  <?php foreach($pegawai as $c): ?>
                    <option value="<?= $c['id_pegawai']?>"><?= $c['nama_pegawai'] ?></option>
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

          <div class="col-sm-7">

            <div class="form-group row">
              <label for="inputUnit" class="col-sm-3 col-form-label">Periode</label>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-default btn-lg" id="daterange-btn">
                        <i class="far fa-calendar-alt" ></i> <span id="side_tanggal"><?= date('F Y') ?> </span>
                        <i class="fas fa-caret-down"></i>
                    </button>
                </div>
            </div>

            <div class="form-group row">
              <label for="inputUnit" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-3">

                  <select class="form-control" name="id_status" >
                    <option value="">Semua Status</option>
                    <?php foreach ($status as $key => $s): ?>
                      <option class="badge bg-<?= $s->warna?>"  value="<?= $s->id_status?>">
                        <?= $s->status ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>

            </div>

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