<h3 style="margin-top:100px">Pendaftaran Siswa</h3>
<hr>
<?= $this->session->flashdata('message');?>
<form action="<?= base_url('Welcome/daftar_siswa');?>" class="form" method="POST" enctype="multipart/form-data"  style="margin-bottom:100px">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control">
                <label for="">Jenis Kelamin</label>
                <select name="jk" class="form-control">
                    <option>-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <label for="">Alamat</label>
                <input type="text" name="alamat" class="form-control">
                <label for="">Agama</label>
                <input type="text" name="agama" class="form-control">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir">
                <label for="">Jenis Tinggal</label>
                <input type="text" class="form-control" name="jenis_tinggal">
                <label for="">Alat Transportasi</label>
                <input type="text" class="form-control" name="alat_transportasi">
                <label for="">Scan PDF KK</label>
                <input type="file" class="form-control" name="kk">
                <label for="">Scan PDF Akta</label>
                <input type="file" class="form-control" name="akta">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="" class="btn btn-warning">Tutup</a>
            </div>
        </div>
    </div>
</form>