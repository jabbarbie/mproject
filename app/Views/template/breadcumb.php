<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">
        <?php echo $halaman??'Undefined'; ?></h1>



        <h6 style="display: none" id="currentPage"><?php echo $currentPage??'dasboard'; ?></h6>
    
    </div>
    <div class="col-sm-6">
    <?php $tglx = array('dashboard','informasi') ?>
    <ol class="breadcrumb float-sm-right">
        <?php if (isset($breadcumb) && !in_array($currentPage,$tglx )): ?>
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>

        <?php foreach ($breadcumb as $key => $value): ?>

            <li class="breadcrumb-item <?php echo $key==count($breadcumb)?'active':'' ?>">
                <a href='<?php echo $value["link"] ?>'><?php echo $value["text"] ?></a>
            </li>

        <?php endforeach; ?>
        <?php endif;?>

        <li>

        <?php if (isset($breadcumb) && in_array($currentPage,$tglx )): ?>
        <div class="float-right d-flex">
            <button type="button" class="btn btn-default btn-sm" id="daterange-btn">
                <i class="far fa-calendar-alt" ></i> <span id="side_tanggal"><?= date('F Y') ?> </span>
                <i class="fas fa-caret-down"></i>
            </button>
        </div>
        <?php endif;?>

        </li>
    </ol>

    </div>

    
    <!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>