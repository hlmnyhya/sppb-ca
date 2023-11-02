<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Permohonan</h4>
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
                            <th>Nomor SPPB</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($permohonan as $user): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>    
                            <td><?php echo $user->nomor_sppb; ?></td>
                            <td><?php echo $user->nama_pemohon; ?></td>
                            <td><?php echo $user->divisi; ?></td>
                            <td><?php echo $user->tanggal; ?></td>
                           <td class="Alert text-white <?= ($user->status == 'Diperiksa') ? 'bg-warning' :                                     (($user->status == 'Disetujui') ? 'bg-success' : 'bg-primary'); ?>">
                                        <?= ($user->status == 'Diperiksa') ? '<i class="mdi mdi-eye"></i>' : (($user->status == 'Disetujui') ? '<i class="mdi                                   mdi-file-check"></i>' : '<i class="mdi mdi-file-send"></i>'); ?>
                                        <?= $user->status; ?>
                                    </td>
                            <td>
                              <a href="<?php echo base_url('users_permohonan_users/tambah_item/'.$user->id_permohonan); ?>" class="btn btn-success"><i class="mdi mdi-cart-plus"></i><span>Tambah Item</span></a>
                              <a href="<?php echo base_url('users_ubah_permohonan/'.$user->id_permohonan); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i><span>Ubah</span></a>
                              <a href="<?php echo base_url('users_hapus_permohonan/'.$user->id_permohonan); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i><span>Hapus</span></a>
                              <a href="<?php echo base_url('users_permohonan_users/detail/'.$user->id_permohonan); ?>" class="btn btn-info"><i class="mdi mdi-eye"></i><span>Detail</span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nomor SPPB</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah User -->
<div class="modal fade" id="tambahDivisiModal" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah Data Permohonan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah User -->
                <form id="formTambahUser" action="<?= base_url('tambah_permohonan')?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomor_sppb">Nomor SPPB</label>
                        <input type="text" class="form-control" id="nomor_sppb" name="nomor_sppb"
                            placeholder="Masukkan Nomor SPPB" required>
                    </div>
                    <div class="form-group">
                        <label for="nomor_sppb">Nama Pemohon</label>
                        <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon"
                            placeholder="Masukkan Nama Pemohon" required>
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
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="Diperiksa">Diperiksa</option>
                            <option value="Disetujui">Disetujui</option>
                        </select>
                    </div>
                    <!-- Tambahkan bidang lain sesuai kebutuhan -->
                    <!-- ... -->
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
                <!-- Akhir Form Tambah User -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah User -->
<div class="modal fade" id="tambahItem" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah Data Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah User -->
                <form id="formTambahUser" action="<?= base_url('tambah_permohonan')?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomor_sppb">Nomor SPPB</label>
                        <input type="text" class="form-control" id="nomor_sppb" name="nomor_sppb" placeholder="Masukkan Nomor SPPB" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nomor_sppb">Nama Pemohon</label>
                        <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon"
                            placeholder="Masukkan Nama Pemohon" required>
                    </div>
                    <div class="form-group">
                    <label for="id_divisi">Item</label>
                    <select class="form-control" id="id_item" name="id_item" required>
                        <option value="">Pilih Item</option>
                        <?php foreach ($item as $row): ?>
                            <option value="<?= $row->id_item; ?>"><?= $row->item; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="id_divisi">Sub Item</label>
                    <select class="form-control" id="id_sub_item" name="id_sub_item" required>
                        <option value="">Pilih Sub Item</option>
                        <?php foreach ($subitem as $row): ?>
                            <option value="<?= $row->id_sub_item; ?>"><?= $row->sub_item; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan"
                            placeholder="Masukkan Satuan" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok"
                            placeholder="Masukkan Jumlah Stok" required>
                    </div>
                    <div class="form-group">
                        <label for="fisik">Fisik</label>
                        <input type="text" class="form-control" id="fisik" name="fisik"
                        placeholder="Masukkan Jumlah Fisik" required>
                    </div>
                    <!-- Tambahkan bidang lain sesuai kebutuhan -->
                    <!-- ... -->
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
                <!-- Akhir Form Tambah User -->
            </div>
        </div>
    </div>
</div>

