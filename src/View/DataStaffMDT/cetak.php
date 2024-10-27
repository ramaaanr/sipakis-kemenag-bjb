<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Staff Madrasah Diniyah Takmiliyah</title>
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
  <h1 style="text-align: center;">Data Lembaga Madrasah Diniyah Takmiliyah</h1>

  <table>
    <thead>
      <tr>
        <th>Nama</th>
        <th>MDT</th>
        <th>NIK</th>
        <th>Jabatan</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['nama']); ?></td>
        <td><?php echo htmlspecialchars($row['lembaga']); ?></td>
        <td><?php echo htmlspecialchars($row['nik']); ?></td>
        <td><?php echo htmlspecialchars($row['jabatan']); ?></td>
        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
      </tr>
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