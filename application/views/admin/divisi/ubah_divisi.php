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
             <form id="formTambahDivisi" action="<?= base_url('edit_divisi')?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Divisi</label>
                    <input type="hidden" class="form-control" id="nama_item" name="id_divisi" value="<?php echo $user->id_divisi;?>" placeholder="Masukkan Nama Item" required>
                    <input type="text" class="form-control" id="nama_item" name="divisi" value="<?php echo $user->divisi;?>" placeholder="Masukkan Nama Item" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            <?php endforeach;?>