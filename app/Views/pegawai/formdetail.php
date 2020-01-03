<div class="card card-outline">
  <div class="card-header bg-gradient-primary ">
      <h3 class="card-title">Informasi Pegawai</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
  </div>

  <div class="card-body">
    <?php
      // var_dump($data[0]['nama_pegawai']);
      // echo $data['nama_pegawai'];
    ?>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">NIK </label>
      <div class="col-sm-6">
        <p class="col-form-label">: <?= $data->nik??'' ?></p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Nama</label>
      <div class="col-sm-6">
        <p class="col-form-label">: <?= $data->nama_pegawai??'' ?></p>
      </div>
    </div>    
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Kategori</label>
      <div class="col-sm-6">
        <p class="col-form-label">: <?= $data->kategori??'' ?></p>
      </div>
    </div>
   

  </div><!-- end of cardbody -->

</div><!-- end of card -->

