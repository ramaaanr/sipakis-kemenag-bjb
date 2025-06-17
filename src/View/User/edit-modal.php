<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Edit User</h2>
    <form id="editForm">
      <input type="hidden" name="id" id="editId">

      <div class="mb-4">
        <label for="editUsername" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" id="editUsername" name="username" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="editPassword" class="block text-sm font-medium text-gray-700">Password (jangan diisi jika tidak
          diubah)</label>
        <input type="password" id="editPassword" name="password"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
        <p id="editPasswordError" class="text-red-500 text-sm mt-1 hidden"></p>

      </div>

      <div class="mb-4">
        <label for="editRole" class="block text-sm font-medium text-gray-700">Role</label>
        <select id="editRole" name="role" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
          <option value="">-- Pilih Role --</option>
          <option value="admin">Admin</option>
          <option value="staff">Staff</option>
          <option value="operator">Operator</option>
          <option value="pimpinan">Pimpinan</option>
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
    function validatePassword(password) {
      if (password.length < 6) {
        return "Password minimal 6 karakter.";
      }
      if (!/[a-zA-Z]/.test(password) || !/\d/.test(password)) {
        return "Password harus mengandung huruf dan angka.";
      }
      return "";
    }

    // Realtime validation
    $('#editPassword').on('input', function() {
      const password = $(this).val();
      const errorMessage = validatePassword(password);

      if (errorMessage) {
        $('#editPasswordError').text(errorMessage).removeClass('hidden');
      } else {
        $('#editPasswordError').text('').addClass('hidden');
      }
    });

    // Open Edit Modal and Populate Form Fields
    let id = 0;


    $('#table tbody').on('click', '.edit-btn', function() {
      id = $(this).data('id');
      var username = $(this).data('username');
      var role = $(this).data('role');

      $('#editId').val(id);
      $('#editUsername').val(username);
      $('#editRole').val(role);

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
        url: `/user/${id}`,
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