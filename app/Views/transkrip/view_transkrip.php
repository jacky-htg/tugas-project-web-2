<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      color: #333;
      margin: 20px;
    }

    h3 {
      color: #007BFF;
      margin-bottom: 10px;
    }

    h1 {
      color: #007BFF;
      margin: 10px 0;
      text-align: center;
    }

    p {
      font-size: 12px;
      margin: 1.15px 0;
    }

    table {
      font-size: 12px;
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    button {
      background-color: #007BFF;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      margin-bottom: 20px;
      cursor: pointer;
      position: absolute;
      top: 20px;
      right: 20px;
    }

    a {
      display: inline-block;
      margin-top: 20px;
      color: #007BFF;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    @media (max-width: 600px) {

      h1,
      p,
      th,
      td {
        font-size: 12px;
      }

      table {
        font-size: 12px;
      }
    }
  </style>
</head>

<body>
  <button onclick="printTranskrip()">Cetak Transkrip</button>
  <h1>Transkrip Nilai</h1>
  <?php
  // Sample data to simulate the data that would have been retrieved from the database
  $transkrip = [
    'ijazah' => [
      'nomer_ijazah' => '12345',
      'tanggal_yudisium' => '2023-07-20'
    ],
    'taruna' => [
      'nama' => 'John Doe',
      'nomer_taruna' => '2023001',
      'tempat_lahir' => 'Jakarta',
      'tanggal_lahir' => '2000-01-01',
      'program_studi' => 'Computer Science',
      'akreditasi' => 'A (Sangat Baik)'
    ],
    'matakuliah' => [
      [
        'kode' => 'CS101',
        'matakuliah' => 'Introduction to Programming',
        'sks' => '3',
        'nilai_huruf' => 'A'
      ],
      [
        'kode' => 'CS202',
        'matakuliah' => 'Data Structures',
        'sks' => '4',
        'nilai_huruf' => 'B+'
      ],
    ]
  ];
  ?>

  <p><strong>Lampiran nomor ijazah :</strong> <?= $transkrip['ijazah']['nomer_ijazah'] ?? '' ?></p>
  <p><strong>Nama :</strong> <?= $transkrip['taruna']['nama'] ?? '' ?></p>
  <p><strong>Nomer Taruna :</strong> <?= $transkrip['taruna']['nomer_taruna'] ?? '' ?></p>
  <p><strong>Tempat/Tanggal Lahir :</strong> <?= $transkrip['taruna']['tempat_lahir'] ?? '' ?>, <?= $transkrip['taruna']['tanggal_lahir'] ?? '' ?></p>
  <p><strong>Jurusan/Program Studi :</strong> <?= $transkrip['taruna']['program_studi'] ?? '' ?></p>
  <p><strong>Status :</strong> <?= $transkrip['taruna']['akreditasi'] ?? '' ?></p>
  <p><strong>Tanggal Yudisium :</strong> <?= $transkrip['ijazah']['tanggal_yudisium'] ?? '' ?></p>

  <?php if (!empty($transkrip['matakuliah'])) : ?>
    <table>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Mata kuliah</th>
        <th>SKS</th>
        <th>Nilai</th>
      </tr>
      <?php foreach ($transkrip['matakuliah'] as $index => $matakuliah) : ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><?= $matakuliah['kode'] ?? '' ?></td>
          <td><?= $matakuliah['matakuliah'] ?? '' ?></td>
          <td><?= $matakuliah['sks'] ?? '' ?></td>
          <td><?= $matakuliah['nilai_huruf'] ?? '' ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else : ?>
    <p>No mata kuliah data available.</p>
  <?php endif; ?>

  <a href="<?= base_url('transkrip') ?>">Back to Transkrip List</a>

  <script>
    function printTranskrip() {
      window.print();
    }
  </script>
</body>

</html>

</html>