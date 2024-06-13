<style>
    .card{
        margin-top:30px;
    }
</style>

<div class="card border-dark">
  <div class="card-header bg-primary text-white border-dark"><strong>Data Basis Aturan</strong></div>
  <div class="card-body">
    <a class="btn btn-primary mb-2" href="?page=aturan&action=tambah">Tambah</a>
    <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <!-- <th width="50px">No.</th> -->
        <th width="100px">Kode Penyakit</th>
        <th width="200px">Nama Penyakit</th>
        <th width="300px">Keterangan</th>
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
        $sql = "SELECT basis_aturan.idaturan,basis_aturan.idpenyakit,basis_aturan.kdpenyakit,
                        penyakit.kdpenyakit,penyakit.nmpenyakit,penyakit.keterangan 
                FROM basis_aturan INNER JOIN penyakit 
                ON basis_aturan.idpenyakit=penyakit.idpenyakit ORDER BY nmpenyakit ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <!-- <td><?php echo $no++; ?></td> -->
            <td><?php echo $row['kdpenyakit']; ?></td>
            <td><?php echo $row['nmpenyakit']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td align="center">
                <a class="btn btn-primary" href="?page=aturan&action=detail&id=<?php echo $row['idaturan']; ?>">
                    <i class="fas fa-list"></i>
                </a>
                <a class="btn btn-warning" href="?page=aturan&action=update&id=<?php echo $row['idaturan']; ?>">
                    <i class="fas fa-pen"></i>
                </a>
                <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=aturan&action=hapus&id=<?php echo $row['idaturan']; ?>">
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