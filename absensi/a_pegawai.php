<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Data Kinerja Tenaga Pendidikan'; 

    //variabel yang berfungsi mengatifkan sidebar
    $a_pegawai = 'a_pegawai';

    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/datatables/dataTables.bootstrap4.min.css';

    // menghubungkan file header dengan file Pegawai
    $sub = "../";
    require_once "../_template/_header.php";
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Data Kinerja Tenaga Pendidikan</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('absensi/tambah_a_pegawai') ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-user-plus"></i> Tambah Kinerja pegawai</a>
        <!-- <a href="<?= base_url('_report/all_pegawai') ?>" target="_blank" class="btn btn-info btn-sm float-right mr-3"><i class="fas fa-print"></i> Print Data pegawai</a> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama Ten. Pendidik</th>
                <th>NIP</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $data_p = query("SELECT
                    a_pegawai.id_a_pegawai,
                    pegawai.nama_pegawai,
                    pegawai.nip,
                    a_pegawai.jam_masuk,
                    a_pegawai.jam_keluar
                    FROM
                    a_pegawai
                    INNER JOIN pegawai ON pegawai.nip = a_pegawai.nip");
                    foreach ($data_p as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords($p['nama_pegawai']) ?></td>
                            <td><?= $p['nip'] ?></td>
                            <td><?= $p['jam_masuk'] ?></td>
                            <td><?= $p['jam_keluar'] ?></td>
                            <td>
                                <!-- <a href="<?= base_url('detail_pegawai') ?>?id=<?= $p['nip'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a> -->
                                <a href="<?= base_url('absensi/edit_a_pegawai') ?>?id_a_pegawai=<?= $p['id_a_pegawai'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <!-- <a href="<?= base_url('_config/proses_a_pegawai') ?>?delete=<?= $p['id_a_pegawai'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> delete</a> -->
                            </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php

    // menambahkan script khusus untuk halaman ini saja
    $addscript = '
        <script src="'.asset('_assets/vendor/datatables/jquery.dataTables.min.js').'"></script>
        <script src="'.asset('_assets/vendor/datatables/dataTables.bootstrap4.min.js').'"></script>
    
        <script src="'.asset('_assets/js/demo/datatables-demo.js').'"></script>
    ';

    // menghubungkan file footer dengan file detail Pegawai
    require_once "../_template/_footer.php";
?>