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
    <style>
        /* Style untuk tampilan header */
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
    </style>
</head>
<body>
    <div class="container">
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
            <div class="right">: <?= strtoupper($ijazah["tempat_lahir"]) ?>, <?= strtoupper($ijazah["tanggal_lahir"]) ?></div>
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
            <div class="right"><i>Berdasarkan keputusan BAN-PT No. <?= strtoupper($ijazah["nomer_sk"]) ?></i></div>
        </div>
    </div>

    <div class="wrapper-0">
        <p>Ijazah ini diserahkan berdasarkan Surat Keputusan Direktur Universitas Nomor : <?= strtoupper($ijazah["nomer_sk"]) ?> setelah yang bersangkutan memenuhi semua persyaratan yang telah ditentukan dan kepadanya dilimpahkan segala wewenang dan hak yang berhubungan dengan ijazah yang dimilikinya serta berhak menggunakan Gelar Akademik <b><?= strtoupper($ijazah["gelar_akademik"]) ?></b>.</p>
    </div>

		<div class="wrapper-1">
            <div class="left"></div>
            <div class="right">Jakarta, <?= $ijazah["tanggal_ijazah"] ?></div>
        </div>

    	<div class="wrapper-1">
            <div class="left">WAKIL DIREKTUR</div>
            <div class="right">DIREKTUR</div>
        </div>
        
        <div class="wrapper-1">
            <div class="left">POLITEKNIK XYZ</div>
            <div class="right">POLITEKNIK XYZ</div>
        </div>
        
        </br>
        </br>
        </br>
        </br>
        
        <div class="wrapper-1">
            <div class="left"><?= $ijazah["wakil_direktur"] ?></div>
            <div class="right"><?= $ijazah["direktur"] ?></div>
        </div>
        
        <div class="wrapper-1">
            <div class="left">NIP. <?= $ijazah["direktur_nip"] ?></div>
            <div class="right">NIP. <?= $ijazah["wakil_direktur_nip"] ?></div>
        </div>
        
</body>
</html>
