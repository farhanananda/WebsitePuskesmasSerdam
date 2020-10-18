
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $admin ?>" class="brand-link">
      <span class="brand-text font-weight-light">Puskesmas <br> Sungai Raya Dalam</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= $admin ?>" class="d-block"><?= nama_lengkap($_SESSION['id_user']) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <li class="nav-item">
                <a href="<?= $admin ?>" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Dasbor</p>
                </a>
              </li>

    <? if( userlevel($_SESSION['id_user']) == "3" ){ ?>
              <li class="nav-item">
                <a href="<?= $admin ?>profil_pasien" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Profil</p>
                </a>
              </li>
<!--               <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Riwayat Kunjungan</p>
                </a>
              </li> -->
    <? } ?>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>