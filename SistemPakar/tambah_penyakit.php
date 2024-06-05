<?php
require_once "config.php";

if(isset($_POST['simpan'])){

    // mengambil data dari form
    $kdpenyakit=$_POST['kdpenyakit'];
    $nmpenyakit=$_POST['nmpenyakit'];
    $ket=$_POST['ket'];
    $solusi=$_POST['solusi'];
	
	//proses simpan
    $sql = "INSERT INTO penyakit VALUES (Null,'$nmpenyakit','$kdpenyakit','$ket','$solusi')";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
    
}
?>


<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>Tambah Data Penyakit</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Kode Penyakit</label>
                        <input type="text" class="form-control" name="kdpenyakit" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Penyakit</label>
                        <input type="text" class="form-control" name="nmpenyakit" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" name="ket" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="">Solusi</label>
                        <input type="text" class="form-control" name="solusi" maxlength="200" required>
                    </div>
                    <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                    <a class="btn btn-danger" href="?page=penyakit">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>