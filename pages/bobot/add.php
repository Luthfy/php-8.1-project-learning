
<?php

$kriteria = $_GET['kriteria'];

$queryKriteria = "SELECT * FROM tb_kriteria WHERE id='$kriteria'";
$resultKriteria = $connection->query($queryKriteria);
$row = $resultKriteria->fetch_assoc();

if (@$_POST['submit']) {
        
    $deskripsi  = $_POST['deskripsi'];
    $keterangan = $_POST['keterangan'];
    $nilai      = $_POST['nilai'];

    $query = "INSERT INTO tb_bobot(keterangan, deskripsi, nilai, kriteria_id) VALUES ('$keterangan', '$deskripsi', '$nilai', '$kriteria')";

    $result = $connection->query($query);

    if ($result) {
        ?>
            <script type="text/javascript">
                window.location.href = location.origin + location.pathname + location.search.replace("bobot-tambah&kriteria", "kriteria-detail&id");
            </script>
        <?php
    }
}

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tambah bobot</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=kriteria-detail&id=' . $kriteria ?>">Detail Kriteria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah Bobot
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=bobot-tambah&kriteria=' . $kriteria ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>TAMBAH bobot</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Kode Kriteria</label>
                            <div class="col-md-9">
                                <input type="text" name="kriteria_id" class="form-control" id="KodeKriteria" placeholder="Kriteria ID" value="<?= $row['kode'] . ' - ' . $row['nama'] ?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Keterangan</label>
                            <div class="col-md-9">
                                <input type="text" name="keterangan" class="form-control" id="KeteranganBobot" placeholder="Keterangan Bobot" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Deskripsi</label>
                            <div class="col-md-9">
                                <input type="text" name="deskripsi" class="form-control" id="DeskripsiBobot" placeholder="Deskripsi Bobot" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nilai</label>
                            <div class="col-md-9">
                                <input type="text" name="nilai" class="form-control" id="NilaiBobot" placeholder="Nilai Bobot" />
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