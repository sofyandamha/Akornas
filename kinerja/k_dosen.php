<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Data Kinerja Dosen'; 

    //variabel yang berfungsi mengatifkan sidebar
    $k_dosen = 'k_dosen';

    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/datatables/dataTables.bootstrap4.min.css';

    // menghubungkan file header dengan file Pegawai
    $sub = "../";
    require_once "../_template/_header.php";
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Data Kinerja Dosen</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('kinerja/tambah_k_dosen') ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-user-plus"></i> Tambah Kinerja Dosen</a>
        <!-- <a href="<?= base_url('_report/all_pegawai') ?>" target="_blank" class="btn btn-info btn-sm float-right mr-3"><i class="fas fa-print"></i> Print Data Dosen</a> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama Dosen</th>
                <th>NIP</th>
                <th>Tahun</th>
                <th>Semester</th>
                <th>Nilai</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $data_p = query("SELECT
                                    dosen.nama_dosen,
                                    dosen.nip,
                                    k_dosen.id_k_dosen,
                                    k_dosen.tahun,
                                    k_dosen.semester,
                                    k_dosen.nilai FROM  k_dosen INNER JOIN dosen ON dosen.nip = k_dosen.nip");
                    foreach ($data_p as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords($p['nama_dosen']) ?></td>
                            <td><?= $p['nip'] ?></td>
                            <td><?= $p['tahun'] ?></td>
                            <td><?= $p['semester'] ?></td>
                            <td><?= $p['nilai']?></td>
                            <td>
                                <!-- <a href="<?= base_url('detail_dosen') ?>?id=<?= $p['nip'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a> -->
                                <a href="<?= base_url('kinerja/edit_k_dosen') ?>?id_k_dosen=<?= $p['id_k_dosen'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url('_config/proses_k_dosen') ?>?delete=<?= $p['id_k_dosen'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> delete</a>
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