<!-- Add Data Modal -->
<div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Tambah Kecamatan</h2>
    <form id="addForm">
      <div class="mb-4">
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kecamatan</label>
        <input type="text" id="nama" name="nama" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="flex justify-end">
        <button type="button" id="addModalClose" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tutup</button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">Tambah</button>
      </div>
    </form>
  </div>
</div>

<!-- Button to Open Modal -->
<!-- (Add a button to trigger the modal in your main HTML) -->

<script>
// Show Modal on Button Click
$('#btn-add').on('click', function() {
  $('#addModal').removeClass('hidden');
});

// Close Modal
$('#addModalClose').on('click', function() {
  $('#addModal').addClass('hidden');
});

// AJAX Form Submission
$('#addForm').on('submit', function(e) {
  e.preventDefault(); // Prevent default form submission

  $.ajax({
    url: '/kecamatan',
    method: 'POST',
    data: $(this).serialize(),
    success: function(response) {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        showCloseButton: true,
        text: 'Data berhasil ditambahkan!'
      }).then(() => {
        $('#addModal').addClass('hidden'); // Close modal
        $('#addForm')[0].reset(); // Reset form fields
        // Refresh the data table (use your specific table refresh function here)
        location.reload(); // Refresh the page to show the updated data
      });
    },
    error: function() {
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Terjadi kesalahan saat menambahkan data!'
      });
    }
  });
});
</script>