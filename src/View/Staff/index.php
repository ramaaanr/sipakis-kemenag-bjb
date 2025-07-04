<?php include __DIR__ . '/../admin-templates/header.php'; ?>

<div class="container px-6 py-8 mx-auto ">
  <div class="flex items-center space-x-2 ">
    <h3 class="text-3xl font-medium text-gray-700">Data Staff</h3>
    <?php if ($role === 'operator') { ?>
      <button id="btn-add"
        class="add-container bg-green-500 flex text-sm space-x-2 rounded-md px-2 py-1 h-fit text-white hover:green-700">
        <span class="material-symbols-outlined text-sm">
          add
        </span> <span>Tambah</span>
      </button>
    <?php } ?>

  </div>
  <div class="flex flex-col mt-8">
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
        <table id="table" class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>

              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nama Staff
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Lembaga Pendidikan
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jabatan
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                NIK
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Alamat
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                No HP
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Email
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jenis Kelamin
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
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

<?php include __DIR__ . '/add-modal-operator.php'; ?>
<?php include __DIR__ . '/edit-modal-operator.php'; ?>
<?php include __DIR__ . '/detail-modal.php'; ?>

<script>
  $(document).ready(function() {
    const USER_ID = <?= json_encode($id ?? null) ?>;
    let lembagaPendidikanId = null;

    function fetchStaff(lembagaId) {
      $('#table').DataTable({
        destroy: true,
        ajax: {
          url: `/staff${lembagaId ? `?lembaga_pendidikan_id=${lembagaId}` : ''}`,
          dataSrc: 'data'
        },
        order: [
          [0, "desc"]
        ],
        columns: [{
            data: 'nama'
          },
          {
            data: 'lembaga_pendidikan'
          },
          {
            data: 'jabatan'
          },
          {
            data: 'nik'
          },
          {
            data: 'alamat'
          },
          {
            data: 'no_hp'
          },
          {
            data: 'email'
          },
          {
            data: 'jenis_kelamin',
            render: function(data) {
              return data === 'L' ? 'Laki-laki' : 'Perempuan';
            }
          },
          {
            data: null,
            render: function(data, type, row) {
              return `
          <div class="flex space-x-1">
            <button class="detail-btn bg-green-500 text-white px-2 py-1 rounded" data-id="${row.id}"
              data-lembaga_pendidikan="${row.lembaga_pendidikan}"
              data-jabatan="${row.jabatan}"
              data-nama="${row.nama}"
              data-alamat="${row.alamat}"
              data-no_hp="${row.no_hp}"
              data-email="${row.email}"
              data-jenis_kelamin="${row.jenis_kelamin}"
              data-nik="${row.nik}">
              <span class="material-symbols-outlined">info</span>
            </button>
            <button class="edit-btn bg-blue-500 text-white px-2 py-1 rounded" data-id="${row.id}"
              data-lembaga_pendidikan_id="${row.lembaga_pendidikan_id}"
              data-lembaga_pendidikan="${row.lembaga_pendidikan}"
              data-jabatan_staff_id="${row.jabatan_staff_id}"
              data-nama="${row.nama}"
              data-alamat="${row.alamat}"
              data-no_hp="${row.no_hp}"
              data-email="${row.email}"
              data-jenis_kelamin="${row.jenis_kelamin}"
              data-nik="${row.nik}">
              <span class="material-symbols-outlined">edit</span>
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

    const ROLE = <?= json_encode($role ?? null) ?>;

    function getLembagaPendidikanIdAndFetchStaff() {
      if (!USER_ID) {
        console.error("User ID tidak ditemukan");
        return;
      }

      if (ROLE === 'admin') {
        fetchStaff(null); // Ambil semua data
      } else {
        $.ajax({
          url: `/operator-lembaga-pendidikan?user_id=${USER_ID}`,
          method: 'GET',
          success: function(response) {
            try {
              const res = typeof response === 'string' ? JSON.parse(response) : response;
              if (res.status && res.data && res.data.lembaga_pendidikan_id) {
                lembagaPendidikanId = res.data.lembaga_pendidikan_id;
                const lembagaPendidikan = res.data.lembaga_pendidikan;
                $('#lembaga_pendidikan_id').val(lembagaPendidikanId);
                $('#lembaga_pendidikan').val(lembagaPendidikan);
                fetchStaff(lembagaPendidikanId);
              } else {
                Swal.fire('Gagal', 'Data lembaga pendidikan tidak ditemukan!', 'error');
              }
            } catch (e) {
              Swal.fire('Error', 'Respon tidak valid dari server', 'error');
            }
          },
          error: function() {
            Swal.fire('Error', 'Gagal mengambil data lembaga pendidikan', 'error');
          }
        });
      }
    }


    getLembagaPendidikanIdAndFetchStaff();

    $('#table tbody').on('click', '.delete-btn', function() {
      var id = $(this).data('id');
      Swal.fire({
        title: 'Yakin ingin menghapus Staff ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '/staff/' + id, // Include id in the URL
            type: 'DELETE',
            success: function(res) {
              const response = JSON.parse(res);
              if (response.status) {
                $('#table').DataTable().ajax.reload(); // Reload DataTable data
                Swal.fire('Deleted!', 'Staff berhasil dihapus.', 'success');
              } else {
                Swal.fire('Error', 'Terjadi kesalahan saat menghapus Staff', 'error');
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