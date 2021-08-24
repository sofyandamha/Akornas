<?php

require_once "config.php";

    if (isset($_GET['add']) ) {
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $tahun = strip_tags($_POST['tahun']);
        $semester = strip_tags($_POST['semester']);
        $nilai = strip_tags($_POST['nilai']);

        $create = create("INSERT INTO k_pegawai VALUES ('','$nip','$tahun','$semester','$nilai')");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Ditambah")
            window.location = "'.base_url('kinerja/k_pegawai').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Ditambah")
            window.location = "'.base_url('kinerja/k_pegawai').'";
            </script>';  
        }
    }
    elseif (isset($_GET['edit'])) {
        $id_k_pegawai = mysqli_real_escape_string($koneksi, $_POST['id_k_pegawai']);
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $tahun = strip_tags($_POST['tahun']);
        $semester = strip_tags($_POST['semester']);
        $nilai = strip_tags($_POST['nilai']);

        $update = update("UPDATE k_pegawai SET tahun='$tahun',semester='$semester',nilai='$nilai' WHERE id_k_pegawai='$id_k_pegawai' ");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('kinerja/k_pegawai').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Diperbarui")
            window.location = "'.base_url('kinerja/k_pegawai').'";
            </script>';  
        }
    }
    elseif(isset($_GET['delete'])) {
        // echo $_GET["delete"];
        $sql = "DELETE FROM k_pegawai WHERE id_k_pegawai='" . $_GET["delete"] . "'";
        if (mysqli_query($koneksi, $sql)) {
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('kinerja/k_pegawai').'";
            </script>';  
        } else {
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('kinerja/k_pegawai').'";
            </script>';
        }
    }
