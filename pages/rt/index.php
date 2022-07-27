<?php

    $query  = "SELECT tb_rt.*, tb_kelurahan.kelurahan, tb_kecamatan.kecamatan FROM tb_rt LEFT JOIN tb_kelurahan ON tb_rt.kelurahan_id=tb_kelurahan.id LEFT JOIN tb_kecamatan ON tb_rt.kecamatan_id=tb_kecamatan.id";

    $result = $connection->query($query);

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Master RT</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            RT
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
                        <b>DAFTAR RT</b>
                        <a href="<?= $_SERVER['PHP_SELF'] . '?page=rt-tambah' ?>" class="text-primary"><span class="fas fa-plus"></span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col">RT</th>
                                    <th scope="col">Kelurahan</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                while ($data = $result->fetch_array()) :
                            ?>
                            <tr>
                                <td scope="col" class="text-center"><?= $i++; ?></td>
                                <td><?= $data['rt'] ?></td>
                                <td><?= $data['kelurahan'] ?></td>
                                <td><?= $data['kecamatan'] ?></td>
                                <td class="text-center">
                                    <a href="<?= $_SERVER['PHP_SELF'] . '?page=rt-edit&id=' . $data['id'] ?>" class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a>
                                    <form action="<?= $_SERVER['PHP_SELF'] . '?page=rt-hapus' ?>" method="post" class="d-inline-block">
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