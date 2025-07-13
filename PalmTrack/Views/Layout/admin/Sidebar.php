<?php
// Mendapatkan path URI yang sedang diakses untuk menyorot link yang aktif
$current_uri = $_SERVER['REQUEST_URI'];
?>

<aside class="w-64 flex-shrink-0 bg-gray-800 text-white flex flex-col">
    <div class="h-16 flex items-center justify-center bg-gray-900">
        <h1 class="text-2xl font-bold text-white">PalmTrack</h1>
    </div>

    <nav class="flex-grow p-4 space-y-2">
        <a href="/palmtrack/admin/index" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Admin/index.php') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            Dashboard
        </a>
        <a href="/palmtrack/Admin/laporan_verifikasi" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Laporan_verifikasi.php') !== false) ? 'bg-gray-900' : '' ?>">
             <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            Verifikasi Laporan
        </a>

        <p class="px-4 pt-4 pb-2 text-xs text-gray-400 uppercase">Manajemen Data</p>
        
        <a href="http://localhost/palmtrack/admin/users
" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Admin/User/') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015.5-4.93a6.97 6.97 0 00-1.5 4.33A6.97 6.97 0 006.07 17H1v-1a5 5 0 015-5z"></path></svg>
            Users
        </a>
        <a href="http://localhost/palmtrack/admin/area" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Admin/Area/') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
            Area
        </a>
        <a href="http://localhost/palmtrack/admin/alat
" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Admin/Alat/') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M3.5 2.5a.5.5 0 01.5-.5h2.293a.5.5 0 01.353.146l1.061 1.061l.5.5a.5.5 0 010 .708l-.5.5l-1.06 1.06a.5.5 0 01-.354.147H4a.5.5 0 01-.5-.5v-3zM16 4.996a.5.5 0 01-.354-.146l-1.06-1.06l-.5-.5a.5.5 0 010-.708l.5-.5l1.06-1.06a.5.5 0 01.354-.147h2.293a.5.5 0 01.5.5v3a.5.5 0 01-.5.5h-2zM5.5 13a.5.5 0 01.354.146l1.06 1.06l.5.5a.5.5 0 010 .708l-.5.5l-1.06 1.06a.5.5 0 01-.354.147H4a.5.5 0 01-.5-.5v-3a.5.5 0 01.5-.5h1.5zm10 0a.5.5 0 01.354.146l1.06 1.06l.5.5a.5.5 0 010 .708l-.5.5l-1.06 1.06a.5.5 0 01-.354.147h-2.293a.5.5 0 01-.5-.5v-3a.5.5 0 01.5-.5h2.293z"></path></svg>
            Alat
        </a>
        <a href="http://localhost/palmtrack/admin/pupuk" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Admin/Pupuk/') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M10 3.5a1.5 1.5 0 01.954 2.767l-6.233 6.233A1.5 1.5 0 013.5 10a1.5 1.5 0 012.767-.954l6.233-6.233A1.5 1.5 0 0110 3.5zM3.5 10a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM16.5 10a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM10 16.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
            Pupuk
        </a>
        <a href="/PalmTrack/admin/trxPupuk" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Admin/Pupuk/') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M10 3.5a1.5 1.5 0 01.954 2.767l-6.233 6.233A1.5 1.5 0 013.5 10a1.5 1.5 0 012.767-.954l6.233-6.233A1.5 1.5 0 0110 3.5zM3.5 10a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM16.5 10a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM10 16.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
            Transaksi Pupuk
        </a>
        <a href="http://localhost/palmtrack/admin/pestisida
" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Admin/Pestisida/') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.333a1 1 0 001.624.781l.526-.304a1 1 0 011.298.577l.866 1.5a1 1 0 01-.22 1.186l-.605.524a1 1 0 000 1.564l.605.524a1 1 0 01.22 1.186l-.866 1.5a1 1 0 01-1.298.577l-.526-.304a1 1 0 00-1.624.781V17a1 1 0 11-2 0v-1.333a1 1 0 00-1.624-.781l-.526.304a1 1 0 01-1.298-.577l-.866-1.5a1 1 0 01.22-1.186l.605-.524a1 1 0 000-1.564l-.605-.524a1 1 0 01-.22-1.186l.866-1.5a1 1 0 011.298-.577l.526.304A1 1 0 009 4.333V3a1 1 0 011-1zM10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
            Pestisida
        </a>
        <a href="/PalmTrack/admin/trxPestisida
" class="flex items-center px-4 py-2.5 rounded-md transition duration-200 hover:bg-gray-700 <?= (strpos($current_uri, 'Admin/Pestisida/') !== false) ? 'bg-gray-900' : '' ?>">
            <svg class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.333a1 1 0 001.624.781l.526-.304a1 1 0 011.298.577l.866 1.5a1 1 0 01-.22 1.186l-.605.524a1 1 0 000 1.564l.605.524a1 1 0 01.22 1.186l-.866 1.5a1 1 0 01-1.298.577l-.526-.304a1 1 0 00-1.624.781V17a1 1 0 11-2 0v-1.333a1 1 0 00-1.624-.781l-.526.304a1 1 0 01-1.298-.577l-.866-1.5a1 1 0 01.22-1.186l.605-.524a1 1 0 000-1.564l-.605-.524a1 1 0 01-.22-1.186l.866-1.5a1 1 0 011.298-.577l.526.304A1 1 0 009 4.333V3a1 1 0 011-1zM10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
            Transaksi Pestisida
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
            <span class="mr-3 font-semibold text-gray-700">Admin</span>
            <div class="w-10 h-10 rounded-full bg-gray-300">
                </div>
        </div>
    </div>