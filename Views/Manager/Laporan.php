<?php
include_once __DIR__ . '/../Layout/manager/Header.php';
include_once __DIR__ . '/../Layout/manager/Sidebar.php';

// Kelompokkan berdasarkan type
$panen = [];
$pupuk = [];
$nyemprot = [];

foreach ($laporan as $lap) {
    if ($lap['type'] === 'panen') {
        $panen[] = $lap;
    } elseif ($lap['type'] === 'pupuk') {
        $pupuk[] = $lap;
    } elseif ($lap['type'] === 'nyemprot') {
        $nyemprot[] = $lap;
    }
}
?>

<div class="w-full px-4 py-6 md:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-10">
        <h1 class="text-3xl font-bold text-gray-800">Laporan Diterima</h1>

        <!-- Filter Form -->
        <form method="GET" class="bg-white rounded shadow p-4 mb-6 flex flex-wrap gap-4 items-end">
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="<?= $_GET['tanggal_mulai'] ?? '' ?>" class="border px-2 py-1 rounded">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" value="<?= $_GET['tanggal_akhir'] ?? '' ?>" class="border px-2 py-1 rounded">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Jenis</label>
                <select name="type" class="border px-2 py-1 rounded">
                    <option value="">Semua</option>
                    <option value="panen" <?= isset($_GET['type']) && $_GET['type'] === 'panen' ? 'selected' : '' ?>>Panen</option>
                    <option value="pupuk" <?= isset($_GET['type']) && $_GET['type'] === 'pupuk' ? 'selected' : '' ?>>Pemupukan</option>
                    <option value="nyemprot" <?= isset($_GET['type']) && $_GET['type'] === 'nyemprot' ? 'selected' : '' ?>>Penyemprotan</option>
                    <option value="pupuk&nyemprot" <?= isset($_GET['type']) && $_GET['type'] === 'pupuk&nyemprot' ? 'selected' : '' ?>>Pupuk + Nyemprot</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Terapkan Filter</button>
            </div>
        </form>

        <!-- Panen -->
        <div>
            <h2 class="text-xl font-bold mb-2">Panen</h2>
            <div class="bg-white rounded shadow overflow-x-auto">
                <table class="w-full table-auto text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Area</th>
                            <th class="px-4 py-2 border">Jenis</th>
                            <th class="px-4 py-2 border">Berat</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Alat</th>
                            <th class="px-4 py-2 border">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($panen as $r): ?>
                            <tr>
                                <td class="px-4 py-2 border"><?= $r['datetime'] ?></td>
                                <td class="px-4 py-2 border"><?= $r['area_name'] ?></td>
                                <td class="px-4 py-2 border"><?= $r['type'] ?></td>
                                <td class="px-4 py-2 border"><?= $r['weight'] ?> Kg</td>
                                <td class="px-4 py-2 border text-green-600 font-semibold">Diterima</td>
                                <td class="px-4 py-2 border"><?= $r['tools'] ?? '-' ?></td>
                                <td class="px-4 py-2 border"><?= $r['notes'] ?? '-' ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($panen)) : ?>
                            <tr><td colspan="7" class="text-center py-4">Tidak ada laporan panen.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pemupukan -->
        <div>
            <h2 class="text-xl font-bold mb-2">Pemupukan</h2>
            <div class="bg-white rounded shadow overflow-x-auto">
                <table class="w-full table-auto text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Area</th>
                            <th class="px-4 py-2 border">Jenis</th>
                            <th class="px-4 py-2 border">Nama Pupuk</th>
                            <th class="px-4 py-2 border">Qty Pupuk</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Alat</th>
                            <th class="px-4 py-2 border">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pupuk as $r): ?>
                            <tr>
                                <td class="px-4 py-2 border"><?= $r['datetime'] ?></td>
                                <td class="px-4 py-2 border"><?= $r['area_name'] ?></td>
                                <td class="px-4 py-2 border"><?= $r['type'] ?></td>
                                <td class="px-4 py-2 border"><?= $r['pupuk_name'] ?? '-' ?></td>
                                <td class="px-4 py-2 border"><?= $r['quantity_of_pupuk'] ?? '-' ?></td>
                                <td class="px-4 py-2 border text-green-600 font-semibold">Diterima</td>
                                <td class="px-4 py-2 border"><?= $r['tools'] ?? '-' ?></td>
                                <td class="px-4 py-2 border"><?= $r['notes'] ?? '-' ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($pupuk)) : ?>
                            <tr><td colspan="8" class="text-center py-4">Tidak ada laporan pemupukan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Penyemprotan -->
        <div>
            <h2 class="text-xl font-bold mb-2">Penyemprotan</h2>
            <div class="bg-white rounded shadow overflow-x-auto">
                <table class="w-full table-auto text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Area</th>
                            <th class="px-4 py-2 border">Jenis</th>
                            <th class="px-4 py-2 border">Nama Pestisida</th>
                            <th class="px-4 py-2 border">Qty Pestisida</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Alat</th>
                            <th class="px-4 py-2 border">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($nyemprot as $r): ?>
                            <tr>
                                <td class="px-4 py-2 border"><?= $r['datetime'] ?></td>
                                <td class="px-4 py-2 border"><?= $r['area_name'] ?></td>
                                <td class="px-4 py-2 border"><?= $r['type'] ?></td>
                                <td class="px-4 py-2 border"><?= $r['pesticide_name'] ?? '-' ?></td>
                                <td class="px-4 py-2 border"><?= $r['quantity_of_pesticide'] ?? '-' ?></td>
                                <td class="px-4 py-2 border text-green-600 font-semibold">Diterima</td>
                                <td class="px-4 py-2 border"><?= $r['tools'] ?? '-' ?></td>
                                <td class="px-4 py-2 border"><?= $r['notes'] ?? '-' ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($nyemprot)) : ?>
                            <tr><td colspan="8" class="text-center py-4">Tidak ada laporan penyemprotan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php
include_once __DIR__ . '/../Layout/Footer.php';
?>
