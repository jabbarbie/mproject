<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $this->include('template/header') ?>
</head>
<body class="sidebar-mini text-sm">
<div class="wrapper">

  <?php if (session()->has('errors')) : ?>
    <ul class="alert alert-danger">
    <?php foreach (session('errors') as $error) : ?>
      <li><?= $error ?></li>
    <?php endforeach ?>
    </ul>
  <?php endif ?>

  <?php echo $this->include('template/navbar_atas') ?>
  <?php if( function_exists('user') ) :?>
    <?php echo $this->include('template/sidebar') ?>
  <?php endif; ?>
  <div class="content-wrapper">
    <?php echo $this->include('template/breadcumb') ?>

    <div class="content">
      <div class="container-fluid">

        <?php echo $this->renderSection('content') ?>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php echo $this->include('template/footer') ?>