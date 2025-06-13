<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Edit Data Kecamatan</h2>
    <form id="editForm">
      <input type="hidden" name="id" id="editId">

      <div class="mb-4">
        <label for="editNama" class="block text-sm font-medium text-gray-700">Nama KEcamatan</label>
        <input type="text" id="editNama" name="nama" required
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


  $('#table tbody').on('click', '.edit-btn', function() {
    id = $(this).data('id');
    var nama = $(this).data('nama');

    $('#editId').val(id);
    $('#editNama').val(nama);

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
      url: `/kecamatan/${id}`,
      method: 'POST',
      data: $(this).serialize(),
      success: function(res) {
        const response = JSON.parse(res);
        if (!response.status) {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: response.message || 'Terjadi kesalahan saat memperbarui data!'
          });
          return;
        }
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