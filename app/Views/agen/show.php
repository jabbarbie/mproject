<?php $this->extend('template/index') ?>
<?php $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
      
      <div class="row">
      <div class="col-sm-8">
        <?php echo $this->include('agen/formdetail') ?>           
      </div>

      <div class="col-sm-4">
        <?php echo $this->include('agen/formpegawai') ?>      
      </div>

      </div>

    </div>
</div>

<?php $this->endSection() ?>
