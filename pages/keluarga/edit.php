
<?php

$id = $_GET['id'];

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

    $query = "UPDATE tb_kepkel SET nik='$nik', nama='$nama', kecamatan_id='$kecId', kelurahan_id='$kelId', rt_id='$rtId', tanggal_lahir='$tglLahir' WHERE id = '$id'";

    $result = $connection->query($query);
    
    if ($result) {
        ?>
        <script type="text/javascript">
            window.location.href = location.origin + location.pathname + "?page=keluarga";
        </script>
        <?php
    }
}

$query  = "SELECT * FROM tb_kepkel WHERE id = '$id'";

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
                                <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK Kepala Keluarga" value="<?= $row['nik'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Kepala Keluarga</label>
                            <div class="col-md-9">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Kepala Keluarga" value="<?= $row['nama'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggalLahir" placeholder="Tanggal Lahir Kepala Keluarga" value="<?= $row['tanggal_lahir'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Kecamatan</label>
                            <div class="col-md-9">
                                <select name="kecamatan_id" id="KecamatanId" class="form-control">
                                    <?php
                                        while ($kecamatanId = $resultKecamatan->fetch_array()) :
                                    ?>
                                    <option value="<?= $kecamatanId['id'] ?>" <?= $row['kecamatan_id'] == $kecamatanId['id'] ? 'selected' : ''  ?>><?= $kecamatanId['kecamatan'] ?></option>
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
                                        while ($kelurahanId = $resultKelurahan->fetch_array()) :
                                    ?>
                                    <option value="<?= $kelurahanId['id'] ?>" <?= $row['kelurahan_id'] == $kelurahanId['id'] ? 'selected' : ''  ?>><?= $kelurahanId['kelurahan'] ?></option>
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
                                        while ($rtId = $resultRt->fetch_array()) :
                                    ?>
                                    <option value="<?= $rtId['id'] ?>"  <?= $row['rt_id'] == $rtId['id'] ? 'selected' : ''  ?>><?= $rtId['rt'] ?></option>
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