<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Profil</h4>
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
                <div class="row">
                    <div class="col-md-3">
                        <img style="width: 200px" src="<?= base_url('./uploads/profil/'.$this->session->userdata('gambar')); ?>" alt="Gambar User">
                    </div>
                    <div class="col-md-4">
                        <table class="table">
                            <tr>
                                <td><strong>Nama</strong></td>
                                <td>:</td>
                                <td><?= $this->session->userdata('nama'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>NIP/NIK</strong></td>
                                <td>:</td>
                                <td><?= $this->session->userdata('nip'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Divisi</strong></td>
                                <td>:</td>
                                <td><?= $this->session->userdata('id_divisi'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Username</strong></td>
                                <td>:</td>
                                <td><?= $this->session->userdata('username'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tanda Tangan</strong></td>
                                <td>:</td>
                                <td>
                                    <?php if (!empty($this->session->userdata('gambar_ttd'))): ?>
                                        <img src="<?= base_url('./uploads/ttd/'.$this->session->userdata('gambar_ttd')); ?>" width="100px" height="100px" alt="Tanda Tangan User">
                                    <?php else: ?>
                                        Tidak ada tanda tangan
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
