<div class="card card-outline">
  <div class="card-header bg-gradient-primary ">
      <h3 class="card-title">Informasi Agen</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
  </div>

  <div class="card-body">
    <!-- <div class="form-group row">
      <label class="col-sm-3 col-form-label"></label>
      <div class="col-sm-6">
        <p class="col-form-label">:<?= $data->nama_pemilik??'' ?></p>
      </div>
    </div> -->
    
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Nama Pemilik</label>
      <div class="col-sm-6">
        <p class="col-form-label">: <?= $data->nama_pemilik??'' ?></p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Alamat</label>
      <div class="col-sm-6">
        <p class="col-form-label">: <?= $data->alamat??'' ?></p>
      </div>
    </div>    
    <hr />
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Nama Usaha</label>
      <div class="col-sm-6">
        <p class="col-form-label">: <?= $data->nama_agen??'' ?></p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Jenis </label>
      <div class="col-sm-6">
        <p class="col-form-label">: <?= $data->nama_pemilik??'' ?></p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">No Telp </label>
      <div class="col-sm-6">
        <p class="col-form-label">: <?= $data->no_telp??'' ?></p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Alamat</label>
      <div class="col-sm-6">
        <p class="col-form-label">: <?= $data->alamat??'' ?></p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Guest Input</label>
      <div class="col-sm-6">
        <p class="col-form-label">: 
          <span class="badge badge-<?= $data->guest?'danger':'success' ?>">
          <?= $data->guest?'AGEN INI BERASAL DARI GUEST INPUT':'BUKAN GUEST INPUT' ?>
          </span>
        </label>
      </div>
    </div>
  </div><!-- end of cardbody -->

</div><!-- end of card -->

