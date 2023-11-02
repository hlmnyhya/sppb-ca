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
              <!-- Form Tambah User -->
                <?php foreach ($users as $user) : ?>
                <form id="formTambahUser" action="<?= base_url('tambah_permohonan_item')?>" method="POST"
                    enctype="multipart/form-data">
                   <div class="form-group">
                        <label for="nomor_sppb">Nomor SPPB</label>
                        <input type="text" class="form-control" id="nomor_sppb" value="<?php echo $user->nomor_sppb; ?>" name="nomor_sppb"
                            placeholder="Masukkan Nomor SPPB" required>
                    </div>
                    <div class="form-group">
                        <label for="nomor_sppb">Nama Pemohon</label>
                        <input type="text" class="form-control" id="nama_pemohon" value="<?php echo $user->nama_pemohon; ?>" name="nama_pemohon"
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
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $user->tanggal; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="Diperiksa">Diajukan</option>
                            <option value="Diperiksa">Diperiksa</option>
                            <option value="Disetujui">Disetujui</option>
                        </select>
                    </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
                <?php endforeach; ?>
                <!-- Akhir Form Tambah User -->