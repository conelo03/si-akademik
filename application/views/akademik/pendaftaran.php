<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-md-9">
                        <h6>Data Pendaftaran</h6>
                        <?= $this->session->flashdata('message');?>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">+ Tambah Pendaftar</button>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="container-fluid">
                <div class="table-responsive p-0">
                  <table class="table align-items-center table-striped mb-0" id="pendaftaran">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NISN</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach($pendaftar as $daftar) : ?>
                      <tr>
                         <td><?= $no++;?></td>
                         <td><?= $daftar['nisn'];?></td>
                         <td><?= $daftar['nama'];?></td>
                         <td><?= $daftar['email'];?></td>
                         <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editModal<?= $daftar['nisn']?>" class="btn btn-primary">Edit</a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $daftar['nisn']?>" class="btn btn-danger">Hapus</a>
                         </td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pendaftar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/add');?>" method="POST" class="form">
            <div class="form-group">
                <input type="number" class="form-control" name="nisn" placeholder="NISN">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <select name="jk" class="form-control">
                    <option>-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="agama" placeholder="Agama">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="no_telp" placeholder="No. Telepon">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php foreach ($pendaftar as $daftar1) :?>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?= $daftar1['nisn']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pendaftar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/update/'.$daftar1['nisn']);?>" method="POST" class="form">
            <div class="form-group">
                <input type="number" class="form-control" value="<?= $daftar1['nisn']?>" name="nisn" placeholder="NISN">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $daftar1['nama']?>" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <select name="jk" class="form-control">
                    <?php if ($daftar1['jk'] === 'L') { ?>
                      <option value="L">-- Laki-laki --</option>
                      <?php }else{?>
                        <option value="P">-- Perempuan --</option>
                    <?php }?>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $daftar1['tempat_lahir']?>" name="tempat" placeholder="Tempat Lahir">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" value="<?= $daftar1['tanggal_lahir']?>" name="tgl_lahir" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $daftar1['agama']?>" name="agama" placeholder="Agama">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" value="<?= $daftar1['no_telp']?>" name="no_telp" placeholder="No. Telepon">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" value="<?= $daftar1['email']?>" name="email" placeholder="Email">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
    </div>
    </div>
<?php endforeach;?>

<?php foreach ($pendaftar as $daftar2) :?>
    <!-- Modal Edit -->
    <div class="modal fade" id="deleteModal<?= $daftar2['nisn']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Pendaftar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/delete/'.$daftar2['nisn']);?>" method="POST" class="form">
            <p>Apakah Anda yakin ingin menghapus pendaftar ini?</p>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
      </div>
    </div>
    </div>
    </div>
<?php endforeach;?>
