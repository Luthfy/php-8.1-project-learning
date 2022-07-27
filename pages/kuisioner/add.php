
<?php


if (@$_POST['submit']) {

    $kode       = $_POST['kode'];
    $bulan      = $_POST['bulan'];
    $tahun      = $_POST['tahun'];
    $kriteria   = $_POST['kriteria'];
    $kepkel     = $_POST['kepkel'];

    $queryKuisioner  = "INSERT INTO tb_kuisioner (kode, bulan, tahun) VALUES ('$kode', '$bulan', '$tahun')";
    $resultKuisioner = $connection->query($queryKuisioner);

    if ($resultKuisioner) {

        $kuisioner = $connection->query("SELECT * FROM tb_kuisioner ORDER BY id DESC LIMIT 1");
        $resultKuisioner = $kuisioner->fetch_array();

        $resultKriteriaId = $resultKuisioner['id'];

        foreach ($kriteria as $k) {
            $connection->query("INSERT INTO tb_kuisioner_kriteria (kuisioner_id, kriteria_id) VALUES ('$resultKriteriaId', '$k')");
        }

        foreach ($kepkel as $kel) {
            $connection->query("INSERT INTO tb_kuisioner_kepkel (kuisioner_id, kepkel_id) VALUES ('$resultKriteriaId', '$kel')");
        }

    }

?>
    <script type="text/javascript">
        window.location.href = location.origin + location.pathname + "?page=kuisioner";
    </script>
<?php

}

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tambah Kuisioner</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=kuisioner' ?>">Kuisioner</a></li>
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=kuisioner-tambah' ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>TAMBAH KUISIONER</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="mt-3">Kode Kuisioner</label>
                                    <input type="text" name="kode" class="form-control" id="" placeholder="Kode Kuisioner" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="mt-3">Bulan Kuisioner</label>
                                    <input type="text" name="bulan" class="form-control" id="" placeholder="Bulan Kuisioner" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="mt-3">Tahun Kuisioner</label>
                                    <input type="text" name="tahun" class="form-control" id="" placeholder="Tahun Kuisioner" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="mt-3">Pilih Kriteria Kuisioner</label>
                                <div class="row">
                                    <?php
                                        $queryKriteria  = "SELECT * FROM tb_kriteria ORDER BY kode";
                                        $resultKriteria = $connection->query($queryKriteria);
                                        while ($data = $resultKriteria->fetch_array()) :
                                    ?>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="kriteria[]" value="<?= $data['id'] ?>">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            <?= $data['kode'] . ' - ' . $data['nama'] ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <ol>
                                                    <?php
                                                        $queryBobot  = "SELECT * FROM tb_bobot WHERE kriteria_id='". $data['id'] . "' ORDER BY nilai DESC";
                                                        $resultBobot = $connection->query($queryBobot);

                                                        while ($bobot = $resultBobot->fetch_array()) :
                                                    ?>
                                                            <li><?= $bobot['keterangan'] ?> - <?= $bobot['deskripsi'] ?> : <?= $bobot['nilai'] ?></li>
                                                    <?php
                                                        endwhile;
                                                    ?>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="mt-3">Pilih Kepala Keluarga</label>
                                <div class="row">
                                    <?php
                                        $queryKepkel  = "SELECT * FROM tb_kepkel ORDER BY nik ASC";
                                        $resultKepKel = $connection->query($queryKepkel);

                                        while ($kepkel = $resultKepKel->fetch_array()) :
                                    ?>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="kepkel[]" value="<?= $kepkel['id'] ?>">
                                                        <label class="" for="flexCheckDefault">
                                                            <?= $kepkel['nik'] . ' - ' . $kepkel['nama'] ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>
                                </div>
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