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
         <?php if ($this->session->flashdata('pesan')): ?>
              <?= $this->session->flashdata('pesan'); ?>
          <?php endif; ?>
         <?php if ($this->session->flashdata('error')): ?>
              <?= $this->session->flashdata('error'); ?>
          <?php endif; ?>
        <div class="card">
          <div class="card-body">
          <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahDivisiModal">
            <i class="mdi mdi-plus"></i> <span>Tambah Data</span>
            </button>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Divisi</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Foto</th>
                            <th>Tanda Tangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>    
                            <td><?php echo $user->nama; ?></td>
                            <td><?php echo $user->nip; ?></td>
                            <td><?php echo $user->divisi; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo str_repeat('●', min(strlen($user->password), 8)); ?></td>
                            <td><img src="<?php echo base_url('./uploads/profil/'.$user->gambar); ?>" width="100px" height="100px" alt="Gambar User"></td>
                            <td><img src="<?php echo  base_url('./uploads/ttd/'.$user->gambar_ttd); ?>" width="100px" height="100px" alt="Tanda Tangan User"></td>
                            <td>
                              <a href="<?php echo base_url('ubah_user/'.$user->id_users); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i><span>Ubah</span></a>
                              <a href="<?php echo base_url('hapus_user/'.$user->id_users); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i><span>Hapus</span></a>
                              <a href="<?php echo base_url('user/detail/'.$user->id_users); ?>" class="btn btn-info"><i class="mdi mdi-eye"></i><span>Detail</span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Divisi</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Foto</th>
                            <th>Tanda Tangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah User -->
<div class="modal fade" id="tambahDivisiModal" tabindex="-1" role="dialog" aria-labelledby="tambahDivisiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDivisiModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Divisi -->
            <form id="formTambahDivisi" action="<?= base_url('tambah_user')?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" required>
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
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="foto" name="gambar" placeholder="Masukkan foto" required>
                </div>
                <div class="form-group">
                    <label for="tandatangan">Tanda Tangan</label>
                    <input type="file" class="form-control" id="tandatangan" name="gambar_ttd" placeholder="Masukkan Tanda Tangan" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
                <!-- Akhir Form Tambah Divisi -->
            </div>
        </div>
    </div>
</div>
