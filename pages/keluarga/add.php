
<?php

if (@$_POST['submit']) {
        
    $nik    = $_POST['nik_kepala_keluarga'];
    $nama   = $_POST['nama_kepala_keluarga'];
    $jumlah = $_POST['jumlah_anggota_keluarga'];

    $query = "INSERT INTO keluarga(nik_kepala_keluarga, nama_kepala_keluarga, jumlah_anggota_keluarga) VALUES ('$nik', '$nama', '$jumlah')";

    $result = $connection->query($query);
}

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tambah Anggota Keluarga</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=keluarga' ?>">Keluarga</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=keluarga-tambah' ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>TAMBAH KEPALA KELUARGA</b> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">NIK Kepala Keluarga</label>
                            <div class="col-md-9">
                                <input type="text" name="nik_kepala_keluarga" class="form-control" id="NikKepalaKeluarga" placeholder="NIK Kepala Keluarga" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Kepala Keluarga</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_kepala_keluarga" class="form-control" id="NamaKepalaKeluarga" placeholder="Nama Kepala Keluarga" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Jumlah Anggota Keluarga</label>
                            <div class="col-md-9">
                                <input type="number" name="jumlah_anggota_keluarga" class="form-control" id="JumlahAnggotaKeluarga" placeholder="Jumlah Anggota Keluarga" />
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