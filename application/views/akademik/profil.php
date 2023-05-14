<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Profil TK</h6>
                      </div>
                      <div class="col">
                        <?php if($role == '1') {
                            if($profil == NULL){
                            ?>
                              <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">+ Input Profil</button>
                            <?php }else if($profil[0]['id']){ ?>
                              <button class="btn btn-info mb-3" data-toggle="modal" data-target="#editModal<?= $profil[0]['id'];?>">Edit Profil</button>
                          <?php } ?>

                      <?php }else{?>

                          <?php }?>
                          <?= $this->session->flashdata('message');?>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="container-fluid">
              <?php foreach ($profil as $pr) :?>
                  <div class="row text-center">
                    <div class="col-md-6">
                      <label for="">Sejarah</label>
                      <h5><?= $pr['sejarah'];?></h5>                      
                    </div>
                    <div class="col-md-6">
                      <label for="">Visi dan Misi</label>
                      <h5><?= $pr['visi_misi'];?></h5>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <label for="">Struktur Organisasi</label>
                    <img src="<?= base_url('assets/img/organisasi/'.$pr['struktur_organisasi']);?>" width="2200" height="1200" alt="">
                  </div>
              <?php endforeach; ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Input Profil</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('Akademik/addProfil');?>" enctype="multipart/form-data" class="form">
          <div class="form-group">
                <label for="">Sejarah</label>
                <textarea name="sejarah" id="" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Visi dan Misi</label>
                <textarea name="visi_misi" id="" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Struktur Organisasi</label>
                <input type="file" class="form-control" name="foto" placeholder="Struktur Organisasi" id="imgInp">
                <img id="blah" width="300" height="300" src="#" alt="Belum ada gambar" />
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

<?php foreach ($profil as $pr1) :?>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?= $pr1['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('Akademik/updateProfil/'.$pr1['id']);?>" enctype="multipart/form-data" class="form">
          <div class="form-group">
                <label for="">Sejarah</label>
                <textarea name="sejarah" id="" class="form-control" required><?= $pr1['sejarah'];?></textarea>
            </div>
            <div class="form-group">
                <label for="">Visi dan Misi</label>
                <textarea name="visi_misi" id="" class="form-control" required><?= $pr1['visi_misi'];?></textarea>
            </div>
            <div class="form-group">
                <label for="">Struktur Organisasi</label>
                <input type="file" class="form-control" name="foto" placeholder="Struktur Organisasi" id="imgInp">
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
<?php endforeach;?>

