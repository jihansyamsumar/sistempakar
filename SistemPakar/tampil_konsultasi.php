<?php
require_once "config.php";

date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['Proses'])){

    // Mengambil data dari form
    $nmpasien = $_POST['nmpasien'];
    $tgl = date("Y/m/d");
    $usia = $_POST['usia'];

    // Proses simpan konsultasi dengan prepared statement
    $stmt = $conn->prepare("INSERT INTO konsultasi (tanggal, nama, usia) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $tgl, $nmpasien, $usia);
    $stmt->execute();
    
    // Mengambil ID konsultasi terakhir
    $idkonsultasi = $conn->insert_id;

    // Mengambil idgejala
    $idgejala = $_POST['idgejala'];

    // Proses simpan detail konsultasi dengan prepared statement
    $stmt = $conn->prepare("INSERT INTO detail_konsultasi (idkonsultasi, idgejala) VALUES (?, ?)");
    foreach ($idgejala as $idgejalane) {
        $stmt->bind_param("ii", $idkonsultasi, $idgejalane);
        $stmt->execute();
    }

    // Mengambil data dari tabel penyakit untuk dicek di basis aturan
    $sql = "SELECT * FROM penyakit";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {

        $idpenyakit = $row['idpenyakit'];
        $jyes = 0;

        // Mencari jumlah gejala di basis aturan berdasarkan penyakit
        $stmt2 = $conn->prepare("SELECT COUNT(idpenyakit) AS jml_gejala FROM basis_aturan INNER JOIN detail_basis_aturan ON basis_aturan.idaturan = detail_basis_aturan.idaturan WHERE idpenyakit = ?");
        $stmt2->bind_param("i", $idpenyakit);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $row2 = $result2->fetch_assoc();
        $jml_gejala = $row2['jml_gejala'];

        // Mencari gejala pada basis aturan
        $stmt3 = $conn->prepare("SELECT idgejala FROM basis_aturan INNER JOIN detail_basis_aturan ON basis_aturan.idaturan = detail_basis_aturan.idaturan WHERE idpenyakit = ?");
        $stmt3->bind_param("i", $idpenyakit);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        while($row3 = $result3->fetch_assoc()) {

            $idgejalane = $row3['idgejala'];

            // Membandingkan apakah yang dipilih pada konsultasi sesuai
            $stmt4 = $conn->prepare("SELECT idgejala FROM detail_konsultasi WHERE idkonsultasi = ? AND idgejala = ?");
            $stmt4->bind_param("ii", $idkonsultasi, $idgejalane);
            $stmt4->execute();
            $result4 = $stmt4->get_result();
            if ($result4->num_rows > 0) {
                $jyes += 1;
            }
        }

        // Mencari persentase
        if($jml_gejala > 0){
            $peluang = round(($jyes / $jml_gejala) * 100, 2);
        } else {
            $peluang = 0;
        }

        // Simpan data detail penyakit
        if($peluang > 0){
            $stmt5 = $conn->prepare("INSERT INTO detail_penyakit (idkonsultasi, idpenyakit, persentase) VALUES (?, ?, ?)");
            $stmt5->bind_param("iid", $idkonsultasi, $idpenyakit, $peluang);
            $stmt5->execute();
        }
    }

    header("Location:?page=konsultasi&action=hasil&idkonsultasi=$idkonsultasi");
    exit;
}
?>

<style>
  .card {
    margin-top: 30px;
  }
</style>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
            <div class="card border-dark">
                <div class="card-header bg-primary text-white border-dark"><strong>Konsultasi Penyakit</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Anak</label>
                        <input type="text" class="form-control" name="nmpasien" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="">Usia Anak</label>
                        <input type="text" class="form-control" name="usia" maxlength="200" required>
                    </div>

                    <!-- Tabel Data Gejala -->
                    <div class="form-group">
                        <label for="">Pilih Gejala-Gejala Berikut :</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30px"></th>
                                    <th width="30px">No.</th>
                                    <th width="100px">Kode Gejala</th>
                                    <th width="700px">Nama Gejala</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Buat koneksi ke database
                                    // Koneksi sudah dibuat sebelumnya, jadi tidak perlu membuat ulang di sini
                                    $no = 1;
                                    $sql = "SELECT * FROM gejala ORDER BY kdgejala, nmgejala ASC";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td align="center"><input type="checkbox" class="check-item" name="idgejala[]" value="<?php echo $row['idgejala']; ?>"></td>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['kdgejala']; ?></td>
                                    <td><?php echo $row['nmgejala']; ?></td>
                                </tr>
                                <?php
                                    }
                                    // Koneksi tidak perlu ditutup di sini, karena sudah digunakan di tempat lain
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <input class="btn btn-primary" type="submit" name="Proses" value="Proses">
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validasiForm() {
        // validasi gejala yang belum dipilih
        var checkbox = document.getElementsByName('idgejala[]');
        var isChecked = false;

        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                isChecked = true;
                break;
            }
        }

        // jika belum ada yang di check
        if (!isChecked) {
            alert('Pilih Setidaknya Satu Gejala !!');
            return false;
        }

        return true;
    }
</script>
