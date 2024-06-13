<?php 
require_once "config.php";

// mengambil id dari parameter
$idpenyakit=$_GET['id'];

// proses update
if(isset($_POST['update'])){

    // mengambil data dari form
    $kdpenyakit=$_POST['kdpenyakit'];
    $nmpenyakit=$_POST['nmpenyakit'];
    $ket=$_POST['ket'];
    $solusi=$_POST['solusi'];

    $sql = "UPDATE penyakit SET nmpenyakit='$nmpenyakit',kdpenyakit='$kdpenyakit',keterangan='$ket',solusi='$solusi' WHERE idpenyakit='$idpenyakit'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
}

$sql = "SELECT * FROM penyakit WHERE idpenyakit='$idpenyakit'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<style>
    .card{
        margin-top:30px;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                    <div class="card-header bg-primary text-white border-dark"><strong>Update Data Penyakit</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kode Penyakit</label>
                            <input type="text" class="form-control" name="kdpenyakit" value="<?php echo $row['kdpenyakit']?>" maxlength="10" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Penyakit</label>
                            <input type="text" class="form-control" name="nmpenyakit" value="<?php echo $row['nmpenyakit']?>" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="ket" value="<?php echo $row['keterangan']?>" maxlength="200" required>
                        </div>
                        <div class="form-group">
                            <label for="">Solusi</label>
                            <input type="text" class="form-control" name="solusi" value="<?php echo $row['solusi']?>" maxlength="200" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                        <a class="btn btn-danger" href="?page=penyakit">Batal</a>
                    </div>
            </div>
        </form>
    </div>
</div>