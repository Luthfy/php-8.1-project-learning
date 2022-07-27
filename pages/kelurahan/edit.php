
<?php

$id = $_GET['id'];

$queryKecamatan = "SELECT * FROM tb_kecamatan";
$resultKecamatan = $connection->query($queryKecamatan);

if (@$_POST['submit']) {

    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan_id'];

    $query = "UPDATE tb_kelurahan SET kelurahan='$kelurahan', kecamatan_id='$kecamatan' WHERE id = '$id'";

    $result = $connection->query($query);

    if ($result) {
        ?>
        <script type="text/javascript">
            window.location.href = location.origin + location.pathname + "?page=kelurahan";
        </script>
        <?php
    }
}

$query  = "SELECT * FROM tb_kelurahan WHERE id = '$id'";

$result = $connection->query($query);
$row    = $result->fetch_assoc();

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Ubah Kelurahan</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=kelurahan' ?>">Kelurahan</a></li>
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=kelurahan-edit&id=' . $row['id'] ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>UBAH KELURAHAN</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Kelurahan</label>
                            <div class="col-md-9">
                                <input type="text" name="kelurahan" class="form-control" id="kelurahan" placeholder="Kelurahan" value="<?= $row['kelurahan'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Kecamatan</label>
                            <div class="col-md-9">
                                <select name="kecamatan_id" id="KecamatanId" class="form-control">
                                    <?php
                                        while ($data = $resultKecamatan->fetch_array()) :
                                    ?>
                                    <option value="<?= $data['id'] ?>" <?= $data['id'] == $row['kecamatan_id'] ? 'selected' : '' ?>><?= $data['kecamatan'] ?></option>
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