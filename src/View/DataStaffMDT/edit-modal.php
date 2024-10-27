<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Edit Staff MDT</h2>
    <form id="editForm">
      <input type="hidden" name="id" id="editId">

      <div class="mb-4">
        <label for="editNama" class="block text-sm font-medium text-gray-700">Nama Staff</label>
        <input type="text" id="editNama" name="nama" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="editLembagaId" class="block text-sm font-medium text-gray-700">Lembaga</label>
        <select id="editLembagaId" name="lembaga_id" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
          <!-- Options will be populated dynamically -->
        </select>
      </div>


      <div class="mb-4">
        <label for="editNIK" class="block text-sm font-medium text-gray-700">NIK</label>
        <input type="text" id="editNIK" name="nik" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="editJabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
        <input type="text" id="editJabatan" name="jabatan" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="editAlamat" class="block text-sm font-medium text-gray-700">Alamat</label>
        <input type="text" id="editAlamat" name="alamat" required
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
  // Fetch and populate lembaga options for the edit modal
  function fetchAndPopulateLembagaOptions(selectedId = null) {
    $.ajax({
      url: '/mdt/getall', // Adjust path if necessary
      method: 'GET',
      success: function(data) {
        const select = $('#editLembagaId');
        select.empty(); // Clear existing options
        data.forEach(lembaga => {
          const option = new Option(lembaga.lembaga, lembaga.id);
          if (lembaga.id == selectedId) {
            option.selected = true; // Preselect the current lembaga
          }
          select.append(option);
        });
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: 'Gagal Memuat',
          text: 'Tidak dapat memuat data lembaga'
        });
      }
    });
  }

  // Open Edit Modal and Populate Form Fields
  let id = 0;
  $('#staffTable tbody').on('click', '.edit-btn', function() {
    id = $(this).data('id');
    const nama = $(this).data('nama');
    const nik = $(this).data('nik');
    const jabatan = $(this).data('jabatan');
    const alamat = $(this).data('alamat');
    const lembagaId = $(this).data('lembaga'); // Add data attribute for lembaga ID in your HTML

    $('#editId').val(id);
    $('#editNama').val(nama);
    $('#editNIK').val(nik);
    $('#editJabatan').val(jabatan);
    $('#editAlamat').val(alamat);
    $('#editLembagaId').val(lembagaId);

    fetchAndPopulateLembagaOptions(lembagaId); // Load and preselect lembaga options

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
      url: `/staff_mdt/edit/${id}`,
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