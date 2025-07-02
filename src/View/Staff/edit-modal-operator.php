<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Edit Lembaga Pendidikan</h2>
    <form id="editForm">
      <input type="hidden" name="id" id="editId">

      <div class="mb-4">
        <label for="edit_nama" class="block text-sm font-medium text-gray-700">Nama Staff</label>
        <input type="text" id="edit_nama" name="nama" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>


      <input type="hidden" id="edit_lembaga_pendidikan_id" name="lembaga_pendidikan_id" required />

      <div class="mb-4">
        <label for="edit_lembaga_pendidikan" class="block text-sm font-medium text-gray-700">Lembaga Pendidikan</label>
        <input type="text" id="edit_lembaga_pendidikan" name="lembaga_pendidikan" readonly
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="edit_jabatan_staff_id" class="block text-sm font-medium text-gray-700">Jabatan</label>
        <select id="edit_jabatan_staff_id" name="jabatan_staff_id" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">

        </select>
      </div>

      <div class="mb-4">
        <label for="edit_alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
        <input type="text" id="edit_alamat" name="alamat" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="edit_no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
        <input type="text" id="edit_no_hp" name="no_hp" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="text" id="edit_email" name="email" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="edit_jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <select id="edit_jenis_kelamin" name="jenis_kelamin" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
          <option value="" disabled selected>Pilih Jenis Kelamin</option>
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="edit_nik" class="block text-sm font-medium text-gray-700">NIK</label>
        <input type="text" id="edit_nik" name="nik" required
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
  populateSelect('/lembaga-pendidikan', '#edit_lembaga_pendidikan_id');
  populateSelect('/jabatan-staff', '#edit_jabatan_staff_id');
  // Open Edit Modal and Populate Form Fields
  let id = 0;


  $('#table tbody').on('click', '.edit-btn', function() {
    id = $(this).data('id');
    var nama = $(this).data('nama');
    var lembaga_pendidikan_id = $(this).data('lembaga_pendidikan_id')
    var lembaga_pendidikan = $(this).data('lembaga_pendidikan')
    var jabatan = $(this).data('jabatan_staff_id')
    var nama = $(this).data('nama')
    var alamat = $(this).data('alamat')
    var no_hp = $(this).data('no_hp')
    var email = $(this).data('email')
    var nik = $(this).data('nik')
    var jenis_kelamin = $(this).data('jenis_kelamin')
    $('#editId').val(id);
    $('#edit_nama').val(nama);
    $('#edit_lembaga_pendidikan_id').val(lembaga_pendidikan_id);
    $('#edit_lembaga_pendidikan').val(lembaga_pendidikan);
    $('#edit_jabatan_staff_id').val(jabatan);
    $('#edit_nama').val(nama);
    $('#edit_alamat').val(alamat);
    $('#edit_no_hp').val(no_hp);
    $('#edit_email').val(email);
    $('#edit_nik').val(nik);
    $('#edit_jenis_kelamin').val(jenis_kelamin);

    $('#editModal').removeClass('hidden');
  });
  console.log(id);

  // Close Edit Modal
  $('#editModalClose').on('click', function() {
    $('#editModal').addClass('hidden');
  });

  // AJAX Form Submission for Edit
  $('#editForm').on('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    $.ajax({
      url: `/staff/${id}`,
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