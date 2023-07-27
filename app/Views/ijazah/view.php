<pre>
<?php #print_r($ijazah);?>
</pre>

<?php #die; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ijazah</title>
    <script src="https://assets.siakadcloud.com/assets/v1/js/external/jquery.min.js"></script>
    <script src="https://assets.siakadcloud.com/assets/v1/js/forrep.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        /* Style untuk tampilan header */
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
        body {
            font-family: "Bookman Old Style", serif;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
        }
        .left {
            font-size: 11px;
            font-weight: bold;
        }
        .right {
            font-size: 11px;
            font-weight: bold;
        }
        h1 {
            margin: 80px 0 50px;
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            text-transform: uppercase;
        }
        p {
            text-align: justify;
            font-size: 11px;
            font-family: "Bookman Old Style", serif;
        }
        .container {
            justify-content: space-between;
            border-collapse: collapse;
            max-width: 900px; /* Atur lebar maksimum wrapper */
            margin: 0 auto;
        }
        .wrapper {
            display: flex;
            justify-content: space-between;
            border-collapse: collapse;
            max-width: 600px; /* Atur lebar maksimum wrapper */
            margin: 0 auto; /* Agar wrapper berada di tengah secara horizontal */
        }
        .wrapper .left {
            text-align: left;
            padding: 8px;
            flex: 1;
            font-weight: normal;
        }
        .wrapper .right {
            text-align: left;
            padding: 8px;
            flex: 1;
            font-weight: normal;
        }
        .wrapper-0 {
            display: flex;
            justify-content: space-between;
            border-collapse: collapse;
            max-width: 700px; /* Atur lebar maksimum wrapper */
            margin: 5px auto; /* Agar wrapper berada di tengah secara horizontal */
        }
        .wrapper-1 {
            display: flex;
            justify-content: space-between;
            border-collapse: collapse;
            max-width: 600px; /* Atur lebar maksimum wrapper */
            margin: 0 auto; /* Agar wrapper berada di tengah secara horizontal */
            text-align: center; /* Menengahkan teks di dalam wrapper */
        }
        .wrapper-1 .left {
            text-align: center;
            padding: 8px;
            flex: 1;
            font-weight: normal;
        }
        .wrapper-1 .right {
            text-align: center;
            padding: 8px;
            flex: 1;
            font-weight: normal;
        }
        .wrapper-2 {
            display: flex;
            justify-content: space-between;
            border-collapse: collapse;
            max-width: 600px; /* Atur lebar maksimum wrapper */
            margin: 0 auto; /* Agar wrapper berada di tengah secara horizontal */
            text-align: center; /* Menengahkan teks di dalam wrapper */
            font-family: "calibri", serif;
        }
        .wrapper-2 .left {
            text-align: center;
            padding: 8px;
            flex: 1;
            font-weight: normal;
        }
        .wrapper-2 .right {
            text-align: center;
            padding: 8px;
            flex: 1;
            font-weight: normal;
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
    <!-- Back and Print buttons -->
    <nav class="navbar navbar-default">
        <div class="container">
            <p class="navbar-brand">Ijazah Akademik</p>
            <button type="button" class="btn btn-primary btn-flat navbar-btn" data-type="back"><i class="fa fa-arrow-left"></i> Kembali</button>
            <button type="button" class="btn btn-info btn-flat navbar-btn navbar-right" data-type="print"><i class="fa fa-print"></i> Cetak</button>
        </div>
    </nav>
    <div class="container">
    
    </br>
        <div class="header">
            <div class="left">No. Seri : <?= $ijazah["nomer_seri"] ?></div>
            <div class="right">No. Ijazah : <?= $ijazah["nomer_ijazah"] ?></div>
        </div>

        <h1>IJAZAH</h1>
        <div class="wrapper">
            <div class="left">Memberikan Ijazah Kepada</div>
            <div class="right">: <b><?= strtoupper($ijazah["taruna"]) ?></b></div>
        </div>
        <div class="wrapper">
            <div class="left">Tempat dan Tanggal Lahir</div>
            <div class="right">: <?= $ijazah["tempat_lahir"] ?>, <?= strtoupper($ijazah["tanggal_lahir"]) ?></div>
        </div>
        <div class="wrapper">
            <div class="left">Nomor Taruna</div>
            <div class="right">: <?= strtoupper($ijazah["nomer_taruna"]) ?></div>
        </div>
        <div class="wrapper">
            <div class="left">Program Pendidikan</div>
            <div class="right">: <?= strtoupper($ijazah["program_pendidikan"]) ?></div>
        </div>
        <div class="wrapper">
            <div class="left">Program Studi</div>
            <div class="right">: <?= strtoupper($ijazah["program_studi"]) ?></div>
        </div>
        <div class="wrapper">
            <div class="left">Status</div>
            <div class="right">: TERAKREDITASI <b>'<?= strtoupper($ijazah["akreditasi"]) ?>'</b></div>
        </div>
        <div class="wrapper">
            <div class="left"></div>
            <div class="right"><i>Berdasarkan keputusan <?= strtoupper($ijazah["sk_akreditasi"]) ?></i></div>
        </div>
    </div>

    <div class="wrapper-0">
        <p>Ijazah ini diserahkan berdasarkan Surat Keputusan Direktur Universitas Nomor : <?= $ijazah["nomer_sk"] ?> setelah yang bersangkutan memenuhi semua persyaratan yang telah ditentukan dan kepadanya dilimpahkan segala wewenang dan hak yang berhubungan dengan ijazah yang dimilikinya serta berhak menggunakan Gelar Akademik <b><?= $ijazah["gelar_akademik"] ?></b>.</p>
    </div>

		<div class="wrapper-1">
            <div class="left"></div>
            <div class="right">Jakarta, <?= $ijazah["tanggal_ijazah"] ?></div>
        </div>

    	<div class="wrapper-1">
            <div class="left">WAKIL DIREKTUR</div>
            <div class="right">DIREKTUR</div>
        </div>
        
        <div class="wrapper-2">
            <div class="left">POLITEKNIK XYZ</div>
            <div class="right">POLITEKNIK XYZ</div>
        </div>
        
        </br>
        </br>
        </br>
        </br>
        
        <div class="wrapper-2">
            <div class="left"><?= $ijazah["wakil_direktur"] ?></div>
            <div class="right"><?= $ijazah["direktur"] ?></div>
        </div>
        
        <div class="wrapper-2">
            <div class="left">NIP. <?= $ijazah["direktur_nip"] ?></div>
            <div class="right">NIP. <?= $ijazah["wakil_direktur_nip"] ?></div>
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
