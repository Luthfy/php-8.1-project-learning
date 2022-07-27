<?php

    $query  = "SELECT * FROM tb_users";

    $result = $connection->query($query);
?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Master User</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            User
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
                        <b>DAFTAR USER</b>
                        <a href="<?= $_SERVER['PHP_SELF'] . '?page=user-tambah' ?>" class="text-primary"><span class="fas fa-plus"></span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                while ($data = $result->fetch_array()) :
                            ?>
                            <tr>
                                <td scope="col"><?= $i++; ?></td>
                                <td><?= $data['fullname'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['jabatan'] ?></td>
                                <td><?= $data['role'] ?></td>
                                <td>
                                    <a href="<?= $_SERVER['PHP_SELF'] . '?page=user-edit&id=' . $data['id'] ?>" class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a>
                                    <form action="<?= $_SERVER['PHP_SELF'] . '?page=user-hapus' ?>" method="post" class="d-inline-block">
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