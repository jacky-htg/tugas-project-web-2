<!DOCTYPE html>
<html>

<head>
  <script src="https://assets.siakadcloud.com/assets/v1/js/external/jquery.min.js"></script>
  <script src="https://assets.siakadcloud.com/assets/v1/js/forrep.js" type="text/javascript"></script>

  <style>
    .navbar {
      background-color: #DCDCDC;
      border: none;
      padding: 15px 0;
      width: auto;
    }

    .navbar .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin: auto;
    }

    .navbar-brand {
      font-size: 20px;
      font-weight: normal;
      font-style: italic;
      color: #333;
      margin: 0;
      margin-left: auto;
      margin-right: auto;
      padding: auto;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      font-size: 14px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      text-decoration: none;
      color: #fff;
    }

    .btn-info {
      background-color: #9F4B84;
    }

    .btn-flat {
      box-shadow: none;
    }

    .navbar-btn {
      margin-left: 10px;
    }

    .navbar-right {
      margin-right: 20px;
    }

    .btn-primary[data-type="back"] {
      background-color: #9F4B84;
    }

    @font-face {
      font-family: myFirstFont;
      src: url(app/Views/transkrip/Calibri/calibrili.ttf);
    }

    body {
      justify-content: center;
      align-items: center;
      width: fit-content;
      font-family: myFirstFont;
      margin: auto;
      margin-top: auto;
      padding: auto;
    }

    h1 {
      text-align: center;
    }

    .data-ijazah table,
    .data-ijazah th,
    .data-ijazah td {
      font-size: 14px;
      width: 100%;
      text-align: left;
      border: none;
    }

    .data-ijazah {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    .data-ijazah td:first-child {
      width: 24%;
      text-align: justify;
    }

    .data-ijazah td {
      padding: 5px;
    }

    .data-mahasiswa table,
    .data-mahasiswa th,
    .data-mahasiswa td {
      font-size: 14px;
      width: 100%;
      text-align: left;
      border: none;
    }

    .data-mahasiswa {
      text-transform: uppercase;
      width: 120%;
      border-collapse: collapse;
    }

    .data-mahasiswa td:first-child {
      width: 20%;
      text-align: justify;
    }

    .data-mahasiswa td {
      padding: 5px;
    }

    p {
      text-indent: 50px;
      padding: 5px 15px;
      width: 100%;
      text-align: justify;
      letter-spacing: 1px;
      line-height: 0.2;
    }

    h2 {
      text-transform: uppercase;
      text-align: center;
    }

    * {
      box-sizing: border-box;
    }

    .row {
      margin-left: auto;
      margin-right: auto;
      width: 100%;
    }

    .column {
      float: left;
      width: 50%;
      padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
      content: "";
      clear: both;
      display: table;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #000;
      border-spacing: 1px;
      text-align: center;
    }

    th {
      text-transform: uppercase;
      border: 1px solid #000;
      padding: 3px;
    }

    td {
      border-left: 1px solid #000;
      border-bottom: none;
      padding: 2px;
    }

    tr:first-child {
      height: 20px;
    }


    tr:nth-child(even) {
      background-color: #FFFFFF;
    }

    @media print {
      body {
        margin: 0;
        font-size: 12px;
      }
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other on screens that are smaller than 600 px */
    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <p class="navbar-brand">Transkrip Nilai Akademik</p>
      <button type="button" class="btn btn-primary btn-flat navbar-btn" data-type="back"><i class="fa fa-arrow-left"></i> Kembali</button>
      <button type="button" class="btn btn-info btn-flat navbar-btn navbar-right" data-type="print"><i class="fa fa-print"></i> Cetak</button>
    </div>
  </nav>

  <div class="data-ijazah">
    <table>
      <tr>
        <td>Lampiran Ijazah Nomor</td>
        <td>: &nbsp;<?= $lampiran_ijazah['nomer_ijazah']; ?></td>
      </tr>
    </table>
  </div>
  <br>

  <h2><u>Transkrip Nilai Akademik</u></h2>
  <br>

  <div class="data-mahasiswa">
    <table>
      <tr>
        <td>Nama</td>
        <td>: &nbsp;<?= $nama['nama']; ?></td>
      </tr>
      <tr>
        <td>Nomor Taruna</td>
        <td>: &nbsp;<?= $nomor_taruna['nomor_taruna']; ?></td>
      </tr>
      <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>: &nbsp;<?= $tempat_tanggal_lahir['tempat_lahir'] . ', ' . $tempat_tanggal_lahir['tanggal_lahir']; ?></td>
      </tr>
      <tr>
        <td>Jurusan/Program Studi</td>
        <td>: &nbsp;<?= $pendidikan['pendidikan'] . ' ' . $program_studi['jurusan']; ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td>: &nbsp;Terakreditasi "<b><?= $status['status']; ?></b>"</td>
      </tr>
      <tr>
        <td>Tanggal Yudisium</td>
        <td>: &nbsp;<?= $tanggal_yudisium['tanggal_yudisium']; ?></td>
      </tr>
    </table>
  </div>
  <br>

  <div class="row">
    <div class="column">
      <table>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th style="width: 500px;">Mata Kuliah</th>
          <th>Sks</th>
          <th>Nilai</th>
        </tr>
        <?php $rowNumber = 1; ?>
        <?php foreach ($matakuliah as $m) : ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="line-height: 2; text-transform: uppercase;"><?= $m['semester'] ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><?= $rowNumber ?></td>
            <td><?= $m['kode'] ?></td>
            <td><?= $m['matakuliah'] ?></td>
            <td><?= $m['sks'] ?></td>
            <td><?= $m['nilai_huruf'] ?></td>
          </tr>
          <?php $rowNumber++; ?>
        <?php endforeach; ?>
      </table>
    </div>

    <div class="row">
      <div class="column">
        <table>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th style="width: 500px;">Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai</th>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="border-left: 1px solid #000; text-align: center; padding: 0%;">
              <h4>Ini Semester 4</h4>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>1</td>
            <td>1</td>
            <td style="text-align: left;">Introduction to Programming</td>
            <td>3</td>
            <td>A</td>
          </tr>
          <tr>
            <td>2</td>
            <td>2</td>
            <td style="text-align: left;">Data Structures and Algorithms</td>
            <td>4</td>
            <td>B+</td>
          </tr>
          <tr>
            <td>1</td>
            <td>1</td>
            <td style="text-align: left;">Introduction to Programming</td>
            <td>3</td>
            <td>A</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="border-left: 1px solid #000; text-align: center; padding: 0%;">
              <h4>Ini Semester 5</h4>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>1</td>
            <td>1</td>
            <td style="text-align: left;">Introduction to Programming</td>
            <td>3</td>
            <td>A</td>
          </tr>
          <tr>
            <td>2</td>
            <td>2</td>
            <td style="text-align: left;">Data Structures and Algorithms</td>
            <td>4</td>
            <td>B+</td>
          </tr>
          <tr>
            <td>1</td>
            <td>1</td>
            <td style="text-align: left;">Introduction to Programming</td>
            <td>3</td>
            <td>A</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="border-left: 1px solid #000; text-align: center; padding: 0%;">
              <h4>Ini Semester 6</h4>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>1</td>
            <td>1</td>
            <td style="text-align: left;">Introduction to Programming</td>
            <td>3</td>
            <td>A</td>
          </tr>
          <tr>
            <td>2</td>
            <td>2</td>
            <td style="text-align: left;">Data Structures and Algorithms</td>
            <td>4</td>
            <td>B+</td>
          </tr>
          <tr>
            <td>1</td>
            <td>1</td>
            <td style="text-align: left;">Introduction to Programming</td>
            <td>3</td>
            <td>A</td>
          </tr>
          <tr>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
            <td style="border-top: 1px solid #000; text-align: left; padding: 0%;">
              <h4>UJIAN AKHIR PROGRAM STUDI</h4>
            </td>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
          </tr>
          <tr>
            <td>1</td>
            <td>1</td>
            <td style="text-align: left;">Introduction to Programming</td>
            <td>3</td>
            <td>A</td>
          </tr>
          <tr>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
            <td height="50px" align="left" valign="top" style="border-top: 1px solid #000; padding: 0%;">
              <h4>JUDUL KERTAS KERJA WAJIB : </h4>
            </td>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left" valign="top">Introduction to Programming</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>

      <script>
        $(document).ready(function() {
          $('[data-type="back"]').on('click', function() {
            window.history.back();
          });
        });
      </script>


</body>

</html>