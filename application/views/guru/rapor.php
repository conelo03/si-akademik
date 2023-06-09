<div class="row">

        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                    <div class="col-md-12">
                        <h6>Rapor Siswa</h6>
                        <?php if($this->session->userdata('role') == 2){?>
                            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#inputModal">+ Input Nilai</a>
                        <?php } ?>
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aspek</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Semester</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach($rapor as $siswa) : ?>
                      <tr class="text-center">
                         <td><?= $no++;?></td>
                         <td><?= $siswa['nisn'];?></td>
                         <td><?= $siswa['nama'];?></td>
                         <td><?= $siswa['nama_pengembangan'];?></td>
                         <td><?= $siswa['semester'];?></td>
                         <td>
                         <?php if($this->session->userdata('role') == 2){?>
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $siswa['id_raport']?>">Edit</a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $siswa['id_raport']?>">Hapus</a>
                            <?php } ?>
                            <a href="<?= base_url('Guru/generateRapor/'.$siswa['nisn']);?>" class="btn btn-info">Download Rapor</a>
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
                        <form action="<?= base_url('Guru/inputNilai/')?>" method="POST">
                            <div class="form-group">
                            <label for="">Nama Siswa</label>
                                <select name="nisn" id="" class="form-control mb-3">
                                    <?php foreach ($isNilai as $nilai) :?>
                                            <option value="<?= $nilai['nisn']?>"><?= $nilai['nama'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="semester" placeholder="Semester">
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="tahun" placeholder="Tahun Ajaran">
                            </div>
                            <div class="form-group">
                                    <select name="bidang" class="form-control">
                                        <option>-- Bidang Pengembangan --</option>
                                        <?php foreach($bidang as $bid):?>
                                            <option value="<?= $bid['id_pengembangan'];?>"><?= $bid['nama_pengembangan'];?></option>
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
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-3" name="deskripsi_sikap" placeholder="Deskripsi">
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

<!-- Modal Edit Nilai -->
<?php foreach($rapor as $rp):?>
  <div class="modal fade" id="editModal<?= $rp['id_raport'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Nilai Rapor Peserta Didik</h5>
                      <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Guru/editNilai/'.$rp['nisn'].'/'.$rp['semester'])?>" method="POST">
                            <div class="form-group">
                            <label for="">Nama Siswa</label>
                                <input type="text" class="form-control" value="<?= $rp['nama'];?>" disabled>
                                <input type="hidden" value="<?= $rp['nisn'];?>" name="nisn">
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" value="<?= $rp['semester'];?>" name="semester" placeholder="Semester" disabled>
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" value="<?= $rp['tahun_ajaran'];?>" name="tahun" placeholder="Tahun Ajaran" disabled>
                                </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= $rp['nama_pengembangan'];?>" disabled>
                                <input type="hidden" value="<?= $rp['id_pengembangan'];?>" name="bidang">
                            </div>
                            <hr>
                            <p class="text-center">Pengetahuan</p>
                            <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?= $rp['pengetahuan'];?>" name="nilai_pengetahuan" placeholder="Nilai">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?= $rp['deskripsi_pengetahuan'];?>" name="deskripsi_pengetahuan" placeholder="Deskripsi">
                                    </div>
                            </div>
                            <hr>
                            <p class="text-center">Keterampilan</p>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                   <input type="text" class="form-control" value="<?= $rp['keterampilan'];?>" name="nilai_keterampilan" placeholder="Nilai">
                                </div>
                                <div class="col-md-6">
                                   <input type="text" class="form-control" value="<?= $rp['deskripsi_keterampilan'];?>" name="deskripsi_keterampilan" placeholder="Deskripsi">
                                </div>
                            </div>
                            <hr>
                            <p class="text-center">Sikap</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-3" value="<?= $rp['sikap'];?>" name="nilai_sikap" placeholder="Nilai">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-3" value="<?= $rp['deskripsi_sikap'];?>" name="deskripsi_sikap" placeholder="Deskripsi">
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

<?php endforeach;?>


<!-- Modal Hapus Nilai -->
<?php foreach($rapor as $rp1):?>
  <div class="modal fade" id="deleteModal<?= $rp1['id_raport'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm modal-dialog-scrollable">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Nilai Rapor Peserta Didik</h5>
                      <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Guru/hapusNilai/'.$rp1['id_raport'])?>" method="POST">
                            <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php endforeach;?>
