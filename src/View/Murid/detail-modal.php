<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Detail Lembaga Pendidikan</h2>
    <div id="detailCard">
      <input type="hidden" name="id" id="detailId">

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Lemnaga Pendidikan</label>
        <p id="detail_lembaga_pendidikan" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Murid</label>
        <p id="detail_nama" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <p id="detail_alamat" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Tempat, tanggal lahir</label>
        <p id="detail_tempat_tanggal_lahir" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Rombel Kelas</label>
        <p id="detail_rombel_kelas" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Tingkat</label>
        <p id="detail_tingkat" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">NISN</label>
        <p id="detail_nisn" class="mt-1 block text-gray-800"></p>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <p id="detail_jenis_kelamin" class="mt-1 block text-gray-800"></p>
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
    let lembaga_pendidikan = $(this).data('lembaga_pendidikan')
    let nama = $(this).data('nama')
    let alamat = $(this).data('alamat')
    let tempat_tanggal_lahir = $(this).data('tempat_tanggal_lahir')
    let rombel_kelas = $(this).data('rombel_kelas')
    let tingkat = $(this).data('tingkat')
    let nisn = $(this).data('nisn')
    let jenis_kelamin = $(this).data('jenis_kelamin')

    $('#detail_lembaga_pendidikan').text(lembaga_pendidikan)
    $('#detail_nama').text(nama)
    $('#detail_alamat').text(alamat)
    $('#detail_tempat_tanggal_lahir').text(tempat_tanggal_lahir)
    $('#detail_rombel_kelas').text(rombel_kelas)
    $('#detail_tingkat').text(tingkat)
    $('#detail_nisn').text(nisn)
    $('#detail_jenis_kelamin').text(jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan')

    $('#detailModal').removeClass('hidden');
  });

  $('#detailModalClose').on('click', function() {
    $('#detailModal').addClass('hidden');
  });

});
</script>