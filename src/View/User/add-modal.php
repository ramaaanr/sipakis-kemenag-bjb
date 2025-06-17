<!-- Add Data Modal -->
<div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
  <div class="relative top-20 mx-auto p-5 border w-1/3 shadow-lg rounded-md bg-white">
    <h2 class="text-xl font-bold mb-4">Tambah User</h2>
    <form id="addForm">
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" id="username" name="username" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
      </div>
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
        <p id="passwordError" class="text-red-500 text-sm mt-1 hidden"></p>
      </div>

      <div class="mb-4">
        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
        <select id="role" name="role" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
          <option value="">-- Pilih Role --</option>
          <option value="admin">Admin</option>
          <option value="staff">Staff</option>
          <option value="operator">Operator</option>
          <option value="pimpinan">Pimpinan</option>
        </select>
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
  $('#password').on('input', function() {
    const password = $(this).val();
    const errorMessage = validatePassword(password);

    if (errorMessage) {
      $('#passwordError').text(errorMessage).removeClass('hidden');
    } else {
      $('#passwordError').text('').addClass('hidden');
    }
  });

  // Show Modal on Button Click
  $('#btn-add').on('click', function() {
    $('#addModal').removeClass('hidden');
  });

  // Close Modal
  $('#addModalClose').on('click', function() {
    $('#addModal').addClass('hidden');
  });

  $('#addForm').on('submit', function(e) {
    e.preventDefault();

    const password = $('#password').val();
    const errorMessage = validatePassword(password);

    if (errorMessage) {
      $('#passwordError').text(errorMessage).removeClass('hidden');
      return; // Stop the submit
    }

    $.ajax({
      url: '/user',
      method: 'POST',
      data: $(this).serialize(),
      success: function(res) {
        const response = JSON.parse(res);
        if (response.status) {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            showCloseButton: true,
            text: 'Data berhasil ditambahkan!'
          }).then(() => {
            $('#addModal').addClass('hidden');
            $('#addForm')[0].reset();
            location.reload();
          });
          return;
        }
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Terjadi kesalahan saat menambahkan data! ' + (response.message || '')
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