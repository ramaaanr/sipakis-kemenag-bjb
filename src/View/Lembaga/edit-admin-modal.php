<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Edit Lembaga Pendidikan</h2>
    <form id="editForm">
      <input type="hidden" name="id" id="editId">
      <div class="mb-4">
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
        <input type="text" id="edit_nama" name="nama" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="kecamatan_id" class="block text-sm font-medium text-gray-700">Kecamatan
          Pendidikan</label>
        <select id="edit_kecamatan_id" name="kecamatan_id" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">

        </select>
      </div>

      <div class="mb-4">
        <label for="jenis_lembaga_pendidikan_id" class="block text-sm font-medium text-gray-700">Jenis Lembaga
          Pendidikan</label>
        <select id="edit_jenis_lembaga_pendidikan_id" name="jenis_lembaga_pendidikan_id" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">

        </select>
      </div>

      <div class="mb-4">
        <label for="nspp" class="block text-sm font-medium text-gray-700">NSPP</label>
        <input type="text" id="edit_nspp" name="nspp" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="npsn" class="block text-sm font-medium text-gray-700">NPSN</label>
        <input type="text" id="edit_npsn" name="npsn" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="jenjang" class="block text-sm font-medium text-gray-700">Jenjang</label>
        <input type="text" id="edit_jenjang" name="jenjang" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="alamat" class="block text-sm font-medium text-gray-700">alamat</label>
        <input type="text" id="edit_alamat" name="alamat" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
        <input type="text" id="edit_no_telepon" name="no_telepon" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="text" id="edit_email" name="email" required
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
  populateSelect('/kecamatan', '#edit_kecamatan_id');
  populateSelect('/jenis-lembaga-pendidikan', '#edit_jenis_lembaga_pendidikan_id');
  // Open Edit Modal and Populate Form Fields
  let id = 0;


  $('#table tbody').on('click', '.edit-btn', function() {
    id = $(this).data('id');
    var nama = $(this).data('nama');
    var kecamatan_id = $(this).data('kecamatan_id');
    var jenis_lembaga_pendidikan_id = $(this).data('jenis_lembaga_pendidikan_id');
    var nspp = $(this).data('nspp');
    var npsn = $(this).data('npsn');
    var jenjang = $(this).data('jenjang');
    var alamat = $(this).data('alamat');
    var no_telepon = $(this).data('no_telepon');
    var email = $(this).data('email');
    console.log(email);
    $('#edit_nama').val(nama);
    $('#edit_kecamatan_id').val(kecamatan_id);
    $('#edit_jenis_lembaga_pendidikan_id').val(jenis_lembaga_pendidikan_id);
    $('#edit_nspp').val(nspp);
    $('#edit_npsn').val(npsn);
    $('#edit_jenjang').val(jenjang);
    $('#edit_alamat').val(alamat);
    $('#edit_no_telepon').val(no_telepon);
    $('#edit_email').val(email);
    $('#editId').val(id);

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
      url: `/lembaga-pendidikan/${id}`,
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