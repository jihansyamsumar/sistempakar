<?php 
require_once "config.php";

// mengambil id dari parameter
$idgejala=$_GET['id'];

if(isset($_POST['update'])){
    $kdgejala=$_POST['kdgejala'];
    $nmgejala=$_POST['nmgejala'];

    // proses update
    $sql = "UPDATE gejala SET kdgejala='$kdgejala',nmgejala='$nmgejala' WHERE idgejala='$idgejala'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=gejala");
    }
}

$sql = "SELECT * FROM gejala WHERE idgejala='$idgejala'";
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
                <div class="card-header bg-primary text-white"><strong>Update Data Gejala</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Kode Gejala</label>
                        <input type="text" class="form-control" name="kdgejala" value="<?php echo $row['kdgejala']?>" maxlength="10" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Gejala</label>
                        <input type="text" class="form-control" name="nmgejala" value="<?php echo $row['nmgejala']?>" maxlength="200" required>
                    </div>
                <input class="btn btn-primary" type="submit" name="update" value="Update">
                <a class="btn btn-danger" href="?page=gejala">Batal</a>
            </div>
        </form>
    </div>
</div>