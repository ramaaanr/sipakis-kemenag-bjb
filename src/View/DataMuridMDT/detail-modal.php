<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Detail Murid MDT</h2>
    <div id="detailCard">
      <input type="hidden" name="id" id="detailId">

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Murid</label>
        <p id="detailNama" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Lembaga</label>
        <p id="detailLembaga" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir (TTL)</label>
        <p id="detailTTL" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">NISN</label>
        <p id="detailNISN" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <p id="detailJenisKelamin" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Rombel Kelas</label>
        <p id="detailRombelKelas" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Tingkat</label>
        <p id="detailTingkat" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Keterangan</label>
        <p id="detailKeterangan" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="flex justify-end">
        <button type="button" id="detailModalClose" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  $('#muridTable tbody').on('click', '.detail-btn', function() {

    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var ttl = $(this).data('ttl');
    var nisn = $(this).data('nisn');
    var jenisKelamin = $(this).data('jenis_kelamin');
    var rombelKelas = $(this).data('rombel_kelas');
    var tingkat = $(this).data('tingkat');
    var lembaga = $(this).data('lembaga');
    var keterangan = $(this).data('keterangan');

    $('#detailId').text(id);
    $('#detailNama').text(nama);
    $('#detailTTL').text(ttl);
    $('#detailNISN').text(nisn);
    $('#detailJenisKelamin').text(jenisKelamin);
    $('#detailRombelKelas').text(rombelKelas);
    $('#detailTingkat').text(tingkat);
    $('#detailKeterangan').text(keterangan);
    $('#detailLembaga').text(lembaga);

    $('#detailModal').removeClass('hidden');
  });

  $('#detailModalClose').on('click', function() {
    $('#detailModal').addClass('hidden');
  });
});
</script>