<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Sub Item</h4>
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
                            <th>Item</th>
                            <th>Sub Item</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($subitem as $user): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>    
                            <td><?php echo $user->nama_item; ?></td>
                            <td><?php echo $user->nama_sub_item; ?></td>
                            <td>
                              <a href="<?php echo base_url('ubah_sub_item/'.$user->id_sub_item); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i><span>Ubah</span></a>
                              <a href="<?php echo base_url('hapus_sub_item/'.$user->id_sub_item); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i><span>Hapus</span></a>
                              <!-- <a href="<?php echo base_url('user/detail/'.$user->id_master_item); ?>" class="btn btn-info"><i class="mdi mdi-eye"></i><span>Detail</span></a> -->
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Item</th>
                            <th>Sub Item</th>
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
                <h5 class="modal-title" id="tambahDivisiModalLabel">Tambah Data Sub Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Divisi -->
             <form id="formTambahDivisi" action="<?= base_url('tambah_sub_item')?>" method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" id="nama_sub_item" name="nama_sub_item" placeholder="Masukkan Nama Sub Item" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
                <!-- Akhir Form Tambah Divisi -->
            </div>
        </div>
    </div>
</div>
