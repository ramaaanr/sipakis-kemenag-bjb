<!-- Add Staff Modal -->
<div id="addStaffModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Tambah Data Staff MDT</h2>
    <form id="addStaffForm">
      <!-- Lembaga Select Field -->
      <div class="mb-4">
        <label for="lembaga_id" class="block text-sm font-medium text-gray-700">Lembaga</label>
        <select id="lembaga_id" name="lembaga_id" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
          <!-- Options will be populated dynamically -->
        </select>
      </div>
      <div class="mb-4">
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" id="nama" name="nama" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
        <input type="text" id="nik" name="nik" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
        <input type="text" id="jabatan" name="jabatan" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
        <textarea id="alamat" name="alamat" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50"></textarea>
      </div>
      <div class="flex justify-end">
        <button type="button" id="addStaffModalClose" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tutup</button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">Tambah</button>
      </div>
    </form>
  </div>
</div>


<script>
// Fetch lembaga data and populate the select options
function fetchLembagaOptions() {
  $.ajax({
    url: '/mdt/getall', // Adjust path if necessary
    method: 'GET',
    success: function(data) {
      const select = $('#lembaga_id');
      select.empty(); // Clear existing options
      data.forEach(lembaga => {
        select.append(new Option(lembaga.lembaga, lembaga.id));
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

// Show Modal and Populate Lembaga Options
$('#btn-add').on('click', function() {
  fetchLembagaOptions(); // Load options when modal is shown
  $('#addStaffModal').removeClass('hidden');
});

// Close Modal
$('#addStaffModalClose').on('click', function() {
  $('#addStaffModal').addClass('hidden');
});

// AJAX Form Submission
$('#addStaffForm').on('submit', function(e) {
  e.preventDefault();

  $.ajax({
    url: '/staff_mdt/add',
    method: 'POST',
    data: $(this).serialize(),
    success: function(response) {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data staff berhasil ditambahkan!'
      }).then(() => {
        $('#addStaffModal').addClass('hidden'); // Close modal
        $('#addStaffForm')[0].reset(); // Reset form fields
        location.reload(); // Refresh the page to show updated data
      });
    },
    error: function() {
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Terjadi kesalahan saat menambahkan data staff!'
      });
    }
  });
});
</script>