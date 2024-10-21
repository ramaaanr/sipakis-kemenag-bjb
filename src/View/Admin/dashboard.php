<?php include __DIR__ . '/../admin-templates/header.php'; ?>

<div class="container px-6 py-8 mx-auto">
  <h3 class="text-3xl font-medium text-gray-700">Dashboard</h3>

  <div class="mt-4">
    <div class="flex flex-wrap -mx-6 ">
      <a href="/barang/show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
          <div class="w-12 h-12 flex justify-center items-center bg-indigo-600 bg-opacity-75 rounded-full">
            <span class="material-symbols-outlined text-lime-50">
              school
            </span>
          </div>

          <div class="mx-3">
            <h4 class="text-2xl font-semibold text-gray-700">Pontren</h4>
            <div class="text-gray-500">Data Pondok Pesantren Kota Banjarbaru</div>
          </div>
        </div>
      </a>
      <a href="/barangmasuk/show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
          <div class="w-12 h-12 flex justify-center items-center bg-lime-600 bg-opacity-75 rounded-full">
            <span class="material-symbols-outlined text-lime-50">
              mosque
            </span>
          </div>

          <div class="mx-3">
            <h4 class="text-2xl font-semibold text-gray-700">MDT</h4>
            <div class="text-gray-500">Data Madrasah Diniyah Takmiliyah</div>
          </div>
        </div>
      </a>
      <a href="/barangkeluar/show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
          <div class="w-12 h-12 flex justify-center items-center bg-amber-600 bg-opacity-75 rounded-full">
            <span class="material-symbols-outlined text-lime-50">
              person
            </span>
          </div>

          <div class="mx-3">
            <h4 class="text-2xl font-semibold text-gray-700">Pengajar MDT</h4>
            <div class="text-gray-500">Data Ustad/Ustadzah Madrasah Diniyah Takmiliyah</div>
          </div>
        </div>
      </a>
      <a href="/barangrusak/show" class="w-full my-4 px-6 sm:w-1/2 xl:w-1/3 cursor-pointer">
        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
          <div class="w-12 h-12 flex justify-center items-center bg-emerald-600 bg-opacity-75 rounded-full">
            <span class="material-symbols-outlined text-lime-50">
              groups
            </span>
          </div>

          <div class="mx-3">
            <h4 class="text-2xl font-semibold text-gray-700">Murid MDT</h4>
            <div class="text-gray-500">Data Murid Madrasah Diniyah Takmiliyah</div>
          </div>
        </div>
      </a>


    </div>
  </div>

  <div class="mt-8">

  </div>

  <div class="flex flex-col mt-8">
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

      </div>
    </div>
  </div>
</div>



<?php include __DIR__ . '/../admin-templates/footer.php'; ?>