<?php
// proses menampilkan data penyakit berdasarkan basis aturan yang dipilih
require_once "config.php";

// mengambil id dari parameter
$idaturan=$_GET['id'];

$sql = "SELECT basis_aturan.idaturan,basis_aturan.idpenyakit,basis_aturan.kdpenyakit,
                penyakit.kdpenyakit,penyakit.nmpenyakit
        FROM basis_aturan INNER JOIN penyakit 
        ON basis_aturan.idpenyakit=penyakit.idpenyakit WHERE idaturan='$idaturan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// proses update
if(isset($_POST['update'])){
    $idgejala=$_POST['idgejala'];

    // proses simpan detail basis aturan
    if($idgejala!=Null){
        $jumlah = count($idgejala);
        $i=0;
        while($i < $jumlah){
            $idgejalane=$idgejala[$i];
            $sql = "INSERT INTO detail_basis_aturan VALUES ('$idaturan','$idgejalane')";
            mysqli_query($conn,$sql);
            $i++;
        }
    }
   
    header("Location:?page=aturan");
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>Update Data Basis Aturan</strong></div>
                <div class="card-body">
                     <div class="form-group">
                        <label for="">Kode Penyakit</label>
                        <input type="text" class="form-control" value="<?php echo $row['kdpenyakit']; ?>" name="kdpenyakit" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Penyakit</label>
                        <input type="text" class="form-control" value="<?php echo $row['nmpenyakit']; ?>" name="nmpenyakit" readonly>
                    </div>

                    <!-- Tabel Data Gejala-Gejala -->
                    <div class="form-group">
                        <label for="">Pilih Gejala-Gejala Berikut :</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30px"></th>
                                    <th width="30px">No.</th>
                                    <th width="50px">Kode Gejala</th>
                                    <th width="350px">Nama Gejala</th>
                                    <th width="50px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Buat koneksi ke database
                                    $conn = new mysqli("localhost", "root", "", "db_pakar1");

                                    // Periksa koneksi
                                    if ($conn->connect_error) {
                                        die("Koneksi gagal: " . $conn->connect_error);
                                    }

                                    $no=1;
                                    $sql = "SELECT * FROM gejala ORDER BY nmgejala ASC";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {

                                        $idgejala=$row['idgejala'];
                                        $kdgejala=$row['kdgejala'];

                                        // cek ke tabel detail basis aturan
                                        $sql2 = "SELECT * FROM detail_basis_aturan WHERE idaturan='$idaturan' AND idgejala='$idgejala'";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            // jika ditemukan maka tampilkan datanya checklist mati hapus aktif
                                ?>
                                    <tr>
                                        <td align="center"><input type="checkbox" class="check-item" disabled="disabled"></td>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['kdgejala']; ?></td>
                                        <td><?php echo $row['nmgejala']; ?></td>
                                        <td align="center">
                                            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=aturan&action=hapus_gejala&idaturan=<?php echo $idaturan ?>&idgejala=<?php echo $idgejala ?>">
                                                <i class="fas fa-window-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    }else{
                                        // jika tidak ditemukan maka cheklist aktif hapus mati
                                ?>
                                    <tr>
                                        <td align="center"><input type="checkbox" class="check-item" name="<?php echo 'idgejala[]'; ?>" value="<?php echo $row['idgejala']; ?>"></td>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['kdgejala']; ?></td>
                                        <td><?php echo $row['nmgejala']; ?></td>
                                        <td align="center">
                                            <i class="fas fa-window-close"></i>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                }
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <input class="btn btn-primary" type="submit" name="update" value="Update">
                    <a class="btn btn-danger" href="?page=aturan">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>