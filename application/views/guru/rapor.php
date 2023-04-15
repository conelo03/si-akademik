<div class="row">

        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                    <div class="col-md-12">
                        <h6>Rapor Siswa</h6>
                        <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#inputModal">+Input Nilai</a>
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach($list as $siswa) : ?>
                      <tr class="text-center">
                         <td><?= $no++;?></td>
                         <td><?= $siswa['nisn'];?></td>
                         <td><?= $siswa['nama'];?></td>
                    
                         <td>
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#koreksiModal<?= $siswa['nisn']?>">Edit</a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#koreksiModal<?= $siswa['nisn']?>">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach;
                    ?>
                    </tbody>
                  </table>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal Input Nilai -->
      <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Input Nilai Rapor Peserta Didik</h5>
                      <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Rapor/inputNilai/')?>" method="POST">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="semester" placeholder="Semester">
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="tahun" placeholder="Tahun Ajaran">
                            </div>
                            <div class="form-group">
                                    <select name="bidang" id="" class="form-control">
                                        <option>-- Bidang Pengembangan --</option>
                                        <?php foreach($bidang as $bid):?>
                                            <option><?= $bid['nama_pengembangan'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                            <hr>
                            <p class="text-center">Pengetahuan</p>
                            <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nilai_pengetahuan" placeholder="Nilai">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="deskripsi_pengetahuan" placeholder="Deskripsi">
                                    </div>
                            </div>
                            <hr>
                            <p class="text-center">Keterampilan</p>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                   <input type="text" class="form-control" name="nilai_keterampilan" placeholder="Nilai">
                                </div>
                                <div class="col-md-6">
                                   <input type="text" class="form-control" name="deskripsi_keterampilan" placeholder="Deskripsi">
                                </div>
                            </div>
                            <hr>
                            <p class="text-center">Sikap</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-3" name="nilai_sikap" placeholder="Nilai">
                                        <input type="text" class="form-control" name="spiritual" placeholder="Sikap Spiritual">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-3" name="deskripsi_sikap" placeholder="Deskripsi">
                                        <input type="text" class="form-control" name="sosial" placeholder="Sikap Sosial">
                                    </div>
                                </div>
                            </div>
                            <hr>

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