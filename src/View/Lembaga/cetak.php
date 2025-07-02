<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Lembaga Pendidikan </title>
  <style>
  .kop-surat {
    display: flex;
    align-items: center;
    justify-content: space-between;
    text-align: center;
    margin-bottom: 20px;
    position: relative;
    width: 100%;
  }

  .kop-surat .logo-kiri {
    position: absolute;
    left: 20px;
    /* Geser ke kiri */
    top: 0px;
    /* Geser ke atas */
    width: 100px;
    /* Ukuran logo */
    height: auto;
  }

  .kop-surat .logo-kanan {
    position: absolute;
    right: 20px;
    /* Geser ke kanan */
    top: 5px;
    /* Geser ke atas */
    width: 45px;
    /* Ukuran logo */
    height: auto;
  }

  .kop-surat .judul {
    flex: 1;
    text-align: center;
  }

  .kop-surat h2,
  .kop-surat h3 {
    margin: 0;
    text-transform: uppercase;
  }

  .kop-surat h2 {
    font-size: 18px;
  }

  .kop-surat h3 {
    font-size: 16px;
  }

  .judul p {
    width: 400px;
    text-align: center;
    margin: auto;
    font-size: 12px;
  }

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
  <div class="kop-surat">
    <img src="/public/logo.png" alt="Banjar" class="logo-kiri"> <!-- Logo di kiri -->
    <div class="judul">
      <h2>KEMENTRIAN AGAMA KOTA BANJARBARU</h2>
      <p><i>Kota Banjarbaru, Kalimantan Selatan</i><br>
        <i>Jl. Panglima Batur Barat No.6, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan
          70714</i>
        <br>
        <i>(0511) 4780700</i>
      </p>
    </div>
    <div class="logo-kanan">
      <!-- Logo di kanan -->
    </div>
  </div>
  <p style="text-align: center; font-size: large; margin-top: 40px;">Data Lembaga Pendidikan </p>


  <table>
    <thead>
      <tr>
        <th>
          Nama Lembaga Pendidikan
        </th>
        <th>
          Kecamatan
        </th>
        <th>
          Jenis
        </th>
        <th>
          NSPP
        </th>
        <th>
          NPSN
        </th>
        <th>
          Jenjang
        </th>
        <th>
          Alamat
        </th>
        <th>
          Telepon
        </th>
        <th>
          email
        </th>


      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['nama']); ?></td>
        <td><?php echo htmlspecialchars($row['nama_kecamatan']); ?></td>
        <td><?php echo htmlspecialchars($row['jenis_lembaga']); ?></td>
        <td><?php echo htmlspecialchars($row['nspp']); ?></td>
        <td><?php echo htmlspecialchars($row['npsn']); ?></td>
        <td><?php echo htmlspecialchars($row['jenjang']); ?></td>
        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
        <td><?php echo htmlspecialchars($row['no_telepon']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
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