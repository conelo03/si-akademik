<h2 class="text-white">Profil User</h2>
<?= $this->session->flashdata('message');?>
<form action="<?= base_url('Auth/update_profile/'.$profile['id'].'/'.$role)?>" method="POST" class="form">
        <div class="form-group">
            <input type="text" value="<?= $profile["username"]; ?>" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="text" value="<?= $profile['nama_depan']; ?>" name="nama_depan" class="form-control" placeholder="Nama Depan">
        </div>
        <div class="form-group">
            <input type="text" value="<?= $profile['nama_belakang']; ?>" name="nama_belakang" class="form-control" placeholder="Nama Belakang">
        </div>
        <div class="form-group">
            <input type="text" value="<?= $profile['no_hp']; ?>" name="no_hp" class="form-control" placeholder="No. Handphone">
        </div>
    <div class="form-group">
        <a href="<?= base_url('Auth/dashboard_users/'.$role)?>" class="btn btn-danger">Batal</a>
        <button class="btn btn-success">Simpan</button>
    </div>
</form>