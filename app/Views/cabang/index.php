<?php $this->extend('template/index') ?>
<?php $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
      <?php echo $this->include('cabang/pencarian') ?>      
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
                    Data Cabang
                </span>
            </div>

            <div class="card-tools">
                
                <a href="<?= base_url('cabang/new')?>" type="button" class="btn btn-sm bg-gradient-primary" style="margin: -.75rem 0" title="Tambah Data">
                  Tambah Data
                </a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
            </div>

            <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div> -->
            <!-- <div class="d-flex justify-content-between">
                <h3 class="card-title">Sales</h3>
                <a href="javascript:void(0);">View Report</a>
            </div> -->
        </div>
            <div class="card-body">
              <table class="table" id="dtable">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Cabang</th>
                      <th>Unit</th>
                    </tr>
                  </thead>
                
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
