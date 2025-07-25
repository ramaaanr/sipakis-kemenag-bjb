<?php include __DIR__ . '/../admin-templates/header.php'; ?>

<div class="container px-6 py-8 mx-auto ">
  <div class="flex items-center space-x-2 ">
    <h3 class="text-3xl font-medium text-gray-700">Data User</h3>

    <button id="btn-add"
      class="add-container bg-green-500 flex text-sm space-x-2 rounded-md px-2 py-1 h-fit text-white hover:green-700">
      <span class="material-symbols-outlined text-sm">
        add
      </span> <span>Tambah</span>
    </button>
  </div>

  <div class="flex flex-col mt-8">
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
        <table id="table" class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>

              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Username
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Role
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <!-- Data will be populated here by DataTable -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/add-modal.php'; ?>
<?php include __DIR__ . '/detail-modal.php'; ?>
<?php include __DIR__ . '/edit-modal.php'; ?>

<script>
$(document).ready(function() {

  function fetch(status = "DISETUJUI") {

    $('#table').DataTable({
      ajax: {
        url: `/user`, // URL to fetch data from
        dataSrc: 'data' // Indicate that data is a flat array
      },
      order: [
        [0, "desc"]
      ],
      columns: [{
          data: 'username'
        }, {
          data: 'role'
        },
        {
          data: null,
          render: function(data, type, row) {
            console.log(data.role);
            if (data.role === 'admin') {
              return ``;
            }
            return `
            <div class="flex space-x-1">
              <button class="detail-btn bg-green-500 text-white px-2 py-1 rounded" data-id="${row.id}"
data-username="${row.username}"
data-role="${row.role}">
                <span class="material-symbols-outlined">
info
</span>
              </button>
              <button class="edit-btn bg-blue-500 text-white px-2 py-1 rounded" data-id="${row.id}"
data-username="${row.username}"
data-role="${row.role}">
                <span class="material-symbols-outlined">
edit
</span>
              </button>
              <button class="delete-btn bg-red-500 text-white px-2 py-1 rounded" data-id="${row.id}">
                <span class="material-symbols-outlined">delete</span>
              </button>
            </div>`;
          }
        }
      ]
    });
  }
  fetch();


  $('#table tbody').on('click', '.delete-btn', function() {
    var id = $(this).data('id');
    Swal.fire({
      title: 'Yakin ingin menghapus User ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '/user/' + id, // Include id in the URL
          type: 'DELETE',
          success: function(res) {
            const response = JSON.parse(res);
            if (response.status) {
              $('#table').DataTable().ajax.reload(); // Reload DataTable data
              Swal.fire('Deleted!', 'Kecamatan berhasil dihapus.', 'success');
            } else {
              Swal.fire('Error', 'Terjadi kesalahan saat menghapus Kecamatan', 'error');
            }
          },
          error: function() {
            Swal.fire('Error', 'Gagal menghubungi server', 'error');
          }
        });
      }
    });
  });
});
</script>

<?php include __DIR__ . '/../admin-templates/footer.php'; ?>