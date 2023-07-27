<?php 
  $ipk = $transkrip['total_sks']['total_nilai']/$transkrip['total_sks']['total']; 
  $predikat = '';
  if ($ipk >= 3.5) {
    $predikat = 'DENGAN PUJIAN';
  } else if ($ipk >= 3) {
    $predikat = 'SANGAT MEMUASKAN';
  } else if ($ipk >= 2.5) {
    $predikat = 'MEMUASKAN';
  } else if ($ipk >= 2) {
    $predikat = 'CUKUP';
  }
?>
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
        <td>: &nbsp;<?= $transkrip['base']['nomer_ijazah']; ?></td>
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
        <td>: &nbsp;<?= $transkrip['base']['nama_taruna']; ?></td>
      </tr>
      <tr>
        <td>Nomor Taruna</td>
        <td>: &nbsp;<?= $transkrip['base']['nomer_taruna']; ?></td>
      </tr>
      <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>: &nbsp;<?= $transkrip['base']['nama_kota'] . ', '
                      . $transkrip['base']['tanggal_lahir']; ?></td>
      </tr>
      <tr>
        <td>Jurusan/Program Studi</td>
        <td>: &nbsp;<?= $transkrip['base']['program_pendidikan'] . ' ' .
                      $transkrip['base']['nama_studi']; ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td>: &nbsp;Terakreditasi "<b><?= $transkrip['base']['akreditasi']; ?></b>"</td>
      </tr>
      <tr>
        <td>Tanggal Yudisium</td>
        <td>: &nbsp;<?= $transkrip['base']['tanggal_yudisium']; ?></td>
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
        <?php foreach ($transkrip['semester1'] as $i=>$m) : ?>
          <?php if ($i === 0) : ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="line-height: 2; text-transform: uppercase;">SEMESTER I (<?=$transkrip['total_sks']['semester1'];?> SKS)</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php endif; ?>
          <tr>
            <td><?= $rowNumber ?></td>
            <td><?= $m['kode'] ?></td>
            <td style="text-align: left;"><?= $m['matakuliah'] ?></td>
            <td><?= $m['sks'] ?></td>
            <td><?= $m['nilai_huruf'] ?></td>
          </tr>
          <?php $rowNumber++; ?>
        <?php endforeach; ?>

        <?php foreach ($transkrip['semester2'] as $i=>$m) : ?>
          <?php if ($i === 0) : ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="line-height: 2; text-transform: uppercase;">SEMESTER II (<?=$transkrip['total_sks']['semester2'];?> SKS)</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php endif; ?>
          <tr>
            <td><?= $rowNumber ?></td>
            <td><?= $m['kode'] ?></td>
            <td style="text-align: left;"><?= $m['matakuliah'] ?></td>
            <td><?= $m['sks'] ?></td>
            <td><?= $m['nilai_huruf'] ?></td>
          </tr>
          <?php $rowNumber++; ?>
        <?php endforeach; ?>

        <?php foreach ($transkrip['semester3'] as $i=>$m) : ?>
          <?php if ($i === 0) : ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="line-height: 2; text-transform: uppercase;">SEMESTER III (<?=$transkrip['total_sks']['semester3'];?> SKS)</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php endif; ?>
          <tr>
            <td><?= $rowNumber ?></td>
            <td><?= $m['kode'] ?></td>
            <td style="text-align: left;"><?= $m['matakuliah'] ?></td>
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
          <?php foreach ($transkrip['semester4'] as $i=>$m) : ?>
          <?php if ($i === 0) : ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="line-height: 2; text-transform: uppercase;">SEMESTER IV (<?=$transkrip['total_sks']['semester4'];?> SKS)</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php endif; ?>
          <tr>
            <td><?= $rowNumber ?></td>
            <td><?= $m['kode'] ?></td>
            <td style="text-align: left;"><?= $m['matakuliah'] ?></td>
            <td><?= $m['sks'] ?></td>
            <td><?= $m['nilai_huruf'] ?></td>
          </tr>
          <?php $rowNumber++; ?>
        <?php endforeach; ?>
          
        <?php foreach ($transkrip['semester5'] as $i=>$m) : ?>
          <?php if ($i === 0) : ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="line-height: 2; text-transform: uppercase;">SEMESTER V (<?=$transkrip['total_sks']['semester5'];?> SKS)</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php endif; ?>
          <tr>
            <td><?= $rowNumber ?></td>
            <td><?= $m['kode'] ?></td>
            <td style="text-align: left;"><?= $m['matakuliah'] ?></td>
            <td><?= $m['sks'] ?></td>
            <td><?= $m['nilai_huruf'] ?></td>
          </tr>
          <?php $rowNumber++; ?>
        <?php endforeach; ?>

        <?php foreach ($transkrip['semester6'] as $i=>$m) : ?>
          <?php if ($i === 0) : ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="line-height: 2; text-transform: uppercase;">SEMESTER VI (<?=$transkrip['total_sks']['semester6'];?> SKS)</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php endif; ?>
          <tr>
            <td><?= $rowNumber ?></td>
            <td><?= $m['kode'] ?></td>
            <td style="text-align: left;"><?= $m['matakuliah'] ?></td>
            <td><?= $m['sks'] ?></td>
            <td><?= $m['nilai_huruf'] ?></td>
          </tr>
          <?php $rowNumber++; ?>
        <?php endforeach; ?>

        <?php foreach ($transkrip['semester7'] as $i=>$m) : ?>
          <?php if ($i === 0) : ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="line-height: 2; text-transform: uppercase;">SEMESTER VII (<?=$transkrip['total_sks']['semester7'];?> SKS)</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php endif; ?>
          <tr>
            <td><?= $rowNumber ?></td>
            <td><?= $m['kode'] ?></td>
            <td style="text-align: left;"><?= $m['matakuliah'] ?></td>
            <td><?= $m['sks'] ?></td>
            <td><?= $m['nilai_huruf'] ?></td>
          </tr>
          <?php $rowNumber++; ?>
        <?php endforeach; ?>

        <?php foreach ($transkrip['semester8'] as $i=>$m) : ?>
          <?php if ($i === 0) : ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="line-height: 2; text-transform: uppercase;">SEMESTER VIII (<?=$transkrip['total_sks']['semester8'];?> SKS)</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php endif; ?>
          <tr>
            <td><?= $rowNumber ?></td>
            <td><?= $m['kode'] ?></td>
            <td style="text-align: left;"><?= $m['matakuliah'] ?></td>
            <td><?= $m['sks'] ?></td>
            <td><?= $m['nilai_huruf'] ?></td>
          </tr>
          <?php $rowNumber++; ?>
        <?php endforeach; ?>
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
            <td style="text-align: left;">UJIAN AKHIR PROGRAM SRUDI</td>
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
            <td align="left" valign="top"><?= $transkrip['base']['judul_kkw'] ;?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
            <td style="border-top: 1px solid #000;" align="left" valign="top">
              JUMLAH SKS : <?= $transkrip['total_sks']['total'] ;?> <br/>
              IP KUMULATIF : <?= number_format($ipk, 2, '.', '');?> <br/>
              PREDIKAT KELULUSAN : <?= $predikat;?> <br/>
            </td>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
            <td style="border-top: 1px solid #000;">&nbsp;</td>
          </tr>
        </table>
      </div>
      <hr/>
      <div>
      <pre>
      KETERANGAN : A=4;AB=3,50;B=3;BC=2,50;C=2;D=1;E=0

      Palembang, <?= $transkrip['base']['tanggal_ijazah'];?>

      Wakil Direktur I                  Direktur
      Politeknik XYZ                    Politeknik XYZ



      <?= $transkrip['base']['nama_wakil'];?>          <?= $transkrip['base']['nama_direktur'];?>
      NIP. <?= $transkrip['base']['nip_wakil'];?>          NIP. <?= $transkrip['base']['nip_direktur'];?>
      </pre>
      <img height="150px" src="<?= base_url("images/{$transkrip['base']['foto']}");?>"/>
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