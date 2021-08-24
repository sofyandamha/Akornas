<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Data Dosen'; 

    //variabel yang berfungsi mengatifkan sidebar
    $dosen = 'dosen';

    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/datatables/dataTables.bootstrap4.min.css';

    // menghubungkan file header dengan file Pegawai
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Data Dosen</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('tambah_dosen') ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-user-plus"></i> Tambah Dosen</a>
        <a href="<?= base_url('_report/all_dosen') ?>" target="_blank" class="btn btn-info btn-sm float-right mr-3"><i class="fas fa-print"></i> Print Data Dosen</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama Dosen</th>
                <th>NIP</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Status Kepegawaian</th>
                <th>Aktif/Nonaktif</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $data_p = query("SELECT * FROM dosen GROUP BY nama_dosen asc");
                    foreach ($data_p as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords($p['nama_dosen']) ?></td>
                            <td><?= $p['nip'] ?></td>
                            <td><?= $p['email'] ?></td>
                            <td><?= $p['no_hp'] ?></td>
                            <td><?= strtoupper($p['status_kepegawaian']) ?></td>
                            <td><?= ucwords($p['status_user']) ?></td>
                            <td>
                                <a href="<?= base_url('detail_dosen') ?>?id=<?= $p['nip'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                <a href="<?= base_url('edit_dosen') ?>?id=<?= $p['nip'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url('_report/report_dosen') ?>?id=<?= $p['nip'] ?>" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print</a>
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
    require_once "_template/_footer.php";
?>