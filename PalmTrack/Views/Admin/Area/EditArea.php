<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Edit Area</h2>
    <form action="/PalmTrack/admin/updateArea/<?= $area['id'] ?>" method="post" class="space-y-4">
        <input type="text" name="name" value="<?= $area['name'] ?>" class="w-full border p-2 rounded" required>
        <input type="text" name="size" value="<?= $area['size'] ?>" class="w-full border p-2 rounded" required>
        <input type="number" name="quantity_of_trees" value="<?= $area['quantity_of_trees'] ?>" class="w-full border p-2 rounded" required>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
