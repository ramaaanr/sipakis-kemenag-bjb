<?php include __DIR__ . '/../admin-templates/header.php'; ?>

<div class="container px-6 py-8 mx-auto ">
  <div class="flex items-center space-x-2 ">
    <h3 class="text-3xl font-medium text-gray-700">Data Lembaga MDT</h3>
    <a id="btn-cetak-mdt" target="__blank"
      class="cetak-container bg-blue-500 flex text-sm space-x-2 rounded-md px-2 py-1 h-fit text-white hover:blue-700"
      href="/mdt/cetak">
      <span class="material-symbols-outlined text-sm">
        print
      </span> <span>Cetak Semua Data</span>
    </a>
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
        <table id="lembagaTable" class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nama Lembaga
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                NSS
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Alamat
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nama Kepala
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jumlah Murid
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jumlah Pengajar
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
<?php include __DIR__ . '/edit-modal.php'; ?>
<?php include __DIR__ . '/detail-modal.php'; ?>

<script>
$(document).ready(function() {
  $('#lembagaTable').DataTable({
    ajax: {
      url: '/mdt/getall', // URL to fetch data from
      dataSrc: '' // Indicate that data is a flat array
    },
    columns: [{
        data: 'lembaga'
      },
      {
        data: 'nomor_statistik'
      },
      {
        data: 'alamat'
      },
      {
        data: 'nama_kepala'
      },
      {
        data: 'jumlah_murid'
      },
      {
        data: 'jumlah_pengajar'
      },
      {
        data: null,
        render: function(data, type, row) {
          return `
            <div class="flex space-x-1">
              <button class="detail-btn bg-green-500 text-white px-2 py-1 rounded" data-id="${row.id}"
data-lembaga="${row.lembaga}"
data-nomor_statistik="${row.nomor_statistik}"
data-alamat="${row.alamat}"
data-nama_kepala="${row.nama_kepala}"
data-jumlah_murid="${row.jumlah_murid}"
data-jumlah_pengajar="${row.jumlah_pengajar}">
                <span class="material-symbols-outlined">info</span>
              </button>
              <button class="edit-btn bg-blue-500 text-white px-2 py-1 rounded" data-id="${row.id}"
data-lembaga="${row.lembaga}"
data-nomor_statistik="${row.nomor_statistik}"
data-alamat="${row.alamat}"
data-nama_kepala="${row.nama_kepala}"
data-jumlah_murid="${row.jumlah_murid}"
data-jumlah_pengajar="${row.jumlah_pengajar}">
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

  $('#lembagaTable tbody').on('click', '.delete-btn', function() {
    var id = $(this).data('id');
    Swal.fire({
      title: 'Yakin ingin menghapus MDT ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '/mdt/delete/' + id, // Include id in the URL
          type: 'POST',
          success: function(response) {
            if (response.success) {
              $('#lembagaTable').DataTable().ajax.reload(); // Reload DataTable data
              Swal.fire('Deleted!', 'Lembaga berhasil dihapus.', 'success');
            } else {
              Swal.fire('Error', 'Terjadi kesalahan saat menghapus lembaga', 'error');
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