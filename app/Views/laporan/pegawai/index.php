<?php $this->extend('template/index') ?>
<?php $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
      <?php echo $this->include('laporan/pegawai/pencarian') ?>      
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <table class="table" id="laporandtable">
                <thead>
                  <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th width="20%">Jumlah Agen</th>
                  </tr>
                </thead>
              
              </table>
          </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
