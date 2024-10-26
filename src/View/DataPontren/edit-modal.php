<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Edit Lembaga Pontren</h2>
    <form id="editForm">
      <input type="hidden" name="id" id="editId">

      <div class="mb-4">
        <label for="editNamaLembaga" class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
        <input type="text" id="editNamaLembaga" name="nama_lembaga"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50"
          required>
      </div>

      <div class="mb-4">
        <label for="editNspp" class="block text-sm font-medium text-gray-700">Nomor Statistik (NSPP)</label>
        <input type="text" id="editNspp" name="nspp"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50"
          required>
      </div>

      <div class="mb-4">
        <label for="editNpsn" class="block text-sm font-medium text-gray-700">NPSN (Opsional)</label>
        <input type="text" id="editNpsn" name="npsn"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="editAlamat" class="block text-sm font-medium text-gray-700">Alamat</label>
        <input type="text" id="editAlamat" name="alamat"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50"
          required>
      </div>

      <div class="mb-4">
        <label for="editGrup" class="block text-sm font-medium text-gray-700">Grup</label>
        <input type="text" id="editGrup" name="grup"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50"
          required>
      </div>

      <div class="mb-4">
        <label for="editJenjang" class="block text-sm font-medium text-gray-700">Jenjang</label>
        <input type="text" id="editJenjang" name="jenjang"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50"
          required>
      </div>
      <div class="mb-4">
        <label for="editKecamatanId" class="block text-sm font-medium text-gray-700">Kecamatan</label>
        <select id="editKecamatanId" name="kecamatan_id" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
          <option value="1">BANJARBARU SELATAN</option>
          <option value="2">LIANG ANGGANG</option>e
          <option value="3">CEMPAKA</option>
          <option value="4">LANDASAN ULIN</option>
          <option value="5">BANJARBARU UTARA</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="editJumlahSantriPria" class="block text-sm font-medium text-gray-700">Jumlah Santri Pria</label>
        <input type="number" id="editJumlahSantriPria" name="jumlah_santri_pria"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50"
          required>
      </div>

      <div class="mb-4">
        <label for="editJumlahSantriWanita" class="block text-sm font-medium text-gray-700">Jumlah Santri Wanita</label>
        <input type="number" id="editJumlahSantriWanita" name="jumlah_santri_wanita"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50"
          required>
      </div>

      <div class="mb-4">
        <label for="editJumlahKeseluruhan" class="block text-sm font-medium text-gray-700">Jumlah Keseluruhan</label>
        <input type="number" id="editJumlahKeseluruhan" name="jumlah_keseluruhan"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50"
          required>
      </div>

      <div class="flex justify-end">
        <button type="button" id="editModalClose" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tutup</button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">Ubah</button>
      </div>
    </form>
  </div>
</div>