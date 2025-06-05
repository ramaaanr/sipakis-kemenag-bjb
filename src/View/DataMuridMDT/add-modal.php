<!-- Add Murid Modal -->
<div id="addMuridModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Tambah Data Murid MDT</h2>
    <form id="addMuridForm">
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
        <label for="ttl" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
        <input type="date" id="ttl" name="ttl" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
        <input type="text" id="nisn" name="nisn"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
          <option value="laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="mb-4">
        <label for="rombel_kelas" class="block text-sm font-medium text-gray-700">Rombel Kelas</label>
        <input type="text" id="rombel_kelas" name="rombel_kelas" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="tingkat" class="block text-sm font-medium text-gray-700">Tingkat</label>
        <input type="text" id="tingkat" name="tingkat" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="flex justify-end">
        <button type="button" id="addMuridModalClose" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tutup</button>
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
  $('#addMuridModal').removeClass('hidden');
});

// Close Modal
$('#addMuridModalClose').on('click', function() {
  $('#addMuridModal').addClass('hidden');
});

// AJAX Form Submission
$('#addMuridForm').on('submit', function(e) {
  e.preventDefault();

  $.ajax({
    url: '/murid_mdt/add',
    method: 'POST',
    data: $(this).serialize(),
    success: function(response) {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data murid berhasil ditambahkan!'
      }).then(() => {
        $('#addMuridModal').addClass('hidden'); // Close modal
        $('#addMuridForm')[0].reset(); // Reset form fields
        location.reload(); // Refresh the page to show updated data
      });
    },
    error: function() {
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Terjadi kesalahan saat menambahkan data murid!'
      });
    }
  });
});
</script>