
<?php

$id = $_GET['id'];

if (@$_POST['submit']) {
        
    $nik    = $_POST['nik_kepala_keluarga'];
    $nama   = $_POST['nama_kepala_keluarga'];
    $jumlah = $_POST['jumlah_anggota_keluarga'];

    $query = "UPDATE keluarga SET nik_kepala_keluarga='$nik', nama_kepala_keluarga='$nama', jumlah_anggota_keluarga='$jumlah' WHERE id = '$id'";

    $result = $connection->query($query);
}

$query  = "SELECT * FROM keluarga WHERE id = '$id'";

$result = $connection->query($query);
$row    = $result->fetch_assoc();

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Ubah Anggota Keluarga</h4>
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=keluarga-edit&id=' . $row['id'] ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>FORM KEPALA KELUARGA</b> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">NIK Kepala Keluarga</label>
                            <div class="col-md-9">
                                <input type="text" name="nik_kepala_keluarga" class="form-control" id="NikKepalaKeluarga" placeholder="NIK Kepala Keluarga" value="<?= $row['nik_kepala_keluarga'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Kepala Keluarga</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_kepala_keluarga" class="form-control" id="NamaKepalaKeluarga" placeholder="Nama Kepala Keluarga" value="<?= $row['nama_kepala_keluarga'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Jumlah Anggota Keluarga</label>
                            <div class="col-md-9">
                                <input type="number" name="jumlah_anggota_keluarga" class="form-control" id="JumlahAnggotaKeluarga" placeholder="Jumlah Anggota Keluarga" value="<?= $row['jumlah_anggota_keluarga'] ?>" />
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