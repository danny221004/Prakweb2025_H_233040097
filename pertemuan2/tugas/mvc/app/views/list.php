<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><?= htmlspecialchars($judul ?? 'Daftar Pengguna'); ?></h1>
        <a href="<?= BASEURL; ?>/user/create" class="btn btn-primary">Tambah User</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['name']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="btn btn-sm btn-info">Detail</a>
                            <a href="<?= BASEURL; ?>/user/edit/<?= $user['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= BASEURL; ?>/user/delete/<?= $user['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus user ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Tidak ada pengguna.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>