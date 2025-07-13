<?php
// Mendapatkan URI untuk menyorot link aktif
$current_uri = $_SERVER['REQUEST_URI'];
?>

<aside class="w-64 flex-shrink-0 bg-gray-800 text-white flex flex-col">
    <div class="h-16 flex items-center justify-center bg-gray-900">
        <h1 class="text-2xl font-bold text-white">PalmTrack</h1>
    </div>

    <nav class="flex-grow p-4 space-y-2">
        <a href="http://localhost/palmtrack/karyawan/index" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Karyawan/index.php') !== false || strpos($current_uri, 'Karyawan/Dashboard.php') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            Dashboard
        </a>
        <a href="http://localhost/PalmTrack/karyawan/laporan/create" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Laporan/Create.php') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
            Buat Laporan Baru
        </a>
        <a href="/PalmTrack/karyawan/laporan/history" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Laporan/History.php') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H4zm0 2h12v12H4V4z" clip-rule="evenodd"></path><path d="M8.5 6a.5.5 0 00-1 0v4a.5.5 0 00.5.5H12a.5.5 0 000-1H9V6z"></path></svg>
            Riwayat Laporan
        </a>
    </nav>
    
    <div class="p-4">
         <a href="#" class="flex items-center justify-center w-full px-4 py-2.5 rounded-md transition duration-200 bg-red-600 hover:bg-red-700 text-white">
            <svg class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
            Logout
        </a>
    </div>
</aside>

<main class="flex-1">
    <div class="bg-white shadow-md h-16 flex items-center justify-between px-6">
        <div class="text-gray-800 font-semibold">
            </div>
        <div class="flex items-center">
            <span class="mr-3 font-semibold text-gray-700">Karyawan</span>
            <div class="w-10 h-10 rounded-full bg-gray-300">
                </div>
        </div>
    </div>