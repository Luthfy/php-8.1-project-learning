<?php

    $query = "SELECT * FROM tb_kriteria Order By kode";

    $result = $connection->query($query);

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Master Kriteria</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Kriteria
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
                        <b>DAFTAR KEPALA KRITERIA</b> 
                        <a href="<?= $_SERVER['PHP_SELF'] . '?page=kriteria-tambah' ?>" class="text-primary"><span class="fas fa-plus"></span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" width="4%">No</th>
                                    <th scope="col">Kode Kriteria</th>
                                    <th scope="col">Nama Kriteria</th>
                                    <th scope="col">Deskripsi kriteria</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    while ($data = $result->fetch_array()) :
                                ?>
                                <tr>
                                    <td scope="col" class="text-center"><?= $i++; ?></td>
                                    <td><?= $data['kode'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['deskripsi'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= $_SERVER['PHP_SELF'] . '?page=kriteria-detail&id=' . $data['id'] ?>" class="btn btn-sm btn-primary text-white"><span class="fas fa-eye"></span></a>
                                        <a href="<?= $_SERVER['PHP_SELF'] . '?page=kriteria-edit&id=' . $data['id'] ?>" class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a>
                                        <form action="<?= $_SERVER['PHP_SELF'] . '?page=kriteria-hapus' ?>" method="post" class="d-inline-block">
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