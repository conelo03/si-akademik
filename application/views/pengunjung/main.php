<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Siakad | <?= $title; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
  <a class="navbar-brand text-white" href="#">Siakad</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white" href="<?= base_url('Welcome');?>">Beranda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= base_url('Welcome/kegiatan');?>">Kegiatan</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link text-white" href="<?= base_url('Welcome/profil');?>">
          Profil Kami
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= base_url('Welcome/daftar');?>">Pendaftaran Siswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= base_url('Auth/index');?>">Login</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container">
      <?php $this->load->view($content) ?>
    </div>

<nav class="navbar bg-primary fixed-bottom">
  <p class="text-center text-white">Siakad TK Santa Eka Puhu <?= date('Y');?></p>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
</nav>  

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>