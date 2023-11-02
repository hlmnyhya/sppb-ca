<style>
    table {
        font-size: 14px;

    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    thead {
        font-size: 16px;
    }

    .judul h3,
    h2,
    p {
        text-align: center;
        margin: 5px 0 5px 0;
    }

    .form-inline img {

        display: inline-block;
    }

    h2 {
        font-size: 30px;
    }

    .kop tr td {
        text-align: center;
        border: 2px solid white;
        border-collapse: collapse;
    }

    .gambar {
        margin-right: 10px;
    }

    .isi tr td {
        padding-left: 5px;
        padding-right: 5px;
    }

    .ttd {
        text-align: left;
        display: inline-block;
        float: right;
    }
</style>

<script>
    window.load = print_d();

    function print_d() {
        window.print();
    }
    window.onfocus = function() {
        window.close();
    }
</script>

<div class="container-fluid">
    <center>
        <table class="kop">
            <tr>
                <td rowspan="6"><img src="<?= base_url() ?>assets/images/CA_BARU.png" height="150" alt="" class="gambar"></td>
            </tr>
            <tr>
                <td style="font-size: 20px;">PT. CANDI ARTHA</td>
            </tr>
            <tr>
                <td style="font-size: 25px; font-weight: bold;">SURAT PERMOHONAN PERMINTAAN BARANG (SPPB)</td>
            </tr>
            <tr>
                <td>PERIODE <?php echo strtoupper(date('F Y'))?></td>
            </tr>
            <?php foreach ($print as $d) : ?>
            <tr>
                <td>BAGIAN <?php echo strtoupper($d->divisi)?></td>
            </tr>
                <?php break; ?>
            <?php endforeach; ?>
        </table>
    </center>


    <hr size="2px" color="black" style="margin-bottom: 1px;">
    <hr size="2px" color="black" style="margin-top: 1px;">
        <!-- <center> -->
        <table class="mb-5">
        <?php foreach ($print as $d) : ?>
            <tr>
                <td>NO SPPB</td>
                <td><?php echo strtoupper($d->nomor_sppb)?></td>
            </tr>
            <tr>
                <td>TANGGAL </td>
                <td><?php $nama_hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
                // Mengonversi format tanggal dari yyyy-mm-dd menjadi dd mm yyyy (Hari)
                $tanggal_format = date('d-m-Y', strtotime($d->tanggal));
                $hari_index = date('w', strtotime($d->tanggal)); // Mengambil indeks hari (0 = Minggu, 6 = Sabtu)
                $hari_indonesia = $nama_hari[$hari_index]; // Mengambil nama hari dalam bahasa Indonesia
                echo strtoupper($hari_indonesia . ', ' . $tanggal_format);
                ?>
            </td>
            </tr>
                <?php break; ?>
            <?php endforeach; ?>
        </table>
    <!-- </center> -->

    <div>
        <table class="isi" style="width:100%;">
            <thead style="line-height: 40px;">
                <tr>
                    <th class="text-center">KODE</th>
                    <th class="text-center">ITEM</th>
                    <th class="text-center">SUB ITEM</th>
                    <th class="text-center">URAIAN</th>
                    <th class="text-center">SAT</th>
                    <th class="text-center">STOK</th>
                    <th class="text-center">FISIK</th>
                    <th class="text-center">KETERANGAN</th>

                </tr>
            </thead>
            <tbody style="line-height: 30px;">
                <?php $no = 1;
                foreach ($print as $d) : ?>
                    <tr>
                        <td><?php echo $d->kode ?></td>
                        <td><?php echo $d->nama_item ?></td>
                        <td><?php echo $d->nama_sub_item ?></td>
                        <td><?php echo $d->uraian ?></td>
                        <td><?php echo $d->satuan ?></td>
                        <td><?php echo $d->stok ?></td>
                        <td><?php echo $d->fisik ?></td>
                        <td><?php echo $d->keterangan ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
        <!-- Pemohon -->
        <div class="ttd m-3" style="display: inline-block;">
        <?php
        $status = $d->status;
        foreach ($ttd as $t) : 

        if ($status == 'Diajukan') {
            echo '<h5>Diajukan,</h5>';
            echo '<img src="' . base_url('./uploads/ttd/' . $t->ttd_pemohon) . '" alt="user" class="rounded-circle" width="200" height="100">';
            echo '<h5 style="margin-top: 2px; text-align: center">Saul Membi Sembiring</h5>';
            echo '<hr size="" color="black" style="margin-top: 1px;">';
            echo '<h5 style="margin-top: px; text-align: center">Kadiv Harnik</h5>';
        } elseif ($status == 'Diajukan') {
            echo '<h5>Diajukan,</h5>';
            if ($status== 'Diajukan') {
                echo '<br><br><br><br><br>';
                echo '<h5 style="margin-top: 2px; text-align: center">Saul Membi Sembiring</h5>';
                echo '<hr size="" color="black" style="margin-top: 1px;">';
                echo '<h5 style="margin-top: px; text-align: center">Kadiv Harnik</h5>';
            }else {
                echo '<img src="' . base_url('./uploads/ttd/' . $t->ttd_pemohon) . '" alt="user" class="rounded-circle" width="200" height="100">';
                echo '<h5 style="margin-top: 2px; text-align: center">Saul Membi Sembiring</h5>';
                echo '<hr size="" color="black" style="margin-top: 1px;">';
                echo '<h5 style="margin-top: px; text-align: center">Kadiv Harnik</h5>';
            }
        } elseif ($status == 'Disetujui') {
            echo '<h5>Diajukan,</h5>';
            echo '<img src="' . base_url('./uploads/ttd/' .$t->ttd_pemohon) . '" alt="user" class="rounded-circle" width="200" height="100">';
            echo '<h5 style="margin-top: 2px; text-align: center">Saul Membi Sembiring</h5>';
            echo '<hr size="" color="black" style="margin-top: 1px;">';
            echo '<h5 style="margin-top: px; text-align: center">Kadiv Harnik</h5>';
        } else {
            // Status tidak dikenali
            echo '<h5>Status Tidak Dikenali</h5>';
        }
        ?>
        </div>
        <?php endforeach; ?>
        <!-- Diperiksa -->
        <div class="ttd m-3" style="display: inline-block;">
        <?php
        $status = $d->status;
        foreach ($ttd as $t) : 

        if ($status == 'Diperiksa') {
            echo '<h5>Diperiksa,</h5>';
            echo '<img src="' . base_url('./uploads/ttd/' . $t->ttd_ktu) . '" alt="user" class="rounded-circle" width="200" height="100">';
            echo '<h5 style="margin-top: 2px; text-align: center">Kristeli</h5>';
            echo '<hr size="" color="black" style="margin-top: 1px;">';
            echo '<h5 style="margin-top: px; text-align: center">pjs KTU</h5>';
        } elseif ($status == 'Diajukan') {
            echo '<h5>Diperiksa,</h5>';
            if ($status== 'Diajukan') {
                echo '<br><br><br><br><br>';
                echo '<h5 style="margin-top: 2px; text-align: center">Kristeli</h5>';
                echo '<hr size="" color="black" style="margin-top: 1px;">';
                echo '<h5 style="margin-top: px; text-align: center">pjs KTU</h5>';
            }else {
                echo '<img src="' . base_url('./uploads/ttd/' . $t->ttd_ktu) . '" alt="user" class="rounded-circle" width="200" height="100">';
                echo '<h5 style="margin-top: 2px; text-align: center">Kristeli</h5>';
                echo '<hr size="" color="black" style="margin-top: 1px;">';
                echo '<h5 style="margin-top: px; text-align: center">pjs KTU</h5>';
            }
        } elseif ($status == 'Disetujui') {
            echo '<h5>Diperiksa,</h5>';
            echo '<img src="' . base_url('./uploads/ttd/' . $t->ttd_ktu) . '" alt="user" class="rounded-circle" width="200" height="100">';
            echo '<h5 style="margin-top: 2px; text-align: center">Kristeli</h5>';
            echo '<hr size="" color="black" style="margin-top: 1px;">';
            echo '<h5 style="margin-top: px; text-align: center">pjs KTU</h5>';
        } else {
            // Status tidak dikenali
            echo '<h5>Status Tidak Dikenali</h5>';
        }
        ?>
        </div>
        <?php endforeach; ?>
        <!-- Disetujui -->
        <div class="ttd m-3" style="display: inline-block;">
        <?php
        $status = $d->status;
        foreach ($ttd as $t) : 

        if ($status == 'Disetujui') {
            echo '<h5>Disetujui,</h5>';
            echo '<img src="' . base_url('./uploads/ttd/' . $t->ttd_manajer) . '" alt="user" class="rounded-circle" width="200" height="100">';
            echo '<h5 style="margin-top: 2px; text-align: center">Irsan Nurdiansyah J</h5>';
            echo '<hr size="" color="black" style="margin-top: 1px;">';
            echo '<h5 style="margin-top: px; text-align: center">Manajer PKS</h5>';
        } elseif ($status == 'Diajukan') {
            echo '<h5>Disetujui,</h5>';
            if ($status== 'Diajukan') {
                echo '<br><br><br><br><br>';
                echo '<h5 style="margin-top: 2px; text-align: center">Irsan Nurdiansyah J</h5>';
                echo '<hr size="" color="black" style="margin-top: 1px;">';
                echo '<h5 style="margin-top: px; text-align: center">Manajer PKS</h5>';
            }else {
                echo '<img src="' . base_url('./uploads/ttd/' . $t->ttd_manajer) . '" alt="user" class="rounded-circle" width="200" height="100">';
                echo '<h5 style="margin-top: 2px; text-align: center">Irsan Nurdiansyah J</h5>';
                echo '<hr size="" color="black" style="margin-top: 1px;">';
                echo '<h5 style="margin-top: px; text-align: center">Manajer PKS</h5>';
            }
        } elseif ($status == 'Disetujui') {
            echo '<h5>Disetujui,</h5>';
            echo '<img src="' . base_url('./uploads/ttd/' . $t->ttd_manajer) . '" alt="user" class="rounded-circle" width="200" height="100">';
            echo '<h5 style="margin-top: 2px; text-align: center">Irsan Nurdiansyah J</h5>';
            echo '<hr size="" color="black" style="margin-top: 1px;">';
            echo '<h5 style="margin-top: px; text-align: center">Manajer PKS</h5>';
        } else {
            // Status tidak dikenali
            echo '<h5>Status Tidak Dikenali</h5>';
        }
        ?>
        </div>
        <?php endforeach; ?>
</div>