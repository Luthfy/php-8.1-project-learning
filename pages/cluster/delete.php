<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Hapus Kriteria</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=keluarga' ?>">Keluarga</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Hapus
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
                <?php
                    if (@$_POST['submit']) {
                            
                        $id = $_POST['id'];

                        $query = "DELETE FROM kriteria WHERE id = '$id'";

                        $result = $connection->query($query);
                    }

                ?>
                <a href="<?= $_SERVER['PHP_SELF'] . '?page=kriteria' ?>">Kembali Kehalaman Index</a>
            </div>
        </div>
    </div>
</div>
