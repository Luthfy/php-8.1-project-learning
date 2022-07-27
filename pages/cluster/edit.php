
<?php

$id = $_GET['id'];

if (@$_POST['submit']) {

    $kode = $_POST['kode'];
    $cluster = $_POST['cluster'];
    
    $query = "UPDATE tb_cluster SET kode='$kode', keterangan='$cluster' WHERE id = '$id'";

    $result = $connection->query($query);

    if ($result) {
        ?>
            <script type="text/javascript">
                window.location.href = location.origin + location.pathname + "?page=cluster";
            </script>
        <?php
    }
}

$query  = "SELECT * FROM tb_cluster WHERE id = '$id'";

$result = $connection->query($query);
$row    = $result->fetch_assoc();

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Ubah Cluster</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=cluster' ?>">Cluster</a></li>
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=cluster-edit&id=' . $row['id'] ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>UBAH CLUSTER</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Kode Cluster</label>
                            <div class="col-md-9">
                                <input type="text" name="kode" class="form-control" id="KodeCluster" placeholder="Kode Cluster" value="<?= $row['kode'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Cluster</label>
                            <div class="col-md-9">
                                <input type="text" name="cluster" class="form-control" id="NamaCluster" placeholder="Nama Cluster" value="<?= $row['keterangan'] ?>" />
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

<?php