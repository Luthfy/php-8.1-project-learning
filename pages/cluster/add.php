
<?php


if (@$_POST['submit']) {
        
    $kode = $_POST['kode'];
    $cluster = $_POST['cluster'];

    $query = "INSERT INTO tb_cluster(kode, keterangan) VALUES ('$kode', '$cluster')";

    $result = $connection->query($query);

    
    if ($result) {
        ?>
            <script type="text/javascript">
                window.location.href = location.origin + location.pathname + "?page=cluster";
            </script>
        <?php
    }
}

?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tambah Cluster</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=cluster' ?>">Cluster</a></li>
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
                <form action="<?= $_SERVER['PHP_SELF'] . '?page=cluster-tambah' ?>" method="post">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <b>TAMBAH CLUSTER</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Kode Cluster</label>
                            <div class="col-md-9">
                                <input type="text" name="kode" class="form-control" id="KodeCluster" placeholder="Kode Cluster" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-3">Nama Cluster</label>
                            <div class="col-md-9">
                                <input type="text" name="cluster" class="form-control" id="NamaCluster" placeholder="Nama Cluster" />
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