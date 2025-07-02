<?php include __DIR__ . '/../admin-templates/header.php'; ?>

<div class="container px-6 py-8 mx-auto ">
  <div class="flex items-center space-x-2 ">
    <h3 class="text-3xl font-medium text-gray-700">Data Lembaga Pendidikan</h3>

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
                Nama Lembaga Pendidikan
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Kecamatan
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jenis
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                NSPP
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                NPSN
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jenjang
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Alamat
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Telepon
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                email
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

<?php include __DIR__ . '/add-modal.php'; ?>
<?php include __DIR__ . '/detail-modal.php'; ?>
<?php include __DIR__ . '/edit-modal.php'; ?>
<script>
$(document).ready(function() {
  let lembagaPendidikanId = null;
  const USER_ID = <?= json_encode($id ?? null) ?>;

  function getLembagaPendidikanIdAndFetch() {
    if (!USER_ID) {
      console.error("User ID tidak ditemukan");
      return;
    }

    $.ajax({
      url: `/operator-lembaga-pendidikan?user_id=${USER_ID}`,
      method: 'GET',
      success: function(response) {
        const res = typeof response === 'string' ? JSON.parse(response) : response;
        if (res.status && res.data && res.data.lembaga_pendidikan_id) {
          lembagaPendidikanId = res.data.lembaga_pendidikan_id;
          fetchDataLembaga(lembagaPendidikanId);
        } else {
          Swal.fire('Gagal', 'Data lembaga pendidikan tidak ditemukan!', 'error');
        }
      },
      error: function() {
        Swal.fire('Error', 'Gagal mengambil data lembaga pendidikan', 'error');
      }
    });
  }

  function fetchDataLembaga(lembagaId) {
    $('#table').DataTable({
      destroy: true,
      ajax: {
        url: `/lembaga-pendidikan/${lembagaId}`,
        dataSrc: 'data'
      },
      order: [
        [0, "desc"]
      ],
      columns: [{
          data: 'nama'
        },
        {
          data: 'nama_kecamatan'
        },
        {
          data: 'jenis_lembaga'
        },
        {
          data: 'nspp'
        },
        {
          data: 'npsn'
        },
        {
          data: 'jenjang'
        },
        {
          data: 'alamat'
        },
        {
          data: 'no_telepon'
        },
        {
          data: 'email'
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
            <div class="flex space-x-1">
              <button class="detail-btn bg-green-500 text-white px-2 py-1 rounded" data-id="${row.id}"
data-nama_kecamatan="${row.nama_kecamatan}"
data-jenis_lembaga="${row.jenis_lembaga}"
data-nama="${row.nama}"
data-nspp="${row.nspp}"
data-npsn="${row.npsn}"
data-jenjang="${row.jenjang}"
data-alamat="${row.alamat}"
data-email="${row.email}"
data-no_telepon="${row.no_telepon}">
                <span class="material-symbols-outlined">info</span>
              </button>
              <button class="edit-btn bg-blue-500 text-white px-2 py-1 rounded" data-id="${row.id}"
data-kecamatan_id="${row.kecamatan_id}"
data-jenis_lembaga_pendidikan_id="${row.jenis_lembaga_pendidikan_id}"
data-nama="${row.nama}"
data-nspp="${row.nspp}"
data-npsn="${row.npsn}"
data-jenjang="${row.jenjang}"
data-alamat="${row.alamat}"
data-email="${row.email}"
data-no_telepon="${row.no_telepon}">
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

  getLembagaPendidikanIdAndFetch();

  $('#table tbody').on('click', '.delete-btn', function() {
    const id = $(this).data('id');
    Swal.fire({
      title: 'Yakin ingin menghapus Lembaga Pendidikan ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '/lembaga-pendidikan/' + id,
          type: 'DELETE',
          success: function(res) {
            const response = typeof res === 'string' ? JSON.parse(res) : res;
            if (response.status) {
              $('#table').DataTable().ajax.reload();
              Swal.fire('Deleted!', 'Lembaga Pendidikan berhasil dihapus.', 'success');
            } else {
              Swal.fire('Error', 'Terjadi kesalahan saat menghapus', 'error');
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