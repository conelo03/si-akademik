<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Data Siswa</h6>
                      </div>
                      <?php if($role==='Admin'){?>
                        <div class="col">
                          <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">+ Tambah Siswa</button>
                          <?= $this->session->flashdata('message');?>
                      <?php }?>
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NISN</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(empty($siswa)){ ?>
                        <td class="text-center" colspan=5>Tidak Ada Data</td>
                    <?php }else{ 
                    $no = 1;
                    foreach($siswa as $study) : ?>
                      <tr>
                         <td><?= $no++;?></td>
                         <td><?= $study['nisn'];?></td>
                         <td><?= $study['nama'];?></td>
                         <?php if($study['jk'] == 'L'){?>
                            <td>Laki-laki</td>
                            <?php }else{?>
                              <td>Perempuan</td>
                          <?php }?>
                         <td>
                            <a href="" data-toggle="modal" data-target="#editModal<?= $study['nisn']?>" class="btn btn-primary">Edit</a>
                            <a href="" data-toggle="modal" data-target="#deleteModal<?= $study['nisn']?>" class="btn btn-danger">Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/addSiswa');?>" method="POST" class="form">
          <div class="form-group">
                <input type="number" class="form-control" name="nisn" placeholder="NISN">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group">
                <select name="jk" class="form-control">
                    <option>-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="agama" placeholder="Agama">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="tahun_ajaran" placeholder="Tahun Ajaran">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="alat_transportasi" placeholder="Alat Transportasi">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="jenis_tinggal" placeholder="Jenis Tinggal">
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

<?php foreach ($siswa as $study1) :?>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?= $study1['nisn']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/updateSiswa/'.$study1['nisn']);?>" method="POST" class="form">
            <div class="form-group">
                <input type="number" class="form-control" value="<?= $study1['nisn']?>" name="nisn" placeholder="NISN">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $study1['nama']?>" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $study1['alamat']?>" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group">
                <select name="jk" class="form-control">
                    <?php if ($study1['jk'] === 'L') { ?>
                      <option value="L">-- Laki-laki --</option>
                      <?php }else{?>
                        <option value="P">-- Perempuan --</option>
                    <?php }?>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $study1['tempat_lahir']?>" name="tempat" placeholder="Tempat Lahir">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" value="<?= $study1['tgl_lahir']?>" name="tgl_lahir" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $study1['tahun_ajaran']?>" name="tahun_ajaran" placeholder="Tahun Ajaran">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="alat_transportasi" value="<?= $study1['alat_transportasi']?>" placeholder="Alat Transportasi">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="jenis_tinggal" value="<?= $study1['jenis_tinggal']?>" placeholder="Jenis Tinggal">
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

<?php foreach ($siswa as $study2) :?>
    <!-- Modal Edit -->
    <div class="modal fade" id="deleteModal<?= $study2['nisn']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Pendaftar</h5>
        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Akademik/deleteSiswa/'.$study2['nisn']);?>" method="POST" class="form">
            <p>Apakah Anda yakin ingin menghapus data siswa ini?</p>
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

<!-- <script>
  const provinsi = document.getElementById("provinsi");
console.log({ provinsi });
const getPost = async () => {
  const response = await fetch('https://api.goapi.id/v1/regional/provinsi?api_key=lhuuW2CnwgOn1UhI3muVmfCwHP2A6l');
  const data = await response.json();
  return data.data
};  

const displayOption = async () => {
  const options = await getPost();
  console.log(options)
  for (option of options) {
    const newOption = document.createElement("option");
    newOption.value = option.name;
    newOption.text = option.name;
    provinsi.appendChild(newOption);
  }
};

displayOption();
</script> -->
