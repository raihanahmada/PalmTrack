<?php 
// --- PERBAIKAN DI SINI ---
// Gunakan __DIR__ untuk path yang andal
require __DIR__ . '/../Layout/admin/Header.php'; 
require __DIR__ . '/../Layout/admin/Sidebar.php'; 
?>
<table class="w-full border text-sm">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-2 border">Tanggal</th>
            <th class="p-2 border">Karyawan</th>
            <th class="p-2 border">Area</th>
            <th class="p-2 border">Tipe</th>
            <th class="p-2 border">Berat (Kg)</th>
            <th class="p-2 border">Pupuk</th>
            <th class="p-2 border">Qty Pupuk</th>
            <th class="p-2 border">Pestisida</th>
            <th class="p-2 border">Qty Pestisida</th>
            <th class="p-2 border">Catatan</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($laporan as $lap) : ?>
            <tr>
                <td class="border p-2"><?= $lap['datetime'] ?></td>
                <td class="border p-2"><?= $lap['employee_name'] ?></td>
                <td class="border p-2"><?= $lap['area_name'] ?></td>
                <td class="border p-2"><?= ucfirst($lap['type']) ?></td>
                <td class="border p-2"><?= $lap['weight'] ?? '-' ?></td>
                <td class="border p-2"><?= $lap['pupuk_name'] ?? '-' ?></td>
                <td class="border p-2"><?= $lap['quantity_of_pupuk'] ?? '-' ?></td>
                <td class="border p-2"><?= $lap['pesticide_name'] ?? '-' ?></td>
                <td class="border p-2"><?= $lap['quantity_of_pesticide'] ?? '-' ?></td>
                <td class="border p-2"><?= $lap['notes'] ?? '-' ?></td>
                <td class="border p-2 text-center">
                    <a href="/PalmTrack/admin/verifikasi/<?= $lap['id'] ?>/terima" class="text-green-600 font-semibold">
                        ✔ Terima
                    </a>
                    <br>
                    <form action="/PalmTrack/admin/tolak/<?= $lap['id'] ?>" method="post" class="space-y-1">
    <input type="text" name="alasan" placeholder="Alasan tolak" required
        class="border p-1 text-sm w-full rounded" />
    <button type="submit" class="text-red-600 font-semibold">✘ Tolak</button>
</form>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php 
// --- PERBAIKAN DI SINI ---
require __DIR__ . '/../Layout/Footer.php'; 
?>
