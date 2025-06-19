<?php include __DIR__ . '/../templates/header.php'; ?>
<?php
$username = \Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper::getUsername();
?>


<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
  <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed inset-0 z-20 transition-opacity bg-zinc opacity-50 lg:hidden"></div>

  <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gradient-to-b from-[#11998e] to-[#38ef7d] lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
      <div class="flex items-center justify-center w-full">
        <img width="70" height="70" src="https://img.icons8.com/color/100/ramadan.png" alt="ramadan" />
        <span class="mx-2  text-2xl font-semibold text-white">SIPONTREN</span>
      </div>
    </div>

    <nav class="mt-10">
      <a class="flex items-center px-6 py-2 mt-4 text-lime-50 font-semibold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/dashboard">

        <span class="material-symbols-outlined">home</span>
        <span class="mx-3">Halaman Utama</span>
      </a>

      <a class="flex items-center px-6 py-2 mt-4 text-lime-50 font-semibold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
        href="/lembaga-show">
        <span class="material-symbols-outlined">apartment</span>
        <span class="mx-3">Lembaga Pendidikan Islam</span>
      </a>

      <a class="flex items-center px-6 py-2 mt-4 text-lime-50 font-semibold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
        href="/operator-show">
        <span class="material-symbols-outlined">person_outline</span>
        <span class="mx-3">Operator Lembaga</span>
      </a>

      <a class="flex items-center px-6 py-2 mt-4 text-lime-50 font-semibold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
        href="/jenis-lembaga-show">
        <span class="material-symbols-outlined">category</span>
        <span class="mx-3">Jenis Lembaga Pendidikan</span>
      </a>

      <a class="flex items-center px-6 py-2 mt-4 text-lime-50 font-semibold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
        href="/murid-show">
        <span class="material-symbols-outlined">groups</span>
        <span class="mx-3">Murid</span>
      </a>

      <a class="flex items-center px-6 py-2 mt-4 text-lime-50 font-semibold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
        href="/staff-show">
        <span class="material-symbols-outlined">diversity_3</span>
        <span class="mx-3">Staff</span>
      </a>

      <a class="flex items-center px-6 py-2 mt-4 text-lime-50 font-semibold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
        href="/jabatan-staff-show">
        <span class="material-symbols-outlined">badge</span>
        <span class="mx-3">Jabatan Staff</span>
      </a>

      <a class="flex items-center px-6 py-2 mt-4 text-lime-50 font-semibold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
        href="/kecamatan-show">
        <span class="material-symbols-outlined">location_city</span>
        <span class="mx-3">Kecamatan</span>
      </a>

      <a class="flex items-center px-6 py-2 mt-4 text-lime-50 font-semibold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
        href="/user-show">
        <span class="material-symbols-outlined">manage_accounts</span>
        <span class="mx-3">User</span>
      </a>
    </nav>


  </div>
  <div class="flex flex-col flex-1 overflow-hidden">
    <header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-teal-600">
      <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-lime-50 font-semibold focus:outline-none lg:hidden">
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round"></path>
          </svg>
        </button>
      </div>

      <div class="flex pl-4 w-full items-center text-zinc-700 justify-between">
        <p>Selamat datang, <span class="font-bold"><?= $username ?></span></p>
        <button
          class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
          <a href="/auth/logout">Log Out</a>
        </button>
      </div>
    </header>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">