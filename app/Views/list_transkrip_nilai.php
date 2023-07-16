<!-- app/Views/list_transkrip_nilai.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Transkrip Nilai</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
</head>
<body>
    <h1>Daftar Transkrip Nilai</h1>

    <table id="datatable" class="display">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Taruna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transkrip_nilai as $index => $nilai): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= $nilai['nama_taruna']; ?></td>
                    <td>
                        <a href="<?= base_url('transkrip/edit/' . $nilai['id']); ?>" class="btn btn-primary">Edit</a>
                        <form action="<?= base_url('transkrip/delete/' . $nilai['id']); ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
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
