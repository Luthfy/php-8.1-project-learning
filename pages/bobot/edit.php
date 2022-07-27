
<?php

$id = $_GET['id'];

if (@$_POST['submit']) {

    $kode       = $_POST['kode_kriteria'];
    $nama       = $_POST['nama_kriteria'];
    $deskripsi  = $_POST['deskripsi_kriteria'];

    $query = "UPDATE kriteria SET kode_kriteria='$kode', nama_kriteria='$nama', deskripsi_kriteria='$deskripsi' WHERE id = '$id'";

    $result = $connection->query($query);
}

$query  = "SELECT * FROM kriteria WHERE id = '$id'";

$result = $connection->query($query);
$row    = $result->fetch_assoc();

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Ubah Kriteria</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=keluarga' ?>">Keluarga</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Ubah
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=kriteria-edit' ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>UBAH KRITERIA</b> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Kode Kriteria</label>
                            <div class="col-md-9">
                                <input type="text" name="kode_kriteria" class="form-control" id="KodeKriteria" placeholder="Kode Kriteria" value="<?= $row['kode_kriteria'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Kriteria</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_kriteria" class="form-control" id="Nama Kriteria" placeholder="Nama Kriteria" value="<?= $row['nama_kriteria'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Deskripsi Kriteria</label>
                            <div class="col-md-9">
                                <textarea name="deskripsi_kriteria" id="DeskripsiKriteria" cols="30" rows="10" class="form-control"><?= $row['deskripsi_kriteria'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>