<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Tambah User</h2>

    <form action="/PalmTrack/admin/simpanUser" method="post" class="space-y-4">
        <input type="text" name="name" placeholder="Nama Lengkap" required class="w-full border p-2 rounded">
        
        <input type="text" name="username" placeholder="Username" required class="w-full border p-2 rounded">
        
        <input type="email" name="email" placeholder="Email" required class="w-full border p-2 rounded">
        
        <input type="password" name="password" placeholder="Password" required class="w-full border p-2 rounded">
        
        <select name="role" required class="w-full border p-2 rounded">
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
            <option value="employee">Employee</option>
        </select>
        
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
