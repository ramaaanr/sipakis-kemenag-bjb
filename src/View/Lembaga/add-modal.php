<!-- Add Data Modal -->
<div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Tambah Kecamatan</h2>
    <form id="addForm">

      <div class="mb-4">
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
        <input type="text" id="nama" name="nama" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="kecamatan_id" class="block text-sm font-medium text-gray-700">Kecamatan
          Pendidikan</label>
        <select id="kecamatan_id" name="kecamatan_id" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">

        </select>
      </div>

      <div class="mb-4">
        <label for="jenis_lembaga_pendidikan_id" class="block text-sm font-medium text-gray-700">Jenis Lembaga
          Pendidikan</label>
        <select id="jenis_lembaga_pendidikan_id" name="jenis_lembaga_pendidikan_id" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">

        </select>
      </div>

      <div class="mb-4">
        <label for="nspp" class="block text-sm font-medium text-gray-700">NSPP</label>
        <input type="text" id="nspp" name="nspp" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="npsn" class="block text-sm font-medium text-gray-700">NPSN</label>
        <input type="text" id="npsn" name="npsn" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="jenjang" class="block text-sm font-medium text-gray-700">Jenjang</label>
        <input type="text" id="jenjang" name="jenjang" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="alamat" class="block text-sm font-medium text-gray-700">alamat</label>
        <input type="text" id="alamat" name="alamat" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
        <input type="text" id="telepon" name="telepon" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="text" id="email" name="email" required
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
  function populateSelect(endpoint, selectId) {
    $.ajax({
      url: endpoint,
      method: 'GET',
      dataType: 'json',
      success: function(res) {
        const data = res.data;
        let select = $(selectId);
        select.empty(); // kosongkan dulu
        select.append('<option value="" disabled selected>Pilih data</option>');
        $.each(data, function(index, item) {
          select.append('<option value="' + item.id + '">' + item.nama + '</option>');
        });
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: 'Gagal Ambil Data',
          text: 'Tidak dapat mengambil data dari ' + endpoint,
          timer: 1500,
          showConfirmButton: false
        });
      }
    });
  }

  // Show Modal on Button Click
  $('#btn-add').on('click', function() {
    $('#addModal').removeClass('hidden');
    populateSelect('/kecamatan', '#kecamatan_id');
    populateSelect('/jenis-lembaga-pendidikan', '#jenis_lembaga_pendidikan_id');
  });

  // Close Modal
  $('#addModalClose').on('click', function() {
    $('#addModal').addClass('hidden');
  });


  // AJAX Form Submission
  $('#addForm').on('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    $.ajax({
      url: '/lembaga-pendidikan', // Adjust the URL to your endpoint
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