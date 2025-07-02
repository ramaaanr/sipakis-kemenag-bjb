<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Edit Operator User</h2>
    <form id="editForm">
      <input type="hidden" name="id" id="editId">
      <input type="hidden" name="user_id" id="edit_user_id">
      <div class="mb-4">
        <label for="edit_user" class="block text-sm font-medium text-gray-700">Operator User</label>
        <input type="text" id="edit_user" name="edit_user" readonly
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>

      <div class="mb-4">
        <label for="edit_lembaga_pendidikan_id" class="block text-sm font-medium text-gray-700">Lembaga
          Pendidikan</label>
        <select id="edit_lembaga_pendidikan_id" name="lembaga_pendidikan_id" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">

        </select>
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
  populateSelect('/user-operator', '#edit_user')
  // Open Edit Modal and Populate Form Fields
  let id = 0;


  $('#table tbody').on('click', '.edit-btn', function() {
    id = $(this).data('id');
    var username = $(this).data('username');
    var lembaga_pendidikan = $(this).data('lembaga_pendidikan_id')
    var user_id = $(this).data('user_id')

    $('#editId').val(id);
    $('#edit_user').val(username);
    $('#edit_user_id').val(user_id);
    $('#edit_lembaga_pendidikan_id').val(lembaga_pendidikan);


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
      url: `/operator-lembaga-pendidikan/${id}`,
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