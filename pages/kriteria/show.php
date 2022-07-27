
<?php

    $id = $_GET['id'];

    $queryKriteria  = "SELECT * FROM tb_kriteria WHERE id = '$id'";
    $queryBobot     = "SELECT * FROM tb_bobot WHERE kriteria_id = '$id' ORDER BY nilai DESC";

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
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=kriteria' ?>">Kriteria</a></li>
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
                                <?= $row['kode'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 mt-3">Nama Kriteria</label>
                        <div class="col-md-9">
                            <p>
                                <?= $row['nama'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 mt-3">Deskripsi Kriteria</label>
                        <div class="col-md-9">
                            <p>
                                <?= $row['deskripsi'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <b>DAFTAR BOBOT</b> 
                        <a href="<?= $_SERVER['PHP_SELF'] . '?page=bobot-tambah&kriteria=' . $row['id'] ?>" class="text-primary"><span class="fas fa-plus"></span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" width="4%">No</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Nilai</th>
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
                                    <td><?= $data['keterangan'] ?></td>
                                    <td><?= $data['deskripsi'] ?></td>
                                    <td><?= $data['nilai'] ?></td>
                                    <td class="text-center">
                                        <form action="<?= $_SERVER['PHP_SELF'] . '?page=bobot-hapus&kriteria=' . $data['kriteria_id'] ?>" method="post" class="d-inline-block">
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