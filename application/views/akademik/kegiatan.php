<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Kegiatan Siswa</h6>
                      </div>
                      <div class="col">
                        <?php if($role == '1') {?>
                          <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">+ Tambah Kegiatan</button>
                        <?php }else{?>

                          <?php }?>
                          <?= $this->session->flashdata('message');?>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="container-fluid">
            <div class="container-fluid">
              <div class="row">
                <?php foreach($kegiatan as $act): ?>
                  <div class="col-md-6 mt-3">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="<?= base_url('assets/img/kegiatan/'.$act['foto_kegiatan'])?>" alt="Belum ada Gambar" width="200" height="200">
                      </div>
                      <div class="col-md-6">
                        <label for=""><?= $act['nama_kegiatan'];?></label><br>
                        <p><?= $act['deskripsi'];?></p>
                        <div class="form-group">
                              <a href="" data-toggle="modal" data-target="#editModal<?= $act['id_kegiatan']?>" class="btn btn-primary">Edit</a>
                              <a href="" data-toggle="modal" data-target="#deleteModal<?= $act['id_kegiatan']?>" class="btn btn-danger">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('Akademik/addKegiatan');?>" enctype="multipart/form-data" class="form">
          <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama Kegiatan" required>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="foto" placeholder="Foto Kegiatan" id="imgInp">
                <img id="blah" width="300" height="300" src="#" alt="Belum ada gambar" />
            </div>
            <label for="">Deskripsi Kegiatan</label>
            <div class="form-group">
                <textarea name="deskripsi" id="" class="form-control" required></textarea>
            </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php foreach ($kegiatan as $act1) :?>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?= $act1['id_kegiatan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/updateKegiatan/'.$act1['id_kegiatan']);?>" enctype="multipart/form-data" method="POST" class="form">
        <label for="">Nama Kegiatan</label>
        <div class="form-group">
                <input type="text" class="form-control" name="nama" value="<?= $act1['nama_kegiatan'];?>" placeholder="Nama Kegiatan">
            </div>
        <div class="form-group">
            <input type="file" value="<?= $act1['foto_kegiatan']; ?>" name="foto" id="imgInp" class="form-control mt-3" placeholder="Foto">
        </div>
            <label for="">Deskripsi</label>
            <div class="form-group">
                <textarea name="deskripsi" id="" class="form-control"><?= $act1['deskripsi'];?></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
    </div>
    </div>
<?php endforeach;?>

<?php foreach ($kegiatan as $act2) :?>
    <!-- Modal Edit -->
    <div class="modal fade" id="deleteModal<?= $act2['id_kegiatan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Kegiatan</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/deleteKegiatan/'.$act2['id_kegiatan']);?>" method="POST" class="form">
            <p>Apakah Anda yakin ingin menghapus kegiatan ini?</p>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
      </div>
    </div>
    </div>
    </div>
    
<?php endforeach;?>

