<form class="form-horizontal formx" action="<?= base_url('agen/create')?>" method="POST">  
<div class="row">
  <div class="col-sm-12">
    <div class="card card-outline">
      <div class="card-header bg-gradient-primary ">
          <h3 class="card-title">Form Input</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
      </div>

      <div class="card-body">
        <div class="form-group row">
          <label for="inputKode" class="col-sm-2 col-form-label">Nama Pemilik</label>
          <div class="col-sm-4">
            <input type="text" name="nama_pemilik" class="form-control col-8" autofocus id="inama_pemilik" placeholder="Nama Pemilik Agen Usaha">
          </div>

          <label for="inputKode" class="col-sm-2 col-form-label">MKS</label>
          <div class="col-sm-3">
            <select name="id_pegawai" id="iid_pegawai" class="select2 form-control">
                <?php foreach($pegawai as $c): ?>
                  <option value="<?= $c['id_pegawai']?>"><?= $c['nama_pegawai'] ?></option>
                <?php endforeach;?>
            </select>
          </div>
        </div>  
        <div class="form-group row">
          <label for="inputKode" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-4">
            <textarea name="alamat_pemilik" id="ialamat_pemilik" cols="30" rows="2" class="form-control col-10" placeholder="Alamat Rumah Pemilik Usaha"></textarea>
          </div>

          
          <label for="inputKode" class="col-sm-2 col-form-label">Cabang</label>
          <div class="col-sm-3">
            <select name="id_cabang" id="iid_cabang" class="select2 form-control">
              <?php foreach($cabang as $p): ?>
                <option value="<?= $p['id_cabang']?>"><?= $p['cabang'] ?></option>
              <?php endforeach;?>
            </select>
          </div>

        </div>
        <div class="form-group row">
          <label for="inputKode" class="col-sm-2 col-form-label">Nama Agen</label>
          <div class="col-sm-4">
            <input type="text" name="nama_agen" class="form-control " id="inama_agen" placeholder="Nama Toko / Agen Usaha">
          </div>

          <label for="inputKode" class="col-sm-2 col-form-label ">Tanggal</label>
          <div class="col-sm-4">
            <input type="text" name="tanggal" class="form-control tanggal col-5" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" id="inama_agen" placeholder="">
          </div>

        </div>
        <div class="form-group row">
          <label for="inputKode" class="col-sm-2 col-form-label">No Telp</label>
          <div class="col-sm-4">
            <input type="text" name="no_telp" class="form-control col-sm-8" id="ino_telp" placeholder="Nomor Telp">
          </div>

          <label for="guest" class="col-sm-2 col-form-label">Guest Input</label>
          <div class="col-sm-4">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="guest" name="guest">
                <label for="guest" class="custom-control-label text-danger" name="guest">Centang untuk menandai ini sebagai guest input, dan tidak akan dimasukkan ke dalam laporan maupun grafik</label>
              </div>
           </div>
        </div>
        <div class="form-group row">
          <label for="inputKode" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-4">
            <textarea name="alamat" id="ialamat" cols="30" rows="2" class="form-control" placeholder="Alamat Agen Usaha"></textarea>
          </div>
        </div>
      </div><!-- end of cardbody -->
      <div class="card-footer">
        <input type="submit" class="btn bg-gradient-primary col-1" value="Simpan">
        <input type="reset" class="btn bg-gradient-dark col-1" value="Reset">
      </div>

    </div><!-- end of card -->
  </div><!-- end of col -->
</div><!-- end of row -->

</form>
