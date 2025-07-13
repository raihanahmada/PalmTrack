<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Tambah Pestisida</h2>
    <form action="/PalmTrack/admin/simpanPestisida" method="post" class="space-y-4">
        <input type="text" name="name" placeholder="Nama Pestisida" class="w-full border p-2 rounded" required>
        <textarea name="description" placeholder="Deskripsi" class="w-full border p-2 rounded"></textarea>
        <input type="number" name="stock" placeholder="Stok" class="w-full border p-2 rounded" required>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
