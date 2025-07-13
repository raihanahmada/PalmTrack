<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Tambah Area</h2>
    <form action="/PalmTrack/admin/simpanArea" method="post" class="space-y-4">
        <input type="text" name="name" placeholder="Nama Area" class="w-full border p-2 rounded" required>
        <input type="text" name="size" placeholder="Ukuran (misal: 2 hektar)" class="w-full border p-2 rounded" required>
        <input type="number" name="quantity_of_trees" placeholder="Jumlah Pohon" class="w-full border p-2 rounded" required>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
