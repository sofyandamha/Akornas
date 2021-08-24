<?php

require_once "config.php";

    if (isset($_GET['add']) ) {
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $jam_masuk = strip_tags($_POST['jam_masuk']);
        $jam_keluar = strip_tags($_POST['jam_keluar']);

        $create = create("INSERT INTO a_dosen VALUES ('','$nip','$jam_masuk','$jam_keluar')");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Ditambah")
            window.location = "'.base_url('absensi/a_dosen').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Ditambah")
            window.location = "'.base_url('absensi/a_dosen').'";
            </script>';  
        }
    }
    elseif (isset($_GET['edit'])) {
        $id_a_dosen = mysqli_real_escape_string($koneksi, $_POST['id_a_dosen']);
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $jam_masuk = strip_tags($_POST['jam_masuk']);
        $jam_keluar = strip_tags($_POST['jam_keluar']);

        $update = update("UPDATE a_dosen SET jam_masuk='$jam_masuk',jam_keluar='$jam_keluar' WHERE id_a_dosen='$id_a_dosen' ");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('absensi/a_dosen').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Diperbarui")
            window.location = "'.base_url('absensi/a_dosen').'";
            </script>';  
        }
    }
    elseif(isset($_GET['delete'])) {
        // echo $_GET["delete"];
        $sql = "DELETE FROM a_dosen WHERE id_a_dosen='" . $_GET["delete"] . "'";
        if (mysqli_query($koneksi, $sql)) {
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('absensi/a_dosen').'";
            </script>';  
        } else {
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('absensi/a_dosen').'";
            </script>';
        }
    }
