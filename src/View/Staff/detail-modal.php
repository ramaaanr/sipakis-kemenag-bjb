<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Detail Lembaga Pendidikan</h2>
    <div id="detailCard">
      <input type="hidden" name="id" id="detailId">

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama</label>
        <p id="detailNama" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Lembaga Pendidikan</label>
        <p id="detailLembagaPendidikan" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jabatan</label>
        <p id="detailJabatan" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <p id="detailAlamat" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">No HP</label>
        <p id="detailNoHp" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <p id="detailEmail" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <p id="detailJenisKelamin" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">NIK</label>
        <p id="detailNIK" class="mt-1 block text-gray-800"></p>
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
      var lembaga_pendidikan = $(this).data('lembaga_pendidikan')
      var jabatan = $(this).data('jabatan')
      var nama = $(this).data('nama')
      var alamat = $(this).data('alamat')
      var no_hp = $(this).data('no_hp')
      var email = $(this).data('email')
      var jenis_kelamin = $(this).data('jenis_kelamin')
      var nik = $(this).data('nik')
      $('#detailNama').text(nama)
      $('#detailLembagaPendidikan').text(lembaga_pendidikan)
      $('#detailJabatan').text(jabatan)
      $('#detailNama').text(nama)
      $('#detailAlamat').text(alamat)
      $('#detailNoHp').text(no_hp)
      $('#detailEmail').text(email)
      $('#detailJenisKelamin').text(jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan');
      $('#detailNIK').text(nik)



      $('#detailModal').removeClass('hidden');
    });

    $('#detailModalClose').on('click', function() {
      $('#detailModal').addClass('hidden');
    });

  });
</script>