<?php include_once __DIR__ . '/../Layout/admin/Header.php'; ?>
<?php include_once __DIR__ . '/../Layout/admin/Sidebar.php'; ?>

<div class="w-full px-4 py-6 md:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        <!-- Greeting Admin -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Halo, <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Admin') ?>!
            </h1>
            <p class="text-gray-600 mt-2">
                Siap memverifikasi laporan kerja hari ini? Anda bisa langsung memverifikasi laporan sekarang.
            </p>
            <a href="/PalmTrack/admin/laporan_verifikasi" class="inline-block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-sm transition duration-200">
                Verifikasi Laporan
            </a>
        </div>

        <!-- Laporan Pending -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Laporan Belum Diverifikasi</h2>

            <?php if (!empty($laporan_pending)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-left mb-4">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-3 font-semibold">Tanggal</th>
                                <th class="p-3 font-semibold">Karyawan</th>
                                <th class="p-3 font-semibold">Jenis</th>
                                <th class="p-3 font-semibold">Area</th>
                                <th class="p-3 font-semibold">Status</th>
                                <th class="p-3 font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($laporan_pending as $lap): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3"><?= date('Y-m-d', strtotime($lap['datetime'])) ?></td>
                                    <td class="p-3"><?= htmlspecialchars($lap['employee_name']) ?></td>
                                    <td class="p-3"><?= htmlspecialchars($lap['type']) ?></td>
                                    <td class="p-3"><?= htmlspecialchars($lap['area_name']) ?></td>
                                    <td class="p-3 text-yellow-700 font-semibold">Pending</td>
                                    <td class="p-3">
                                        <a href="/PalmTrack/admin/laporan_verifikasi" class="text-blue-600 hover:underline">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-gray-600">Tidak ada laporan yang menunggu verifikasi.</p>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php include_once __DIR__ . '/../Layout/Footer.php'; ?>
