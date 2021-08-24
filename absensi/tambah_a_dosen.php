<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Tambah Kinerja Dosen'; 
    //variabel yang berfungsi mengatifkan sidebar
    $a_dosen = 'a_dosen';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
    // menghubungkan file header dengan file tambah Pegawai
    $sub = "../";
    require_once "../_template/_header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('dosen') ?>">Data Dosen</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_a_dosen') ?>?add" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">Pilih Dosen</label>
                <div class="col-sm-9">
                    <select class="form-control" name="nip" id="nip" required autocomplete="off" autofocus>
                        <?php
                            $data_dosen=query("SELECT * FROM dosen GROUP BY nama_dosen asc");
                            foreach ($data_dosen as $dosen) : ?>
                                <option value="<?= $dosen['nip'] ?>"><?= $dosen['nama_dosen'].' - '.$dosen['nip'] ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jam_masuk" class="col-sm-3 col-form-label">Jam Masuk</label>
                <div class="col-sm-9">
                    <input type="time" class="form-control" name="jam_masuk" id="jam_masuk" placeholder="Jam Masuk" required autocomplete="off" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jam_keluar" class="col-sm-3 col-form-label">Jam Keluar</label>
                <div class="col-sm-9">
                    <input type="time" class="form-control" name="jam_keluar" id="jam_keluar" placeholder="Jam Keluar" required autocomplete="off">
                </div>
            </div>
            
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
        <a href="<?= base_url('absensi/a_dosen') ?>" class="btn btn-warning"><i class="fas fa-fw fa-chevron-left"></i> Kembali</a>
    </div>
    </form>
</div>


<?php

    // menambahkan script khusus untuk halaman ini saja
    $addscript = '
        <script src="'.asset('_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js').'"></script>
        <script>
            $(".datepicker").datepicker()

            
        $(document).on("change", ".custom-file-input", function (event) {
            $(this).next(".custom-file-label").html(event.target.files[0].name);
            })    
        </script>
    ';
    // menghubungkan file footer dengan file tambah Pegawai
    require_once "../_template/_footer.php";
?>