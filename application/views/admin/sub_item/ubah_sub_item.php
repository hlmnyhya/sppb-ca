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
             <form id="formTambahDivisi" action="<?= base_url('edit_sub_item')?>" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                    <label for="id_divisi">Item</label>
                    <select class="form-control" id="id_master_item" name="id_master_item" required>
                        <option value="">Pilih Item</option>
                        <?php foreach ($item as $row): ?>
                            <option value="<?= $row->id_master_item; ?>"><?= $row->nama_item; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>   
                <div class="form-group">
                    <label for="nama">Nama Sub Item</label>
                    <input type="hidden" class="form-control" id="nama_sub_item" name="id_sub_item" value="<?= $user->id_sub_item?>" placeholder="Masukkan Nama Sub Item" required>
                    <input type="text" class="form-control" id="nama_sub_item" name="nama_sub_item" value="<?= $user->nama_sub_item?>" placeholder="Masukkan Nama Sub Item" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            <?php endforeach;?>