<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Edit Pupuk</h2>
    <form action="/PalmTrack/admin/updatePupuk/<?= $pupuk['id'] ?>" method="post" class="space-y-4">
        <input type="text" name="name" value="<?= $pupuk['name'] ?>" class="w-full border p-2 rounded" required>
        <textarea name="description" class="w-full border p-2 rounded"><?= $pupuk['description'] ?></textarea>
        <input type="number" name="stock" value="<?= $pupuk['stock'] ?>" class="w-full border p-2 rounded" required>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
