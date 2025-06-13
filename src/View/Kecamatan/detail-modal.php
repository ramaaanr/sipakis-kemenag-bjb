<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Detail Kecamatan</h2>
    <div id="detailCard">
      <input type="hidden" name="id" id="detailId">

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Kecamatan</label>
        <p id="detailNama" class="mt-1 block text-gray-800"></p>
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

    $('#detailNama').text(nama);


    $('#detailModal').removeClass('hidden');
  });

  $('#detailModalClose').on('click', function() {
    $('#detailModal').addClass('hidden');
  });

});
</script>