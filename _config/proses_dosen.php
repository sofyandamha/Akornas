<?php

require_once "config.php";

if (isset($_GET['add'])) {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
    $nama_dosen = strip_tags($_POST['nama_dosen']);
    $tempat_lahir = strip_tags($_POST['tempat_lahir']);
    $tgl_lahir = strip_tags($_POST['tgl_lahir']);
    $jk = strip_tags($_POST['jk']);
    $no_hp = strip_tags($_POST['no_hp']);
    $agama = strip_tags($_POST['agama']);
    $email = strip_tags($_POST['email']);
    $alamat = strip_tags($_POST['alamat']);
    $goldarah = strip_tags($_POST['goldarah']);
    $stat_nikah = strip_tags($_POST['stat_nikah']);
    $stat_dosen = strip_tags($_POST['stat_dosen']);
    $jabatan = strip_tags($_POST['jabatan']);
    $struktural = strip_tags($_POST['struktural']);
    $tahun_pensiun = strip_tags($_POST['tahun_pensiun']);

    $ekstensi  = ['png', 'jpeg', 'jpg'];
    $namaFile    = strtolower($_FILES['foto']['name']);
    $tipe   = pathinfo($namaFile, PATHINFO_EXTENSION);
    $ukuranFile    = $_FILES['foto']['size'];
    $sumber   = $_FILES['foto']['tmp_name'];
    $foto = uniqid();
    $foto .= '.';
    $foto .= $tipe;

    if (in_array($tipe, $ekstensi) === true) {
        if ($ukuranFile < 1048576) { //1 mb
            $lokasi = "../_assets/img/" . $foto;
            create("INSERT INTO dosen VALUES ('$nip','$nik','$nama_dosen','$foto','$tempat_lahir','$tgl_lahir','$jk','$no_hp','$agama','$email','$alamat','$goldarah','$stat_nikah','$stat_dosen','aktif','$jabatan','$struktural','$tahun_pensiun')");
            $upload = move_uploaded_file($sumber, $lokasi);
            if ($upload) {
                echo '<script>
                        alert("Data Berhasil Ditambah")
                        window.location = "' . base_url('dosen') . '";
                        </script>';
            } else {
                echo '<script>
                        alert("Data Gagal Diupload")
                        window.location = "' . base_url('tambah_dosen') . '";
                        </script>';
            }
        } else {
            echo '<script>alert("Maaf Ukuran File Terlalu Besar")
                        window.location = "' . base_url('tambah_dosen') . '";
                        </script>';
        }
    } else {
        echo '<script>alert("Maaf Jenis File Tidak Diizinkan")
                window.location = "' . base_url('tambah_dosen') . '";
                </script>';
    }
} elseif (isset($_GET['edit'])) {
    $nipAsli = mysqli_real_escape_string($koneksi, $_POST['nipAsli']);
    $foto_lama = strip_tags($_POST['foto_lama']);
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
    $nama_dosen = strip_tags($_POST['nama_dosen']);
    $tempat_lahir = strip_tags($_POST['tempat_lahir']);
    $tgl_lahir = strip_tags($_POST['tgl_lahir']);
    $jk = strip_tags($_POST['jk']);
    $no_hp = strip_tags($_POST['no_hp']);
    $agama = strip_tags($_POST['agama']);
    $email = strip_tags($_POST['email']);
    $alamat = strip_tags($_POST['alamat']);
    $goldarah = strip_tags($_POST['goldarah']);
    $stat_nikah = strip_tags($_POST['stat_nikah']);
    $stat_dosen = strip_tags($_POST['stat_dosen']);
    $jabatan = strip_tags($_POST['jabatan']);
    $struktural = strip_tags($_POST['struktural']);
    $tahun_pensiun = strip_tags($_POST['tahun_pensiun']);
    $stat_user = strip_tags($_POST['stat_user']);

    // cek form, apakah user hanya mengubah data tanpa mengganti foto
    // jika foto tidak diubah, simpan data formnya saja
    if ($_FILES['foto']['name'] == '') {
        $query = mysqli_query($koneksi, "UPDATE dosen SET nip='$nip',nik='$nik',nama_dosen='$nama_dosen', tempat_lahir='$tempat_lahir', tanggal_lahir='$tgl_lahir', jenis_kelamin='$jk', no_hp='$no_hp', agama='$agama', email='$email',alamat='$alamat',gol_darah='$goldarah',status_pernikahan='$stat_nikah', status_kepegawaian='$stat_dosen', status_user='$stat_user', jabatan='$jabatan', struktural='$struktural', tahun_pensiun='$tahun_pensiun' WHERE nip='$nipAsli' ");
        if ($query) {
            echo '<script>
                alert("Data Berhasil Diperbarui")
                window.location = "' . base_url('dosen') . '";
                </script>';
        } else {
            echo '<script>
                alert("Data Gagal Diperbarui")
                window.location = "' . base_url('edit_dosen') . '?id=' . $nipAsli . '";
                </script>';
        }
    } elseif ($_FILES['foto']['name'] !== '') {
        $ekstensi  = ['png', 'jpeg', 'jpg'];
        $namaFile    = strtolower($_FILES['foto']['name']);
        $tipe   = pathinfo($namaFile, PATHINFO_EXTENSION);
        $ukuranFile    = $_FILES['foto']['size'];
        $sumber   = $_FILES['foto']['tmp_name'];
        $foto = uniqid();
        $foto .= '.';
        $foto .= $tipe;

        if (in_array($tipe, $ekstensi) === true) {
            if ($ukuranFile < 1048576) { //1 mb
                // hapus foto lama sebelum upload foto baru
                unlink("../_assets/img/" . $foto_lama);

                mysqli_query($koneksi, "UPDATE dosen SET nip='$nip',nik='$nik',nama_dosen='$nama_dosen', foto_dosen='$foto' ,tempat_lahir='$tempat_lahir', tanggal_lahir='$tgl_lahir', jenis_kelamin='$jk', no_hp='$no_hp', agama='$agama', email='$email',alamat='$alamat',gol_darah='$goldarah',status_pernikahan='$stat_nikah', status_kepegawaian='$stat_dosen', status_user='$stat_user', jabatan='$jabatan', struktural='$struktural', tahun_pensiun='$tahun_pensiun' WHERE nip='$nipAsli' ");
                $lokasi = "../_assets/img/" . $foto;
                $upload = move_uploaded_file($sumber, $lokasi);
                if ($upload) {
                    echo '<script>
                            alert("Data Berhasil Ditambah")
                            window.location = "' . base_url('dosen') . '";
                            </script>';
                } else {
                    echo '<script>
                            alert("Data Gagal Diupload")
                            window.location = "' . base_url('edit_dosen') . '?id=' . $nipAsli . '";
                            </script>';
                }
            } else {
                echo '<script>alert("Maaf Ukuran File Terlalu Besar")
                            window.location = "' . base_url('edit_dosen') . '?id=' . $nipAsli . '";
                            </script>';
            }
        } else {
            echo '<script>alert("Maaf Jenis File Tidak Diizinkan")
                    window.location = "' . base_url('edit_dosen') . '?id=' . $nipAsli . '";
                    </script>';
        }
    } else {
        echo '<script>
            alert("Data Gagal Diperbarui")
            window.location = "' . base_url('edit_dosen') . '?id=' . $nipAsli . '";
            </script>';
    }
}
