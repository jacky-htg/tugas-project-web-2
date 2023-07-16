<!-- app/Views/list_transkrip_nilai.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Transkrip Nilai</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/maps/jquery-jvectormap-2.0.3.css'); ?>">
</head>
<body>
    <h1>Daftar Transkrip Nilai</h1>

    <table id="datatable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Taruna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transkrip_nilai as $index => $nilai) { ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $nilai['nama_taruna']; ?></td>
                    <td>
                    <?php $editUrl = base_url("transkrip/edit/{$nilai['id']}"); ?>
                        <?php $deleteUrl = base_url("transkrip/delete/{$nilai['id']}"); ?>
                        <a href="<?php echo $editUrl; ?>" class="btn btn-primary">Edit</a>
                        <a href="<?php echo $deleteUrl; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/datatables.min.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>
</html>
