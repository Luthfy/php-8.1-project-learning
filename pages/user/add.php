
<?php

if (@$_POST['submit']) {

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jabatan  = $_POST['jabatan'];
    $role     = $_POST['role'];

    $query = "INSERT INTO tb_users(fullname, username, password, jabatan, role) VALUES ('$fullname', '$username', MD5('$password'), '$jabatan', '$role')";

    $result = $connection->query($query);
}

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tambah User</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=user' ?>">User</a></li>
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=user-tambah' ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>TAMBAH USER</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Nama Lengkap" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Username</label>
                            <div class="col-md-9">
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Passowrd</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Jabatan</label>
                            <div class="col-md-9">
                                <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <select name="role" id="role" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="surveyor">Surveyor</option>
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