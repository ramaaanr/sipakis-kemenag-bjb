<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Lembaga Pontren</title>
  <style>
  /* Simple styling for print */
  table {
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
  }
  </style>
</head>

<body>
  <h1 style="text-align: center;">Data Lembaga Pontren</h1>

  <table>
    <thead>
      <tr>
        <th>NSPP</th>
        <th>NPSN</th>
        <th>Nama Lembaga</th>
        <th>Grup</th>
        <th>Jenjang</th>
        <th>Kecamatan</th>
        <th>Alamat</th>
        <th>Jumlah Pria</th>
        <th>Jumlah Wanita</th>
        <th>Total Santri</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
      <?php if ($row['kecamatan_id'] == $id || is_null($id)): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['nspp']); ?></td>
        <td><?php echo htmlspecialchars($row['npsn']); ?></td>
        <td><?php echo htmlspecialchars($row['nama_lembaga']); ?></td>
        <td><?php echo htmlspecialchars($row['grup']); ?></td>
        <td><?php echo htmlspecialchars($row['jenjang']); ?></td>
        <td><?php echo htmlspecialchars($row['nama_kecamatan']); ?></td>
        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
        <td><?php echo htmlspecialchars($row['jumlah_santri_pria']); ?></td>
        <td><?php echo htmlspecialchars($row['jumlah_santri_wanita']); ?></td>
        <td><?php echo htmlspecialchars($row['jumlah_keseluruhan']); ?></td>
      </tr>
      <?php endif; ?>
      <?php endforeach; ?>
    </tbody>

  </table>

  <script>
  // Trigger the print preview automatically when the page loads
  window.onload = function() {
    window.print();
  };
  </script>
</body>

</html>