<?php
    
    if (@$_POST['submit']) {
        
    }

    $id = $_GET['id'];

    $queryKuisioner         = "SELECT * FROM tb_kuisioner WHERE id='$id'";
    $queryKuisionerKriteria = "SELECT * FROM tb_kuisioner_kriteria WHERE kuisioner_id='$id'";
    $queryKuisionerKepkel   = "SELECT * FROM tb_kuisioner_kepkel WHERE kuisioner_id='$id'";

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Isi Kuisioner</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=isi-kuisioner' ?>">Kuisioner</a></li>
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=isi-kuisioner&id=1' ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>ISI KUISIONER</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                            $resultKuisionerKriteria = $connection->query($queryKuisionerKriteria);
                            $resultKuisionerKepkel   = $connection->query($queryKuisionerKepkel);

                            $kuisionerKriteriaNumRows = $resultKuisionerKriteria->num_rows;
                            $kuisionerKriteriaIds     = array();
                        ?>

                        <table class="table table-bordered">
                            <tr class="text-center">
                                <td width="4%">No</td>
                                <td>Nama</td>
                                <?php for ($i=0; $i < $kuisionerKriteriaNumRows; $i++) : ?>
                                    <td>
                                        <?php
                                            $idKriteria     = $resultKuisionerKriteria->fetch_array()['kriteria_id'];

                                            array_push($kuisionerKriteriaIds, $idKriteria);

                                            $resKriteria    = $connection->query("SELECT * FROM tb_kriteria WHERE id = '$idKriteria'");
                                            $dataKriteria   = $resKriteria->fetch_array();
                                            echo $dataKriteria['kode'] . ' ' . $dataKriteria['nama'];
                                        ?>
                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <?php for ($i=0; $i < $resultKuisionerKepkel->num_rows; $i++) : ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td>
                                        <?php
                                            $idKepkel     = $resultKuisionerKepkel->fetch_array()['kepkel_id'];
                                            $resKepkel    = $connection->query("SELECT * FROM tb_kepkel WHERE id = '$idKepkel'");
                                            $dataKepkel   = $resKepkel->fetch_array();
                                            echo $dataKepkel['nama'];
                                        ?>
                                    </td>
                                    <?php for ($kriteriaIndex=0; $kriteriaIndex < $kuisionerKriteriaNumRows; $kriteriaIndex++) : ?>
                                    <td>
                                        <select name="nilai_kriteria[<?= $kriteriaIndex ?>][]" id="" class="form-control">
                                            <?php
                                                $idBobot = $kuisionerKriteriaIds[$kriteriaIndex];
                                                $bobot = $connection->query("SELECT * FROM tb_bobot WHERE kriteria_id='$idBobot' ORDER BY nilai DESC");

                                                while ($b = $bobot->fetch_array()) {
                                                    echo "<option value='".$b['nilai']."'>" . $b['keterangan'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <?php endfor; ?>
                                </tr>
                            <?php endfor; ?>
                        </table>
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