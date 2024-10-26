<!-- Add Data Modal -->
<div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden ">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Tambah Data Lembaga Pontren</h2>
    <form id="addForm">
      <div class="mb-4">
        <label for="nspp" class="block text-sm font-medium text-gray-700">NSPP</label>
        <input type="text" id="nspp" name="nspp" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="npsn" class="block text-sm font-medium text-gray-700">NPSN</label>
        <input type="text" id="npsn" name="npsn"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="nama_lembaga" class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
        <input type="text" id="nama_lembaga" name="nama_lembaga" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="grup" class="block text-sm font-medium text-gray-700">Grup</label>
        <input type="text" id="grup" name="grup" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="jenjang" class="block text-sm font-medium text-gray-700">Jenjang</label>
        <input type="text" id="jenjang" name="jenjang" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="kecamatan_id" class="block text-sm font-medium text-gray-700">Kecamatan</label>
        <select id="kecamatan_id" name="kecamatan_id" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
          <option value="" disabled selected>Pilih Kecamatan</option>
          <option value="1">BANJARBARU SELATAN</option>
          <option value="2">LIANG ANGGANG</option>
          <option value="3">CEMPAKA</option>
          <option value="4">LANDASAN ULIN</option>
          <option value="5">BANJARBARU UTARA</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
        <input type="text" id="alamat" name="alamat" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="jumlah_santri_pria" class="block text-sm font-medium text-gray-700">Jumlah Santri Pria</label>
        <input type="number" id="jumlah_santri_pria" name="jumlah_santri_pria" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="jumlah_santri_wanita" class="block text-sm font-medium text-gray-700">Jumlah Santri Wanita</label>
        <input type="number" id="jumlah_santri_wanita" name="jumlah_santri_wanita" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="jumlah_keseluruhan" class="block text-sm font-medium text-gray-700">Jumlah Keseluruhan</label>
        <input type="number" id="jumlah_keseluruhan" name="jumlah_keseluruhan" required
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
    url: '/pontren/add',
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
        location.reload();
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