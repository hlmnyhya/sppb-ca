<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data User</h4>
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

<form id="formTambahDivisi" action="<?= base_url('tambah_user')?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="id_users" placeholder="Masukkan Nama" required>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
    </div>
    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" required>
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
        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
    </div>
    <div class="form-group">
        <label for="ttd">Tanda Tangan</label>
        <input type="file" class="form-control" id="ttd" name="ttd" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>

            </div>
