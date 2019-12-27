<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light m-3 text-sm"><?= env('APP_NAME')?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-2 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>/dist/img/pp<?= user()->username??'default'?>.png" class="img-circle elevation-2 mt-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="text-sm d-block  p-0 m-0">Selamat Datang</a>
          <a href="#" class="d-block text-white"><?php echo strtoupper(user()->username??'Undefined') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <!--
        - Indent Sub Menu nav-child-indent
      -->
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview" id="mdashboard">
            <a href="#" class="nav-link dashboard">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>" data-parent="mdashboard" class="nav-link dashboard">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/informasi" data-parent="mdashboard" class="nav-link informasi">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabel Informasi</p>
                </a>
              </li>
            </ul>
          </li>
        
          <li class="nav-item">
            <a href="<?php echo base_url('agen') ?>" class="nav-link agen">
              <i class="nav-icon far fa-chart-bar"></i>
              <p id="side_agen">
                Agen Usaha
              </p>
            </a>
          </li>
          
          <?php if (in_groups(['superadmin','admin','srbb'])) : ?>
          <li class="nav-header">Master</li>
          <li class="nav-item">
            <a href="<?php echo base_url('pegawai') ?>" class="nav-link pegawai">
              <i class="nav-icon far fa-user"></i>
              <p id="side_pegawai">
                Pegawai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('cabang') ?>" class="nav-link cabang">
              <i class="nav-icon fas fa-tree"></i>
              <p id="side_cabang">
                Cabang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/kota" class="nav-link kota">
              <i class="nav-icon fas fa-table"></i>
              <p id="side_kota">
                Kabupaten
              </p>
            </a>
          </li>
          <?php endif ?> 


          <li class="nav-header">Laporan</li>
          <li class="nav-item has-treeview" id="mlpegawai">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p> Pegawai
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('lpegawai') ?>" data-parent="mlpegawai" class="nav-link lpegawai">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Seluruh Data Pegawai</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Berdasarkan Perolehan</p>
                  </a>
                </li>
              </ul>
          </li>
          <?php if (in_groups(['superadmin','admin'])) : ?>

          <li class="nav-header">Pengaturan</li>
          <li class="nav-item">
            <a href="<?= base_url()?>/target" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Target Pegawai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/apiinfo" class="nav-link api">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                API
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Hak Akses
              </p>
            </a>
          </li>
          <?php endif ?>
        
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>