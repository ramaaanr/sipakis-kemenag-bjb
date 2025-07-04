<?php include __DIR__ . '/../admin-templates/header.php'; ?>
<?php
session_start();
$role = $_SESSION['user']['role'] ?? 'guest';
?>
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
  <div class="container px-6 py-8 mx-auto">
    <h3 class="text-3xl font-medium text-gray-700">Dashboard</h3>

    <div class="mt-4">
      <div class="flex flex-wrap -mx-6 ">

        <?php if ($role !== 'pimpinan'): ?>
          <?php if ($role === 'operator'): ?>
            <a href="/lembaga-show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
              <!-- Card Lembaga -->
              <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="w-12 h-12 flex justify-center items-center bg-indigo-600 bg-opacity-75 rounded-full">
                  <span class="material-symbols-outlined text-white">apartment</span>
                </div>
                <div class="mx-3">
                  <h4 class="text-xl font-semibold text-gray-700">Lembaga</h4>
                  <div class="text-gray-500">Data Lembaga Pendidikan Islam</div>
                </div>
              </div>
            </a>
            <?php endif; ?><?php if ($role === 'staff'): ?>
            <a href="/lembaga-admin-show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
              <!-- Card Lembaga -->
              <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="w-12 h-12 flex justify-center items-center bg-indigo-600 bg-opacity-75 rounded-full">
                  <span class="material-symbols-outlined text-white">apartment</span>
                </div>
                <div class="mx-3">
                  <h4 class="text-xl font-semibold text-gray-700">Lembaga</h4>
                  <div class="text-gray-500">Data Lembaga Pendidikan Islam</div>
                </div>
              </div>
            </a>
          <?php endif; ?>

          <?php if ($role === 'operator' || $role === 'staff'): ?>
            <a href="/operator-show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
              <!-- Card Operator -->
              <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="w-12 h-12 flex justify-center items-center bg-lime-600 bg-opacity-75 rounded-full">
                  <span class="material-symbols-outlined text-white">person_outline</span>
                </div>
                <div class="mx-3">
                  <h4 class="text-xl font-semibold text-gray-700">Operator</h4>
                  <div class="text-gray-500">Data Operator Lembaga</div>
                </div>
              </div>
            </a>
          <?php endif; ?>

          <?php if ($role === 'staff'): ?>
            <a href="/jenis-lembaga-show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
              <!-- Card Jenis Lembaga -->
              <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="w-12 h-12 flex justify-center items-center bg-amber-600 bg-opacity-75 rounded-full">
                  <span class="material-symbols-outlined text-white">category</span>
                </div>
                <div class="mx-3">
                  <h4 class="text-xl font-semibold text-gray-700">Jenis Lembaga</h4>
                  <div class="text-gray-500">Data Jenis Lembaga Pendidikan</div>
                </div>
              </div>
            </a>

            <a href="/kecamatan-show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
              <!-- Card Kecamatan -->
              <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="w-12 h-12 flex justify-center items-center bg-teal-600 bg-opacity-75 rounded-full">
                  <span class="material-symbols-outlined text-white">location_city</span>
                </div>
                <div class="mx-3">
                  <h4 class="text-xl font-semibold text-gray-700">Kecamatan</h4>
                  <div class="text-gray-500">Data Kecamatan Lokasi Lembaga</div>
                </div>
              </div>
            </a>
          <?php endif; ?>

          <?php if ($role === 'operator'): ?>
            <a href="/murid-show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
              <!-- Card Murid -->
              <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="w-12 h-12 flex justify-center items-center bg-emerald-600 bg-opacity-75 rounded-full">
                  <span class="material-symbols-outlined text-white">groups</span>
                </div>
                <div class="mx-3">
                  <h4 class="text-xl font-semibold text-gray-700">Murid</h4>
                  <div class="text-gray-500">Data Murid Pendidikan Islam</div>
                </div>
              </div>
            </a>
          <?php endif; ?>

          <?php if ($role === 'operator'): ?>
            <a href="/staff-show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
              <!-- Card Staff -->
              <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="w-12 h-12 flex justify-center items-center bg-rose-600 bg-opacity-75 rounded-full">
                  <span class="material-symbols-outlined text-white">diversity_3</span>
                </div>
                <div class="mx-3">
                  <h4 class="text-xl font-semibold text-gray-700">Staff</h4>
                  <div class="text-gray-500">Data Staff Pengajar & Tenaga Kependidikan</div>
                </div>
              </div>
            </a>
          <?php endif; ?>

          <?php if ($role === 'staff'): ?>
            <a href="/jabatan-staff-show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
              <!-- Card Jabatan -->
              <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="w-12 h-12 flex justify-center items-center bg-cyan-600 bg-opacity-75 rounded-full">
                  <span class="material-symbols-outlined text-white">badge</span>
                </div>
                <div class="mx-3">
                  <h4 class="text-xl font-semibold text-gray-700">Jabatan</h4>
                  <div class="text-gray-500">Data Jabatan Staff</div>
                </div>
              </div>
            </a>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($role === 'admin'): ?>
          <a href="/user-show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
            <!-- Card User -->
            <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
              <div class="w-12 h-12 flex justify-center items-center bg-fuchsia-600 bg-opacity-75 rounded-full">
                <span class="material-symbols-outlined text-white">manage_accounts</span>
              </div>
              <div class="mx-3">
                <h4 class="text-xl font-semibold text-gray-700">User</h4>
                <div class="text-gray-500">Manajemen User Aplikasi</div>
              </div>
            </div>
          </a>
        <?php endif; ?>

        <?php if ($role === 'pimpinan'): ?>
          <div class="w-full my-4 px-6 text-center text-gray-700">
            <p class="text-xl">Selamat datang, Pimpinan.</p>
            <p class="text-gray-600">Silakan akses data dan cetak laporan melalui halaman masing-masing.</p>
          </div>
        <?php endif; ?>

      </div>

    </div>
  </div>
</main>




<?php include __DIR__ . '/../admin-templates/footer.php'; ?>