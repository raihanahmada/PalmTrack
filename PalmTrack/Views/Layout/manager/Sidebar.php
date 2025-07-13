<?php
$current_uri = $_SERVER['REQUEST_URI'];
?>

<aside class="w-64 flex-shrink-0 bg-gray-800 text-white flex flex-col">
    <div class="h-16 flex items-center justify-center bg-gray-900">
        <h1 class="text-2xl font-bold text-white">PalmTrack</h1>
    </div>

    <nav class="flex-grow p-4 space-y-2">
        <a href="/PalmTrack/manager/index" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= strpos($current_uri, 'manager/index') !== false ? 'bg-gray-900' : '' ?>">
            📊 <span class="ml-3">Grafik Panen</span>
        </a>

        <a href="/PalmTrack/manager/laporan" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= strpos($current_uri, 'manager/laporan') !== false ? 'bg-gray-900' : '' ?>">
            📄 <span class="ml-3">Laporan Diterima</span>
        </a>

        <a href="/PalmTrack/manager/pupuk" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= strpos($current_uri, 'manager/pupuk') !== false ? 'bg-gray-900' : '' ?>">
            🌿 <span class="ml-3">Stok Pupuk</span>
        </a>

        <a href="/PalmTrack/manager/pestisida" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= strpos($current_uri, 'manager/pestisida') !== false ? 'bg-gray-900' : '' ?>">
            🐛 <span class="ml-3">Stok Pestisida</span>
        </a>

        <a href="/PalmTrack/manager/trxPupuk" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= strpos($current_uri, 'manager/trxPupuk') !== false ? 'bg-gray-900' : '' ?>">
            💼 <span class="ml-3">Transaksi Pupuk</span>
        </a>

        <a href="/PalmTrack/manager/trxPestisida" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= strpos($current_uri, 'manager/trxPestisida') !== false ? 'bg-gray-900' : '' ?>">
            💼 <span class="ml-3">Transaksi Pestisida</span>
        </a>

        <a href="/PalmTrack/manager/alat" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= strpos($current_uri, 'manager/alat') !== false ? 'bg-gray-900' : '' ?>">
            🛠️ <span class="ml-3">Data Alat</span>
        </a>

        <a href="/PalmTrack/manager/area" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= strpos($current_uri, 'manager/area') !== false ? 'bg-gray-900' : '' ?>">
            🌾 <span class="ml-3">Data Area</span>
        </a>
    </nav>

    <div class="p-4">
        <a href="/PalmTrack/auth/logout" class="flex items-center justify-center w-full px-4 py-2.5 rounded-md transition duration-200 bg-red-600 hover:bg-red-700 text-white">
            🔒 <span class="ml-2">Logout</span>
        </a>
    </div>
</aside>

<main class="flex-1">
    <div class="bg-white shadow-md h-16 flex items-center justify-between px-6">
        <div class="text-gray-800 font-semibold">
            <!-- Judul halaman -->
        </div>
        <div class="flex items-center">
            <span class="mr-3 font-semibold text-gray-700">Manager</span>
            <div class="w-10 h-10 rounded-full bg-gray-300"></div>
        </div>
    </div>
