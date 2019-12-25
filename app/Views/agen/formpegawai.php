<div class="card card-outline">
  <div class="card-header bg-gradient-maroon ">
      <h3 class="card-title">Informasi Pegawai</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
  </div>

  <div class="card-body">       
    <div class="form-group row">
      <label class="col-sm-5 col-form-label">Diinput oleh</label>
      <div class="col-sm-6">
        <p class="col-form-label"><?= $user_id??'' ?></p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-5 col-form-label">Pada tanggal</label>
      <div class="col-sm-6">
        <p class="col-form-label"><?= $data->created_at??'' ?></p>
      </div>
    </div>

    <hr>
    <div class="form-group row">
      <label class="col-sm-5 col-form-label">Pegawai</label>
      <div class="col-sm-6">
        <p class="col-form-label"><?= $data->nama_pegawai??'' ?></p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-5 col-form-label">Kategori</label>
      <div class="col-sm-6">
        <p class="col-form-label"><?= $data->kategori??'' ?></p>
      </div>
    </div>
    
    <br />
    <div class="form-group row">
      <label class="col-sm-5 col-form-label">Cabang</label>
      <div class="col-sm-6">
        <p class="col-form-label"><?= $data->cabang??'' ?></p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-5 col-form-label">Unit</label>
      <div class="col-sm-6">
        <p class="col-form-label"><?= $data->unit??'' ?></p>
      </div>
    </div>

  </div><!-- end of cardbody -->

</div><!-- end of card -->



