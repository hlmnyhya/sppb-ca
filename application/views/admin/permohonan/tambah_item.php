<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tambah Item</h4>
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
                        <input type="text" class="form-control" id="nomor_sppb" name="nomor_sppb" placeholder="Masukkan Nomor SPPB" value="<?php echo $user->nomor_sppb; ?>" disabled>
                        <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" placeholder="Masukkan Nomor SPPB" value="<?php echo $user->id_permohonan; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_pemohon">Nama Pemohon</label>
                        <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon"
                            placeholder="Masukkan Nama Pemohon" value="<?php echo $user->nama_pemohon; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode"
                            placeholder="Masukkan Kode">
                    </div>
                    <div class="form-group">
                        <label for="id_divisi">Item</label>
                        <select class="form-control" id="id_item" name="id_master_item" required>
                            <option value="">Pilih Item</option>
                            <?php foreach ($item as $row): ?>
                                <option value="<?= $row->id_master_item; ?>"><?= $row->nama_item; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_divisi">Sub Item</label>
                            <select class="form-control" id="id_sub_item" name="id_sub_item" required>
                                <option value="">Pilih Sub Item</option>
                                <?php foreach ($subitem as $row): ?>
                                    <option value="<?= $row->id_sub_item; ?>"><?= $row->nama_sub_item; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <textarea type="text" class="form-control" id="uraian" name="uraian"
                                    placeholder="Masukkan Uraian"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan"
                                placeholder="Masukkan Satuan" required>
                            </div>
                            <div class="form-group">
                                <label for="fisik">Fisik</label>
                                <input type="text" class="form-control" id="fisik" name="fisik"
                                placeholder="Masukkan Jumlah Fisik" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Masukkan Keterangan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                </form>
                <?php endforeach; ?>
                <!-- Akhir Form Tambah User -->
            </div>
        </div>
    </div>
</div>