<div class="container mt-4">
    <h1>Tambah User</h1>

    <form action="<?= BASEURL; ?>/user/store" method="post">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">Batal</a>
    </form>
</div>