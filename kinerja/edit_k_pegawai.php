<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Edit Data Pendidikan'; 
    //variabel yang berfungsi mengatifkan sidebar
    $k_pegawai = 'k_pegawai';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

    // menghubungkan file header dengan file edit_pegawai
    // tentukan variabel yang akan dikirim sebagai nilai tambahan untuk memperjelas alamat file bahwa letak file tersebut ada disubfolder
    $sub = "../";
    require_once "../_template/_header.php";
    //simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
    $id_k_pegawai = $_GET['id_k_pegawai'];

    // paggil data keluarga pegawai berdasarkan id untuk ditampilkan di form sebelum melakukan perubahan data
    $data = query("SELECT
    k_pegawai.id_k_pegawai,
    k_pegawai.nip,
    k_pegawai.tahun,
    k_pegawai.semester,
    k_pegawai.nilai,
    pegawai.nama_pegawai
    FROM
    k_pegawai
    INNER JOIN pegawai ON pegawai.nip = k_pegawai.nip WHERE id_k_pegawai='$id_k_pegawai'");
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('kinerja/k_pegawai') ?>">Data Tenaga Pendidikan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Jabatan</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_k_pegawai') ?>?edit">
            <div class="form-group row">
                <label for="id_k_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                <div class="col-sm-9">
                    <input type="hidden" name="id_k_pegawai" id="id_k_pegawai" class="form-control" value="<?= $data[0]['id_k_pegawai'] ?>">
                    <input type="hidden" name="nip" id="nip" class="form-control" value="<?= $data[0]['nip'] ?>">
                    <input type="text" name="id_k_pegawai2" id="id_k_pegawai2" class="form-control" value="<?= ucwords($data[0]['nama_pegawai']) .' - '.$data[0]['nip'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="tahun" id="tahun" value="<?= $data[0]['tahun'] ?>" placeholder="Tahun" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="semester" class="col-sm-3 col-form-label">Semester</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" value="<?= $data[0]['semester'] ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai" class="col-sm-3 col-form-label">Nilai</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $data[0]['nilai'] ?>" name="nilai" placeholder="Nilai" required>
                </div>
            </div>   
        <!-- disini tanda tempat form -->
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
    </div>
    </form>
</div>


<?php

    $addscript = '
        <script src="'.asset('_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js').'"></script>
        <script>
            $(".datepicker").datepicker()

            
        $(document).on("change", ".custom-file-input", function (event) {
            $(this).next(".custom-file-label").html(event.target.files[0].name);
            })    
        </script>
    ';

    // menghubungkan file footer dengan file edit_pegawai
    require_once "../_template/_footer.php";
?>