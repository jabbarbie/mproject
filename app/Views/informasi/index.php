<?php $this->extend('template/index') ?>
<?php $this->section('content') ?>
<?php echo $this->include('informasi/badge') ?>           


<div class="card ">
    <div class="card-body p-0" >
        <div class="card-header">
            <div class="card-title">
                <i class="far fa-calendar-alt mr-1"></i>
                <!-- Periode :  -->
                <span class='card-judul' id="card_tanggal">
                    <?= date('F Y') ?>
                </span>
            </div>

            <div class="card-tools">
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
        <?php echo $this->include('informasi/table') ?>           
    </div>

</div>

<?php $this->endSection() ?>
