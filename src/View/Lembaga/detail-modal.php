<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Detail Lembaga Pendidikan</h2>
    <div id="detailCard">
      <input type="hidden" name="id" id="detailId">

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
        <p id="detailNama" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Kecamatan</label>
        <p id="detailNamaKecamatan" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jenis Lembaga</label>
        <p id="detailJenisLembaga" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">NSPP</label>
        <p id="detailNSPP" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">NPSN</label>
        <p id="detailNPSN" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jenjang</label>
        <p id="detailJenjang" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <p id="detailAlamat" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">No Telepon</label>
        <p id="detailNoTelepon" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <p id="detailEmail" class="mt-1 block text-gray-800"></p>
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
  $('#table tbody').on('click', '.detail-btn', function() {

    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nama_kecamatan = $(this).data('nama_kecamatan');
    var jenis_lembaga = $(this).data('jenis_lembaga');
    var nama = $(this).data('nama');
    var nspp = $(this).data('nspp');
    var npsn = $(this).data('npsn');
    var jenjang = $(this).data('jenjang');
    var alamat = $(this).data('alamat');
    var no_telepon = $(this).data('no_telepon');
    var email = $(this).data('email');
    $('#detailNamaKecamatan').text(nama_kecamatan);
    $('#detailJenisLembaga').text(jenis_lembaga)
    $('#detailNama').text(nama)
    $('#detailNSPP').text(nspp)
    $('#detailNPSN').text(npsn)
    $('#detailJenjang').text(jenjang)
    $('#detailAlamat').text(alamat)
    $('#detailEmail').text(email)
    $('#detailNoTelepon').text(no_telepon)


    $('#detailModal').removeClass('hidden');
  });

  $('#detailModalClose').on('click', function() {
    $('#detailModal').addClass('hidden');
  });

});
</script>