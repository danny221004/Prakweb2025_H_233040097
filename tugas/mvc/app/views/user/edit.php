<div class="container mt-4">
    <h1>Edit User</h1>

    <form action="<?= BASEURL; ?>/user/update" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">Batal</a>
    </form>
</div>