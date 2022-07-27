
<?php

$id = $_GET['id'];

if (@$_POST['submit']) {

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jabatan  = $_POST['jabatan'];
    $role     = $_POST['role'];

    $query  = "UPDATE tb_users SET ";
    $query .= "fullname='$fullname', username='$username', jabatan='$jabatan', role='$role'";

    if ($_POST['password'] != "" || $_POST['password'] != NULL) {
        $query .= "passowrd=MD5('$password')";
    }

    $query .= "WHERE id = '$id'";

    $result = $connection->query($query);
}

$query  = "SELECT * FROM tb_users WHERE id = '$id'";

$result = $connection->query($query);
$row    = $result->fetch_assoc();

?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Ubah User</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=user' ?>">User</a></li>
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=user-edit&id=' . $row['id'] ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>Ubah USER</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Nama Lengkap" value="<?= $row['fullname'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Username</label>
                            <div class="col-md-9">
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= $row['username'] ?>" />
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
                                <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" value="<?= $row['jabatan'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <select name="role" id="role" class="form-control">
                                    <option value="admin" <?= $row['role'] == 'admin' ? 'Selected' : '' ?> >Admin</option>
                                    <option value="surveyor" <?= $row['role'] == 'surveyor' ? 'Selected' : '' ?>>Surveyor</option>
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