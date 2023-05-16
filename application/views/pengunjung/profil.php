<?php foreach ($profil as $pr) :?>
    <h3 style="margin-top:100px">Profil Kami</h3>
    <hr>
                  <div class="row text-center">
                    <div class="col-md-6">
                      <h4 for="">Sejarah</h4>
                      <p><?= $pr['sejarah'];?></p>                      
                    </div>
                    <div class="col-md-6">
                      <h4 for="">Visi dan Misi</h4>
                      <p><?= $pr['visi_misi'];?></p>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <h4 for="">Struktur Organisasi</h4>
                    <img src="<?= base_url('assets/img/organisasi/'.$pr['struktur_organisasi']);?>" width="2200" height="1200" alt="">
                  </div>
<?php endforeach; ?>