<?php include_once __DIR__ . '/../../Layout/karyawan/Header.php'; ?>
<?php include_once __DIR__ . '/../../Layout/karyawan/Sidebar.php'; ?>
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Riwayat Laporan</h2>

    <!-- Filter Form -->
    <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
        <div>
            <label for="status" class="block text-sm font-medium">Status</label>
            <select name="status" id="status" class="border rounded px-2 py-1">
                <option value="">Semua</option>
                <option value="diterima" <?= $_GET['status'] ?? '' === 'diterima' ? 'selected' : '' ?>>Diterima</option>
                <option value="ditolak" <?= $_GET['status'] ?? '' === 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
            </select>
        </div>

        <div>
            <label for="type" class="block text-sm font-medium">Jenis</label>
            <select name="type" id="type" class="border rounded px-2 py-1">
                <option value="">Semua</option>
                <option value="panen" <?= $_GET['type'] ?? '' === 'panen' ? 'selected' : '' ?>>Panen</option>
                <option value="pupuk" <?= $_GET['type'] ?? '' === 'pupuk' ? 'selected' : '' ?>>Pemupukan</option>
                <option value="nyemprot" <?= $_GET['type'] ?? '' === 'nyemprot' ? 'selected' : '' ?>>Penyemprotan</option>
                <option value="pupuk&nyemprot" <?= $_GET['type'] ?? '' === 'pupuk&nyemprot' ? 'selected' : '' ?>>Pupuk & Nyemprot</option>
            </select>
        </div>

        <div>
            <label for="start_date" class="block text-sm font-medium">Tanggal Mulai</label>
            <input type="date" name="start_date" value="<?= $_GET['start_date'] ?? '' ?>" class="border rounded px-2 py-1">
        </div>

        <div>
            <label for="end_date" class="block text-sm font-medium">Tanggal Akhir</label>
            <input type="date" name="end_date" value="<?= $_GET['end_date'] ?? '' ?>" class="border rounded px-2 py-1">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Terapkan Filter</button>
    </form>

    <?php foreach (['panen' => 'Panen', 'pupuk' => 'Pemupukan', 'nyemprot' => 'Penyemprotan', 'pupuk&nyemprot' => 'Pupuk & Nyemprot'] as $typeKey => $typeLabel): ?>
        <?php if (!empty($laporan[$typeKey])): ?>
            <h3 class="text-xl font-bold mt-6 mb-2"><?= $typeLabel ?></h3>
            <table class="table-auto w-full border mb-6">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Area</th>
                        <th class="px-4 py-2">Jenis</th>
                        <?php if ($typeKey === 'panen'): ?>
                            <th class="px-4 py-2">Berat</th>
                        <?php elseif ($typeKey === 'pupuk'): ?>
                            <th class="px-4 py-2">Nama Pupuk</th>
                            <th class="px-4 py-2">Qty Pupuk</th>
                        <?php elseif ($typeKey === 'nyemprot'): ?>
                            <th class="px-4 py-2">Nama Pestisida</th>
                            <th class="px-4 py-2">Qty Pestisida</th>
                        <?php elseif ($typeKey === 'pupuk&nyemprot'): ?>
                            <th class="px-4 py-2">Nama Pupuk</th>
                            <th class="px-4 py-2">Qty Pupuk</th>
                            <th class="px-4 py-2">Nama Pestisida</th>
                            <th class="px-4 py-2">Qty Pestisida</th>
                        <?php endif; ?>
                        <th class="px-4 py-2">Alat</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laporan[$typeKey] as $lapor): ?>
                        <?php
                        $show = true;
                        if (!empty($_GET['status']) && strtolower($lapor['status']) !== strtolower($_GET['status'])) $show = false;
                        if (!empty($_GET['type']) && $lapor['type'] !== $_GET['type']) $show = false;
                        if (!empty($_GET['start_date']) && $lapor['datetime'] < $_GET['start_date']) $show = false;
                        if (!empty($_GET['end_date']) && $lapor['datetime'] > $_GET['end_date']) $show = false;
                        if (!$show) continue;
                        ?>
                        <tr class="border-t">
                            <td class="px-4 py-2"><?= htmlspecialchars($lapor['datetime']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($lapor['area_name']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($lapor['type']) ?></td>
                            <?php if ($typeKey === 'panen'): ?>
                                <td class="px-4 py-2"><?= htmlspecialchars($lapor['weight']) ?> Kg</td>
                            <?php elseif ($typeKey === 'pupuk'): ?>
                                <td class="px-4 py-2"><?= htmlspecialchars($lapor['pupuk_name'] ?? '-') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($lapor['quantity_of_pupuk'] ?? '-') ?></td>
                            <?php elseif ($typeKey === 'nyemprot'): ?>
                                <td class="px-4 py-2"><?= htmlspecialchars($lapor['pesticide_name'] ?? '-') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($lapor['quantity_of_pesticide'] ?? '-') ?></td>
                            <?php endif; ?>
                            <td class="px-4 py-2"><?= htmlspecialchars($lapor['tools'] ?? '-') ?></td>
                            <td class="px-4 py-2 font-semibold <?= strtolower($lapor['status']) === 'ditolak' ? 'text-red-600' : 'text-green-600' ?>">
                                <?= ucfirst($lapor['status']) ?>
                            </td>
                            <td class="px-4 py-2"><?= htmlspecialchars($lapor['rejection_reason'] ?? '-') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<?php include_once __DIR__ . '/../../Layout/Footer.php'; ?>
