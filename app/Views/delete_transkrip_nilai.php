<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<h1>Hapus Transkrip Nilai</h1>

<p>Apakah Anda yakin ingin menghapus transkrip nilai ini?</p>

<form action="<?= base_url('transkrip/delete/' . $nilai['id']); ?>" method="post">
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-danger">Hapus</button>
    <a href="<?= base_url('transkrip'); ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection(); ?>
