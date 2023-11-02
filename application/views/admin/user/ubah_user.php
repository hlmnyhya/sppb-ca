<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Item</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <!-- <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol> -->
                    </nav>
                </div>
            </div>
        </div>
    </div>

    
      <div class="container-fluid">
         <?php if ($this->session->flashdata('pesan')): ?>
              <?= $this->session->flashdata('pesan'); ?>
          <?php endif; ?>
         <?php if ($this->session->flashdata('error')): ?>
              <?= $this->session->flashdata('error'); ?>
          <?php endif; ?>
        <div class="card">
          <div class="card-body">
            <?php foreach ($users as $user): ?>
             <form id="formTambahDivisi" action="<?= base_url('edit_user')?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->nama; ?>" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="<?= $user->nip; ?>" placeholder="Masukkan NIP" required>
                </div>
                <div class="form-group">
                    <label for="id_divisi">Level</label>
                    <select class="form-control" id="id_divisi" name="id_level" required>
                        <option value="">Pilih Level</option>
                        <?php foreach ($level as $row): ?>
                            <option value="<?= $row->id_level; ?>"><?= $row->level; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_divisi">Divisi</label>
                    <select class="form-control" id="id_divisi" name="id_divisi" required>
                        <option value="">Pilih Divisi</option>
                        <?php foreach ($divisi as $row): ?>
                            <option value="<?= $row->id_divisi; ?>"><?= $row->divisi; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user->username; ?>" placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= $user->password; ?>" placeholder="Masukkan Password" required>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <img src="<?= base_url('./uploads/profil/' . $user->gambar)?>" alt="user" class="rounded-circle" width="200" height="200">
                    <input type="file" class="form-control" id="foto" name="gambar"placeholder="Masukkan foto" required>
                </div>
                <div class="form-group">
                    <label for="tandatangan">Tanda Tangan</label>
                     <img src="<?= base_url('./uploads/ttd/' . $user->gambar_ttd)?>" alt="user" class="rounded-circle" width="200" height="100">
                    <input type="file" class="form-control" id="tandatangan" name="gambar_ttd" value="<?= $user->gambar_ttd; ?>" placeholder="Masukkan Tanda Tangan" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            <?php endforeach;?>