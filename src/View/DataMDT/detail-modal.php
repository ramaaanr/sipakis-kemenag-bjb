<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Detail Lembaga Pontren</h2>
    <div id="detailCard">
      <input type="hidden" name="id" id="detailId">

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
        <p id="detailLembaga" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nomor Statistik (NSPP)</label>
        <p id="detailNomorStatistik" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <p id="detailAlamat" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Kepala</label>
        <p id="detailNamaKepala" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jumlah Murid</label>
        <p id="detailJumlahMurid" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jumlah Pengajar</label>
        <p id="detailJumlahPengajar" class="mt-1 block text-gray-800"></p>
      </div>

      <div class="flex justify-end">
        <button type="button" id="detailModalClose" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
// Script to open and close modal
document.addEventListener("DOMContentLoaded", function() {
  $('#lembagaTable tbody').on('click', '.detail-btn', function() {

    var id = $(this).data('id');
    var lembaga = $(this).data('lembaga');
    var nomor_statistik = $(this).data('nomor_statistik');
    var alamat = $(this).data('alamat');
    var nama_kepala = $(this).data('nama_kepala');
    var jumlah_murid = $(this).data('jumlah_murid');
    var jumlah_pengajar = $(this).data('jumlah_pengajar');

    $('#detailId').text(id);
    $('#detailLembaga').text(lembaga);
    $('#detailNomorStatistik').text(nomor_statistik);
    $('#detailAlamat').text(alamat);
    $('#detailNamaKepala').text(nama_kepala);
    $('#detailJumlahMurid').text(jumlah_murid);
    $('#detailJumlahPengajar').text(jumlah_pengajar);


    $('#detailModal').removeClass('hidden');
  });

  $('#detailModalClose').on('click', function() {
    $('#detailModal').addClass('hidden');
  });

});
</script>