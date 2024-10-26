<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Edit Lembaga Pontren</h2>
    <form id="editForm">
      <input type="hidden" name="id" id="editId">

      <div class="mb-4">
        <label for="editLembaga" class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
        <input type="text" id="editLembaga" name="lembaga" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="editNomorStatistik" class="block text-sm font-medium text-gray-700">Nomor Statistik (NSPP)</label>
        <input type="text" id="editNomorStatistik" name="nomor_statistik" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="editAlamat" class="block text-sm font-medium text-gray-700">Alamat</label>
        <input type="text" id="editAlamat" name="alamat" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="editNamaKepala" class="block text-sm font-medium text-gray-700">Nama Kepala</label>
        <input type="text" id="editNamaKepala" name="nama_kepala" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="editJumlahMurid" class="block text-sm font-medium text-gray-700">Jumlah Murid</label>
        <input type="number" id="editJumlahMurid" name="jumlah_murid" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="editJumlahPengajar" class="block text-sm font-medium text-gray-700">Jumlah Pengajar</label>
        <input type="number" id="editJumlahPengajar" name="jumlah_pengajar" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="flex justify-end">
        <button type="button" id="editModalClose" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tutup</button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  // Open Edit Modal and Populate Form Fields
  let id = 0;
  $('#lembagaTable tbody').on('click', '.edit-btn', function() {
    id = $(this).data('id');
    var lembaga = $(this).data('lembaga');
    var nomor_statistik = $(this).data('nomor_statistik');
    var alamat = $(this).data('alamat');
    var nama_kepala = $(this).data('nama_kepala');
    var jumlah_murid = $(this).data('jumlah_murid');
    var jumlah_pengajar = $(this).data('jumlah_pengajar');

    $('#editId').val(id);
    $('#editLembaga').val(lembaga);
    $('#editNomorStatistik').val(nomor_statistik);
    $('#editAlamat').val(alamat);
    $('#editNamaKepala').val(nama_kepala);
    $('#editJumlahMurid').val(jumlah_murid);
    $('#editJumlahPengajar').val(jumlah_pengajar);

    $('#editModal').removeClass('hidden');
  });

  // Close Edit Modal
  $('#editModalClose').on('click', function() {
    $('#editModal').addClass('hidden');
  });

  // AJAX Form Submission for Edit
  $('#editForm').on('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    $.ajax({
      url: `/mdt/edit/${id}`,
      method: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: 'Data berhasil diperbarui!',
          showCloseButton: true
        }).then(() => {
          $('#editModal').addClass('hidden'); // Close modal
          $('#editForm')[0].reset(); // Reset form fields
          // Refresh the data table (use your specific table refresh function here)
          location.reload();
        });
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Terjadi kesalahan saat memperbarui data!'
        });
      }
    });
  });
});
</script>