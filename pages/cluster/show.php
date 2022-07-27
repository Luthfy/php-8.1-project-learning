
<?php

    $id = $_GET['id'];

    $queryKriteria  = "SELECT * FROM kriteria WHERE id = '$id'";
    $queryBobot     = "SELECT * FROM bobot WHERE kriteria_id = '$id' ORDER BY nilai_bobot DESC";

    $result = $connection->query($queryKriteria);
    $row    = $result->fetch_assoc();

    $resultBobot = $connection->query($queryBobot);
?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">DETAIL KRITERIA</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=kriteria' ?>">Keluarga</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Detail
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
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <b>Detal Kriteria</b> 
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 mt-3">Kode Kriteria</label>
                        <div class="col-md-9">
                            <p>
                                <?= $row['kode_kriteria'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 mt-3">Nama Kriteria</label>
                        <div class="col-md-9">
                            <p>
                                <?= $row['nama_kriteria'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 mt-3">Deskripsi Kriteria</label>
                        <div class="col-md-9">
                            <p>
                                <?= $row['deskripsi_kriteria'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <b>DAFTAR BOBOT</b> 
                        <a href="<?= $_SERVER['PHP_SELF'] . '?page=bobot-tambah' ?>" class="text-danger"><span class="fas fa-plus"></span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Keterangan Bobot</th>
                                    <th scope="col">Nilai Bobot</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    while ($data = $resultBobot->fetch_array()) :
                                ?>
                                <tr>
                                    <td scope="col"><?= $i++; ?></td>
                                    <td><?= $data['keterangan_bobot'] ?></td>
                                    <td><?= $data['nilai_bobot'] ?></td>
                                    <td>
                                        <a href="<?= $_SERVER['PHP_SELF'] . '?page=bobot-edit&id=' . $data['id'] ?>" class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a>
                                        <form action="<?= $_SERVER['PHP_SELF'] . '?page=bobot-hapus' ?>" method="post" class="d-inline-block">
                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>