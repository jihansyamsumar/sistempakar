<style>
    .card{
        margin-top:30px;
    }
</style>

<div class="card border-dark">
  <div class="card-header bg-primary text-white border-dark"><strong>Data Gejala</strong></div>
  <div class="card-body">
    <a class="btn btn-primary mb-2" href="?page=gejala&action=tambah">Tambah</a>
    <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <!-- <th width="80px">No.</th> -->
        <th width="100px">Kode Gejala</th>
        <th width="700px">Nama Gejala</th>
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
        $sql = "SELECT*FROM gejala ORDER BY nmgejala ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <!-- <td><?php echo $no++; ?></td> -->
            <td><?php echo $row['kdgejala']; ?></td>
            <td><?php echo $row['nmgejala']; ?></td>
            <td align="center">
                <a class="btn btn-warning" href="?page=gejala&action=update&id=<?php echo $row['idgejala']; ?>">
                    <i class="fas fa-pen"></i>
                </a>
                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=gejala&action=hapus&id=<?php echo $row['idgejala']; ?>">
                    <i class="fas fa-window-close"></i>
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