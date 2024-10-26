<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Detail Lembaga Pontren</h2>
    <div id="detailCard">
      <input type="hidden" name="id" id="detailId">

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
        <p id="detailNamaLembaga" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nomor Statistik (NSPP)</label>
        <p id="detailNspp" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">NPSN (Opsional)</label>
        <p id="detailNpsn" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <p id="detailAlamat" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Grup</label>
        <p id="detailGrup" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jenjang</label>
        <p id="detailJenjang" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">ID Kecamatan</label>
        <p id="detailKecamatanId" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Kecamatan</label>
        <p id="detailNamaKecamatan" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jumlah Santri Pria</label>
        <p id="detailJumlahSantriPria" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jumlah Santri Wanita</label>
        <p id="detailJumlahSantriWanita" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jumlah Keseluruhan</label>
        <p id="detailJumlahKeseluruhan" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="flex justify-end">
        <button type="button" id="detailModalClose" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tutup</button>
      </div>
    </div>
  </div>
</div>