            <h3 style="margin-top:100px">Kegiatan Siswa</h3>
            <hr>
            <div class="row">
            <?php if(!empty($kegiatan)){ ?>
                <?php foreach($kegiatan as $act): ?>
                  <div class="col-md-6 mt-3">
                    <div class="row border ml-3">
                      <div class="col-md-6">
                        <img src="<?= base_url('assets/img/daftar/'.$act['foto_kegiatan'])?>" alt="Belum ada Gambar" width="200" height="200">
                      </div>
                      <div class="col-md-6">
                        <label for=""><?= $act['nama_kegiatan'];?></label><br>
                        <p><?= $act['deskripsi'];?></p>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
            <?php }else{ ?>
                <h4>Belum ada data kegiatan</h4>
            <?php } ?>
              </div>