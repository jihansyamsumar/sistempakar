<style>
  .card{
    margin-top:30px;
  }
</style>

<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>Data Hasil Konsultasi Admin</strong></div>

  <div class="card-body">
    <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="50px">No.</th>
        <th width="200px">Tanggal</th>
        <th width="300px">Nama Anak</th>
        <th width="300px">Usia Anak</th>
        <th width="100px"></th>
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
        $sql = "SELECT * FROM konsultasi ORDER BY tanggal DESC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['usia'] . " tahun"; ?></td>
            <td align="center">
                <a class="btn btn-primary" href="?page=konsultasiadm&action=detail&id=<?php echo $row['idkonsultasi']; ?>">
                    <i class="fas fa-list"></i>
                </a>
            </td>
        </tr>
    <?php
     }
     $conn->close();
    ?>
   </tbody>
</table>
</div>
</div>