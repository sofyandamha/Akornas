<?php

require_once "config.php";

    if (isset($_GET['add']) ) {
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $jam_masuk = strip_tags($_POST['jam_masuk']);
        $jam_keluar = strip_tags($_POST['jam_keluar']);

        $create = create("INSERT INTO a_pegawai VALUES ('','$nip','$jam_masuk','$jam_keluar')");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Ditambah")
            window.location = "'.base_url('absensi/a_pegawai').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Ditambah")
            window.location = "'.base_url('absensi/a_pegawai').'";
            </script>';  
        }
    }
    elseif (isset($_GET['edit'])) {
        $id_a_pegawai = mysqli_real_escape_string($koneksi, $_POST['id_a_pegawai']);
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $jam_masuk = strip_tags($_POST['jam_masuk']);
        $jam_keluar = strip_tags($_POST['jam_keluar']);

        $update = update("UPDATE a_pegawai SET jam_masuk='$jam_masuk',jam_keluar='$jam_keluar' WHERE id_a_pegawai='$id_a_pegawai' ");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('absensi/a_pegawai').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Diperbarui")
            window.location = "'.base_url('absensi/a_pegawai').'";
            </script>';  
        }
    }
    elseif(isset($_GET['delete'])) {
        // echo $_GET["delete"];
        $sql = "DELETE FROM a_pegawai WHERE id_a_pegawai='" . $_GET["delete"] . "'";
        if (mysqli_query($koneksi, $sql)) {
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('absensi/a_pegawai').'";
            </script>';  
        } else {
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('absensi/a_pegawai').'";
            </script>';
        }
    }
