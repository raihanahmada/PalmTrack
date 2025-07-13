<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Edit Alat</h2>
    <form action="/PalmTrack/admin/updateAlat/<?= $alat['id'] ?>" method="post" class="space-y-4">
        <input type="text" name="name" value="<?= $alat['name'] ?>" class="w-full border p-2 rounded" required>
        <input type="text" name="type" value="<?= $alat['type'] ?>" class="w-full border p-2 rounded" required>
        <input type="text" name="plat_number" value="<?= $alat['plat_number'] ?>" class="w-full border p-2 rounded">
        <textarea name="description" class="w-full border p-2 rounded"><?= $alat['description'] ?></textarea>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
