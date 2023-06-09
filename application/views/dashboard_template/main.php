
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title;?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/components.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">

        <ul class="navbar-nav navbar" style="margin-left:500px">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/img/profil/'.$this->session->userdata('foto'))?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php
            if ($role == 1){
              echo 'Admin';
            }else if ($role == 2){
              echo 'Guru';
            }else{
              echo 'Orang Tua';
            }
            ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= base_url('Auth/user_profile/'.$role)?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>  
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('Auth/validate/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img src="<?= base_url('assets/img/logo/logo-tk.png')?>" width="50" height="50" alt="">
            <a href="index.html">Siakad</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SIA</a>
          </div>
          <a class="sidebar-header nav-link text-dark" href="<?= base_url('Auth/dashboard_users/'.$role)?>">Dashboard</a>
          <ul class="sidebar-menu">
            <!-- <li>
              <a href="" class="nav-link  has-dropdown"><i class="fas fa-fire"></i><span>Profil</span></a>
              <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Sejarah</a></li>
                    <li><a class="nav-link" href="">Visi dan Misi</a></li>
                    <li><a class="nav-link" href="">Struktur Organisasi</a></li>
                  </ul>
            </li> -->
            <li>
              <a href="<?= base_url('Akademik/profil/'.$role);?>" class="nav-link"><i class="fas fa-fire"></i><span>Profil</span></a>
          </li>
            <li>
              <a href="<?= base_url('Akademik/kegiatan/'.$role)?>" class="nav-link"><i class="fas fa-clipboard"></i><span>Kegiatan</span></a>
            </li>
          <p class="ml-3 header-menu mt-3 text-dark">Master</p>
        <?php if($role==1){?>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Manajemen Data</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('Akademik/master_siswa/'.$role)?>">Data Siswa</a></li>
              <li><a class="nav-link" href="<?= base_url('Akademik/master_guru/'.$role)?>">Data Guru</a></li>
            </ul>
          </li>
          <?php }elseif($role==2){?>
            <li>
              <a href="<?= base_url('Guru/absenSiswa/'.$role)?>" class="nav-link"><i class="fas fa-clipboard"></i><span>Absensi Siswa</span></a>
              <li>
                <a href="<?= base_url('Akademik/master_siswa/'.$role)?>" class="nav-link"><i class="fas fa-clipboard"></i><span>Data Siswa</span></a>
            </li>
            <li>
                <a href="<?= base_url('Guru/raporSiswa/'.$role)?>" class="nav-link"><i class="fas fa-clipboard"></i><span>Data Rapor</span></a>
            </li>
            <li><a class="nav-link" href="<?= base_url('Akademik/master_guru/'.$role)?>"><i class="fas fa-clipboard"></i><span>Data Guru</span></a></li>
            </li>
          <?php }elseif($role==3){?>
            <li>
              <a href="<?= base_url('Akademik/master_siswa/'.$role)?>" class="nav-link"><i class="fas fa-clipboard"></i><span>Data Siswa</span></a>
            </li>
            <li>
              <a href="<?= base_url('Guru/absenSiswa/'.$role)?>" class="nav-link"><i class="fas fa-clipboard"></i><span>Absensi Siswa</span></a>
              <li>
              <li>
                <a href="<?= base_url('Guru/raporSiswa/'.$role)?>" class="nav-link"><i class="fas fa-clipboard"></i><span>Data Rapor</span></a>
            </li>
            <?php }?>
          </ul>     
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content" style="margin-bottom:100px;">
        <?php $this->load->view($content);?>
      </div>
      <footer class="main-footer bg-primary fixed-bottom">
        <div class="footer-left text-light">
          Copyright &copy; <?= date('Y'); ?> <div class="bullet"></div> Design By <a class="text-light" href="https://nauval.in/">TK Santa Eka Puhu</a>
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url()?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url()?>assets/modules/popper.js"></script>
  <script src="<?= base_url()?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url()?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url()?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url()?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url()?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?= base_url()?>assets/modules/chart.min.js"></script>
  <script src="<?= base_url()?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?= base_url()?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?= base_url()?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url()?>assets/js/page/index.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#tb').DataTable();
    });
  </script>
  <script>
    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        blah.src = URL.createObjectURL(file)
      }
    }
  </script>
  <!-- Template JS File -->
  <script src="<?= base_url()?>assets/js/scripts.js"></script>
  <script src="<?= base_url()?>assets/js/custom.js"></script>
</body>
</html>