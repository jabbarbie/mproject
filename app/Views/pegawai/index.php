<?php $this->extend('template/index') ?>
<?php $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
      <?php echo $this->include('pegawai/pencarian') ?>      
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">
                <i class="far fa-calendar-alt mr-1"></i>
                <!-- Periode :  -->
                <span class='card-judul'>
                    Data Pegawai
                </span>
            </div>

            <div class="card-tools">
                
                <a href="<?= base_url('pegawai/new')?>" type="button" class="btn btn-sm bg-gradient-primary" style="margin: -.75rem 0" title="Tambah Data">
                  Tambah Data
                </a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
            </div>

          </div>
          <div class="card-body">
            <table class="table" id="dtable">
                <thead>
                  <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th width="15%">Target</th>
                  </tr>
                </thead>
              
              </table>
          </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
