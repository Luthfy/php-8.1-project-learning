
<?php

$queryKecamatan = "SELECT * FROM tb_kecamatan";
$resultKecamatan = $connection->query($queryKecamatan);

$queryKelurahan  = "SELECT * FROM tb_kelurahan";
$resultKelurahan = $connection->query($queryKelurahan);

$queryRt  = "SELECT * FROM tb_rt";
$resultRt = $connection->query($queryRt);

if (@$_POST['submit']) {
        
    $nik        = $_POST['nik'];
    $nama       = $_POST['nama'];
    $tglLahir   = $_POST['tanggal_lahir'];
    $kecId      = $_POST['kecamatan_id'];
    $kelId      = $_POST['kelurahan_id'];
    $rtId       = $_POST['rt_id'];

    $query = "INSERT INTO tb_kepkel(nik, nama, tanggal_lahir, kecamatan_id, kelurahan_id, rt_id) VALUES ('$nik', '$nama', '$tglLahir', '$kecId', '$kelId', '$rtId')";

    $result = $connection->query($query);

    if ($result) {
        ?>
        <script type="text/javascript">
            window.location.href = location.origin + location.pathname + "?page=keluarga";
        </script>
        <?php
    }
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
                                <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK Kepala Keluarga" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Kepala Keluarga</label>
                            <div class="col-md-9">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Kepala Keluarga" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggalLahir" placeholder="Tanggal Lahir Kepala Keluarga" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Kecamatan</label>
                            <div class="col-md-9">
                                <select name="kecamatan_id" id="KecamatanId" class="form-control">
                                    <?php
                                        while ($data = $resultKecamatan->fetch_array()) :
                                    ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['kecamatan'] ?></option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Kelurahan</label>
                            <div class="col-md-9">
                                <select name="kelurahan_id" id="KecamatanId" class="form-control">
                                    <?php
                                        while ($data = $resultKelurahan->fetch_array()) :
                                    ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['kelurahan'] ?></option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">RT</label>
                            <div class="col-md-9">
                                <select name="rt_id" id="RtId" class="form-control">
                                    <?php
                                        while ($data = $resultRt->fetch_array()) :
                                    ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['rt'] ?></option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
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