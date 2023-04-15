<div class="row">

        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                    <div class="col-md-12">
                        <h6>Absensi Siswa</h6>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#absenModal">Absen</a>
                        <?= $this->session->flashdata('message');?>
                      </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="container-fluid">
                <div class="table-responsive p-0">
                  <table class="table align-items-center table-striped mb-0" id="tb">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NISN</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Absensi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(empty($list)){ ?>
                        <td class="text-center" colspan=5>Tidak Ada Data</td>
                    <?php }else{ 
                    $no = 1;
                    foreach($list as $attendant) : ?>
                      <tr class="text-center">
                         <td><?= $no++;?></td>
                         <td><?= $attendant['nisn'];?></td>
                         <td><?= $attendant['nama'];?></td>
                         <td><?= $attendant['kehadiran'];?></td>
                         <td><?= $attendant['tanggal'];?></td>
                    
                         <td>
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#koreksiModal<?= $attendant['nisn']?>">Koreksi</a>
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


      <!-- Modal Absen -->
      <div class="modal fade" id="absenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Absen Siswa</h5>
                      <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Rapor/isiAbsen/')?>" method="POST">
                            <div class="form-group">
                                <label for="">Nama Siswa</label>
                                <select name="nisn" id="" class="form-control mb-3">
                                  <?php if($count == 0) {?>
                                      <option>Sudah Absen Semua</option>
                                      <?php }?>
                                    <?php foreach ($absensi as $abs) :?>
                                            <option value="<?= $abs['nisn']?>"><?= $abs['nama'];?></option>
                                    <?php endforeach;?>
                                </select>
                        <input type=checkbox id="kehadiran" name="kehadiran" value="Hadir">
                         <label class="mr-3">Hadir</label>
                         <input type=checkbox id="kehadiran" name="kehadiran" value="Izin">
                         <label class="mr-3">Izin</label>
                         <input type=checkbox id="kehadiran" name="kehadiran" value="Sakit">
                         <label class="mr-3">Sakit</label>
                         <input type=checkbox id="kehadiran" name="kehadiran" value="Tanpa Keterangan">
                         <label class="mr-3">Tanpa Keterangan</label>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <?php if($count == 0) {?>
                                  <button class="btn btn-success" disabled type="submit">Simpan</button>
                                      <?php }else{?>
                                        <button class="btn btn-success" type="submit">Simpan</button>
                                  <?php }?>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



      <!-- Modal Koreksi Absen -->
      <?php foreach ($list as $attd) :?>
<div class="modal fade" id="koreksiModal<?= $attd['nisn']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Koreksi Absen Siswa</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
                <form action="<?= base_url('Rapor/koreksiAbsen/'.$attd['nisn'])?>" method="POST">
                    <div class="form-group">
                         <label class="mr-3">Hadir</label>
                         <input class="mr-3" type=checkbox id="kehadiran" value="Hadir" name="kehadiran" value="Hadir" <?= ($attd['kehadiran'] == 'Hadir') ? "checked" : '' ?>>
                         <label class="mr-3">Izin</label>
                         <input class="mr-3" type=checkbox id="kehadiran" value="Izin" name="kehadiran" <?= ($attd['kehadiran'] == 'Izin') ? "checked" : '' ?>>
                         <label class="mr-3">Sakit</label>
                         <input class="mr-3" type=checkbox id="kehadiran" value="Sakit" name="kehadiran" <?= ($attd['kehadiran'] == 'Sakit') ? "checked" : '' ?>>
                         <label class="mr-3">Tanpa Keterangan</label>
                         <input class="mr-3" type=checkbox id="kehadiran" value="Tanpa Keterangan" name="kehadiran" <?= ($attd['kehadiran'] == 'Tanpa Keterangan') ? "checked" : '' ?>>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php endforeach;?>
