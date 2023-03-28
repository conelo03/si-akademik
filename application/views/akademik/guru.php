<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-md-9">
                        <h6>Data Guru</h6>
                        <?= $this->session->flashdata('message');?>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">+ Tambah Guru</button>
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIP</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telepon</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach($guru as $teach) : ?>
                      <tr>
                         <td><?= $no++;?></td>
                         <td><?= $teach['nip'];?></td>
                         <td><?= $teach['nama'];?></td>
                         <td><?= $teach['telp'];?></td>
                         <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editModal<?= $teach['nip']?>" class="btn btn-primary">Edit</a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $teach['nip']?>" class="btn btn-danger">Hapus</a>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/addGuru');?>" method="POST" class="form">
            <div class="form-group">
                <input type="number" class="form-control" name="nip" placeholder="NIP">
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
                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="gelar" placeholder="Gelar">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan Terakhir">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="telp" placeholder="No. Telepon">
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

<?php foreach ($guru as $teach1) :?>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?= $teach1['nip']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pendaftar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/updateGuru/'.$teach1['nip']);?>" method="POST" class="form">
            <div class="form-group">
                <input type="number" class="form-control" value="<?= $teach1['nip']?>" name="nip" placeholder="NIP">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $teach1['nama']?>" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <select name="jk" class="form-control">
                    <?php if ($teach1['jk'] === 'L') { ?>
                      <option value="L">-- Laki-laki --</option>
                      <?php }else{?>
                        <option value="P">-- Perempuan --</option>
                    <?php }?>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $teach1['tempat_lahir']?>" name="tempat" placeholder="Tempat Lahir">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" value="<?= $teach1['tgl_lahir']?>" name="tgl_lahir" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $teach1['alamat']?>" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="gelar" value="<?= $teach1['gelar']?>" placeholder="Gelar">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" value="<?= $teach1['email']?>" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="pendidikan" value="<?= $teach1['pendidikan_terakhir']?>" placeholder="Pendidikan Terakhir">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" value="<?= $teach1['telp']?>" name="telp" placeholder="No. Telepon">
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

<?php foreach ($guru as $teach2) :?>
    <!-- Modal Edit -->
    <div class="modal fade" id="deleteModal<?= $teach2['nip']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Pendaftar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/deleteGuru/'.$teach2['nip']);?>" method="POST" class="form">
            <p>Apakah Anda yakin ingin menghapus guru ini?</p>
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
