
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Data Guru</h6>
                      </div>
                      <div>
                        <?php if($this->session->userdata('role') == 1){?>
                          <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">+ Tambah Guru</button>
                        <?php } ?>
                        <?= $this->session->flashdata('message');?>
                      </div>
                  </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="container-fluid">
                <div class="table-responsive p-0">
                  <table class="table table-striped table-bordered" id= "tb">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NUPTK</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pendidikan Terakhir</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telepon</th>
                        <?php if($this->session->userdata('role') == 1){?>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $no = 1;
                      foreach($guru as $teach) : ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td><?= $teach['nuptk'];?></td>
                          <td><?= $teach['nama'];?></td>
                          <td><?= $teach['jk'];?></td>
                          <td><?= $teach['jabatan'];?></td>
                          <td><?= $teach['pendidikan_terakhir'];?></td>
                          <td><?= $teach['telp'];?></td>
                        <?php if($this->session->userdata('role') == 1){?>
                          <td>
                              <a href="" data-toggle="modal" data-target="#editModal<?= $teach['nuptk']?>" class="btn btn-primary">Edit</a>
                              <a href="" data-toggle="modal" data-target="#deleteModal<?= $teach['nuptk']?>" class="btn btn-danger">Hapus</a>
                          </td>
                        <?php } ?>
                        </tr>
                      <?php endforeach; ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/addGuru');?>" method="POST" class="form">
            <div class="form-group">
                <input type="number" class="form-control" name="nuptk" placeholder="NUPTK">
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
                <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
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
    <div class="modal fade" id="editModal<?= $teach1['nuptk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Guru</h5>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/updateGuru/'.$teach1['nuptk']);?>" method="POST" class="form">
            <div class="form-group">
                <input type="number" class="form-control" value="<?= $teach1['nuptk']?>" name="nuptk" placeholder="NUPTK">
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
                <input type="text" class="form-control" value="<?= $teach1['jabatan']?>" name="jabatan" placeholder="Jabatan">
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
    <div class="modal fade" id="deleteModal<?= $teach2['nuptk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Guru</h5>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/deleteGuru/'.$teach2['nuptk']);?>" method="POST" class="form">
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
