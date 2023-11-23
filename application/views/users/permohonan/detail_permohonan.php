<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Detail Permohonan</h4>
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
    <div class="card">
        <div class="card-body" style="background-color: whitesmoke;">
                  <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Item</th>
                            <th>Sub Item</th>
                            <th>Satuan</th>
                            <th>Fisik</th>
                            <th>Uraian</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>    
                            <td><?php echo $user->kode; ?></td>
                            <td><?php echo $user->nama_item; ?></td>
                            <td><?php echo $user->nama_sub_item; ?></td>
                            <td><?php echo $user->satuan; ?></td>
                            <td><?php echo $user->fisik; ?></td>
                            <td><?php echo $user->uraian; ?></td>
                            <td><?php echo $user->keterangan; ?></td>
                            <td>
                              <a href="<?php echo base_url('users_permohonan_users/tambah_item/'.$user->id_permohonan); ?>" class="btn btn-success"><i class="mdi mdi-cart-plus"></i><span>Tambah</span></a>
                              <a href="<?php echo base_url('users_ubah_permohonan_item/'.$user->id_trans_item); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i><span>Ubah</span></a>
                              <a href="<?php echo base_url('users_hapus_permohonan_item/'.$user->id_trans_item); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i><span>Hapus</span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Item</th>
                            <th>Sub Item</th>
                            <th>Satuan</th>
                            <th>Fisik</th>
                            <th>Uraian</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
