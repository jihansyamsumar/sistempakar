<?php
require_once "config.php";

// Mengambil id dari parameter
$idaturan = $_GET['id'];

// Mempersiapkan SQL untuk mendapatkan detail penyakit
$sql = "SELECT basis_aturan.idaturan, basis_aturan.idpenyakit, basis_aturan.kdpenyakit,
                penyakit.kdpenyakit, penyakit.nmpenyakit, penyakit.keterangan
        FROM basis_aturan
        INNER JOIN penyakit ON basis_aturan.idpenyakit = penyakit.idpenyakit 
        WHERE basis_aturan.idaturan = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idaturan);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<style>
    .card {
        margin-top: 30px;
    }
</style>

<!-- Tampilan halaman detail -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card-header bg-primary text-white border-dark">
                    <strong>Detail Halaman Basis Aturan</strong>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="">Kode Penyakit</label>
                        <input type="text" class="form-control" value="<?php echo $row['kdpenyakit']; ?>" name="kd" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Penyakit</label>
                        <input type="text" class="form-control" value="<?php echo $row['nmpenyakit']; ?>" name="nama" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" value="<?php echo $row['keterangan']; ?>" name="ket" readonly>
                    </div>

                    <!-- Tabel gejala-gejala -->
                    <label for="">Gejala-Gejala Penyakit :</label>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="40px">No</th>
                                <th width="100px">Kode Gejala</th>
                                <th width="700px">Nama Gejala</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // SQL untuk mendapatkan gejala-gejala
                        $sql = "SELECT detail_basis_aturan.idaturan, detail_basis_aturan.idgejala, gejala.kdgejala, gejala.nmgejala 
                                FROM detail_basis_aturan
                                INNER JOIN gejala ON detail_basis_aturan.idgejala = gejala.idgejala 
                                WHERE detail_basis_aturan.idaturan = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $idaturan);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['kdgejala']; ?></td>
                                <td><?php echo $row['nmgejala']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <a class="btn btn-danger" href="?page=aturan">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
$stmt->close();
$conn->close();
?>
