<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Edit Data Pendidikan'; 
    //variabel yang berfungsi mengatifkan sidebar
    $a_pegawai = 'a_pegawai';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

    // menghubungkan file header dengan file edit_pegawai
    // tentukan variabel yang akan dikirim sebagai nilai tambahan untuk memperjelas alamat file bahwa letak file tersebut ada disubfolder
    $sub = "../";
    require_once "../_template/_header.php";
    //simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
    $id_a_pegawai = $_GET['id_a_pegawai'];

    // paggil data keluarga pegawai berdasarkan id untuk ditampilkan di form sebelum melakukan perubahan data
    $data = query("SELECT
    a_pegawai.id_a_pegawai,
    a_pegawai.nip,
    a_pegawai.jam_masuk,
    a_pegawai.jam_keluar,
    pegawai.nama_pegawai
    FROM
    a_pegawai
    INNER JOIN pegawai ON pegawai.nip = a_pegawai.nip WHERE id_a_pegawai='$id_a_pegawai'");
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Data Tenaga Pendidikan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Jabatan</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_a_pegawai') ?>?edit">
            <div class="form-group row">
                <label for="id_a_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                <div class="col-sm-9">
                    <input type="hidden" name="id_a_pegawai" id="id_a_pegawai" class="form-control" value="<?= $data[0]['id_a_pegawai'] ?>">
                    <input type="hidden" name="nip" id="nip" class="form-control" value="<?= $data[0]['nip'] ?>">
                    <input type="text" name="id_a_pegawai2" id="id_a_pegawai2" class="form-control" value="<?= ucwords($data[0]['nama_pegawai']) .' - '.$data[0]['nip'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="jam_masuk" class="col-sm-3 col-form-label">Jam Masuk</label>
                <div class="col-sm-9">
                    <input type="time" class="form-control" name="jam_masuk" id="jam_masuk" value="<?= $data[0]['jam_masuk'] ?>"  required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="jam_keluar" class="col-sm-3 col-form-label">Jam Keluar</label>
                <div class="col-sm-9">
                    <input type="time" class="form-control" name="jam_keluar" id="jam_keluar" value="<?= $data[0]['jam_keluar'] ?>" required autocomplete="off">
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