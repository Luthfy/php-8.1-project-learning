
<?php

$queryKecamatan = "SELECT * FROM tb_kecamatan";
$resultKecamatan = $connection->query($queryKecamatan);

$queryKelurahan  = "SELECT * FROM tb_kelurahan";
$resultKelurahan = $connection->query($queryKelurahan);

if (@$_POST['submit']) {

    $rt = $_POST['rt'];
    $kecamatan = $_POST['kecamatan_id'];
    $kelurahan = $_POST['kelurahan_id'];

    $query = "INSERT INTO tb_rt(rt, kecamatan_id, kelurahan_id) VALUES ('$rt', '$kecamatan', '$kelurahan')";

    $result = $connection->query($query);

    if ($result) {
        ?>
        <script type="text/javascript">
            window.location.href = location.origin + location.pathname + "?page=rt";
        </script>
        <?php
    }
}

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tambah RT</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=rt' ?>">RT</a></li>
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=rt-tambah' ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>TAMBAH RT</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">RT</label>
                            <div class="col-md-9">
                                <input type="text" name="rt" class="form-control" id="rt" placeholder="Rt" />
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