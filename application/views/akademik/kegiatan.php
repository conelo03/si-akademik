<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Kegiatan Siswa</h6>
                      </div>
                      <div class="col">
                        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">+ Tambah Kegiatan</button>
                        <?= $this->session->flashdata('message');?>
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jadwal</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(empty($kegiatan)){ ?>
                        <td class="text-center" colspan=5>Tidak Ada Data</td>
                    <?php }else{ 
                    $no = 1;
                    foreach($kegiatan as $act) : ?>
                      <tr>
                         <td><?= $no++;?></td>
                         <td><?= $act['jadwal'];?></td>
                         <td><?= $act['harian'];?></td>
                         <td>
                            <a href="" data-toggle="modal" data-target="#editModal<?= $act['id_jadwal']?>" class="btn btn-primary">Edit</a>
                            <a href="" data-toggle="modal" data-target="#deleteModal<?= $act['id_jadwal']?>" class="btn btn-danger">Hapus</a>
                         </td>
                      </tr>
                    <?php endforeach;
                    }
                    ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/addKegiatan');?>" method="POST" class="form">
          <div class="form-group">
                <input type="text" class="form-control" name="jadwal" placeholder="Jadwal">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="harian" placeholder="Harian">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="materi" placeholder="Materi Kegiatan">
            </div>
            <label for="">Keterangan</label>
            <div class="form-group">
                <textarea name="keterangan" id="" class="form-control"></textarea>
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
    <div class="modal fade" id="editModal<?= $act1['id_jadwal']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/updateKegiatan/'.$act1['id_jadwal']);?>" method="POST" class="form">
        <div class="form-group">
                <input type="text" class="form-control" name="jadwal" value="<?= $act1['jadwal'];?>" placeholder="Jadwal">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="harian" value="<?= $act1['harian'];?>" placeholder="Harian">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="materi" value="<?= $act1['materi_kegiatan'];?>" placeholder="Materi Kegiatan">
            </div>
            <label for="">Keterangan</label>
            <div class="form-group">
                <textarea name="keterangan" id="" class="form-control"><?= $act1['keterangan'];?></textarea>
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
    <div class="modal fade" id="deleteModal<?= $act2['id_jadwal']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Kegiatan</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/deleteKegiatan/'.$act2['id_jadwal']);?>" method="POST" class="form">
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

