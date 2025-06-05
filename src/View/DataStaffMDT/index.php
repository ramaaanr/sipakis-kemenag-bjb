<?php include __DIR__ . '/../admin-templates/header.php'; ?>

<div class="container px-6 py-8 mx-auto ">
  <div class="flex items-center space-x-2 ">
    <h3 class="text-3xl font-medium text-gray-700">Data Staff MDT</h3>
    <a id="btn-cetak-staff" target="__blank"
      class="cetak-container bg-blue-500 flex text-sm space-x-2 rounded-md px-2 py-1 h-fit text-white hover:blue-700"
      href="/staff_mdt/cetak">
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
  <div x-data="{ status: 'disetujui' }" class="flex space-x-2 mt-6">
    <!-- Tombol Disetujui -->
    <button id="btn-disetujui" @click="status = 'disetujui'"
      :class="status === 'disetujui' ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-800'"
      class="bg-lime-500 flex text-sm space-x-2 rounded-md px-2 py-1 h-fit text-white hover:lime-700 transition">
      Disetujui
    </button>
    <!-- Tombol Diproses -->
    <button id="btn-diproses" @click="status = 'diproses'"
      :class="status === 'diproses' ? 'bg-yellow-500 text-white' : 'bg-gray-300 text-gray-800'"
      class="bg-cyan-500 flex text-sm space-x-2 rounded-md px-2 py-1 h-fit text-white hover:cyan-700 transition">
      Diproses
    </button>
  </div>
  <div class="flex flex-col mt-8">
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
        <table id="staffTable" class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nama Staff
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Lembaga
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                NIK
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jabatan
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Alamat
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                status
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
  const role = "<?= $role ?>"

  function fetch(status = 'DISETUJUI') {
    if ($.fn.DataTable.isDataTable('#staffTable')) {
      $('#staffTable').DataTable().destroy(); // Hapus instance sebelumnya
    }
    $('#staffTable').DataTable({
      ajax: {
        url: `/staff_mdt/getall?status=${status}`, // URL to fetch data from
        dataSrc: '' // Indicate that data is a flat array
      },
      order: [
        [0, "desc"]
      ],
      columns: [{
          data: 'id',
          render: function(data, type, row) {
            return `<p class="hidden"> ${row.id} </p>`
          }
        }, {
          data: 'nama'
        },
        {
          data: 'lembaga'
        },
        {
          data: 'nik'
        },
        {
          data: 'jabatan'
        },
        {
          data: 'alamat'
        },
        {
          data: 'status',
          render: function(data, type, row) {
            let color = ''
            switch (data) {
              case 'DISETUJUI':
                color = 'lime';
                break;
              case 'DITOLAK':
                color = 'red';
                break;
              case 'DIPROSES':
                color = 'sky';
                break;
              default:
                break;
            }
            return `<a class="text-${color}-500 font-semibold">${data}</a>`;
          }
        },
        {
          data: null,
          render: function(data, type, row) {
            if (row.status == 'DISETUJUI') {
              return `
            <div class="flex space-x-1">
            <button class="edit-btn bg-blue-500 text-white px-2 py-1 rounded" 
                data-id="${row.id}" data-status="${row.status}" data-lembaga="${row.lembaga_id}" data-nama="${row.nama}" data-nik="${row.nik}"
                data-jabatan="${row.jabatan}" data-alamat="${row.alamat}">
                <span class="material-symbols-outlined">edit</span>
              </button>
              <button data-keterangan="${row.keterangan}" class="detail-btn bg-green-500 text-white px-2 py-1 rounded" 
                data-id="${row.id}" data-lembaga="${row.lembaga}" data-nama="${row.nama}" data-nik="${row.nik}"
                data-jabatan="${row.jabatan}" data-alamat="${row.alamat}">
                <span class="material-symbols-outlined">info</span>
              </button>
              
              <button class="delete-btn bg-red-500 text-white px-2 py-1 rounded" data-id="${row.id}">
                <span class="material-symbols-outlined">delete</span>
              </button>
            </div>`;
            }
            if (role == 'admin') {
              return `
            <div class="flex space-x-1">
              <button data-id="${row.id}" class = "disetujui-btn bg-lime-500 text-white px-2 py-1 rounded"><span class = "material-symbols-outlined"> check_circle </span></button>
                          <button data-id="${row.id}" class = "ditolak-btn bg-red-500 text-white px-2 py-1 rounded"><span class = "material-symbols-outlined">cancel</span></button>
                        
              <button data-keterangan="${row.keterangan}" class="detail-btn bg-green-500 text-white px-2 py-1 rounded" 
                data-id="${row.id}" data-lembaga="${row.lembaga}" data-nama="${row.nama}" data-nik="${row.nik}"
                data-jabatan="${row.jabatan}" data-alamat="${row.alamat}">
                <span class="material-symbols-outlined">info</span>
              </button>
              
            </div>`;
            }
            return `
            <div class="flex space-x-1">
              <button data-keterangan="${row.keterangan}" class="detail-btn bg-green-500 text-white px-2 py-1 rounded" 
                data-id="${row.id}" data-lembaga="${row.lembaga}" data-nama="${row.nama}" data-nik="${row.nik}"
                data-jabatan="${row.jabatan}" data-alamat="${row.alamat}">
                <span class="material-symbols-outlined">info</span>
              </button>
              <button class="edit-btn bg-blue-500 text-white px-2 py-1 rounded" 
                data-id="${row.id}" data-lembaga="${row.lembaga_id}" data-nama="${row.nama}" data-nik="${row.nik}"
                data-jabatan="${row.jabatan}" data-alamat="${row.alamat}">
                <span class="material-symbols-outlined">edit</span>
              </button>
              
            </div>`;
          }

        }
      ]
    });
  }
  fetch();
  $('#btn-disetujui').on('click', () => {
    fetch('DISETUJUI');
  })
  $('#btn-diproses').on('click', () => {
    fetch('DIPROSES');
  })

  function updateStatus(id, status, keterangan) {
    $.ajax({
      url: `/staff_mdt/update/${id}`,
      type: "POST",
      data: {
        id: id,
        status: status,
        keterangan: keterangan
      },
      success: function(response) {
        Swal.fire("Berhasil!", `Status berhasil diperbarui menjadi ${status}`, "success");
        fetch('DIPROSES'); // Reload DataTable
        $('#btn-diproses').trigger('click');
      },
      error: function() {
        Swal.fire("Gagal!", "Terjadi kesalahan, coba lagi.", "error");
      },
    });
  }

  $(document).on("click", ".disetujui-btn", function() {
    let id = $(this).data("id");

    Swal.fire({
      title: "Konfirmasi Persetujuan",
      text: "Masukkan keterangan (opsional)",
      input: "text",
      inputPlaceholder: "Keterangan (Opsional)",
      showCancelButton: true,
      confirmButtonText: "Setujui",
      cancelButtonText: "Batal",
      icon: "question",
      confirmButtonColor: "#4CAF50", // Warna hijau untuk "Setujui"
      cancelButtonColor: "#d33", // Warna merah untuk "Batal"
    }).then((result) => {
      if (result.isConfirmed) {
        let keterangan = result.value || "Disetujui tanpa keterangan";
        updateStatus(id, "DISETUJUI", keterangan);
      }
    });
  });

  // Event: Klik tombol "Ditolak"
  $(document).on("click", ".ditolak-btn", function() {
    let id = $(this).data("id");

    Swal.fire({
      title: "Konfirmasi Penolakan",
      text: "Masukkan alasan penolakan",
      input: "text",
      inputPlaceholder: "Alasan penolakan",
      showCancelButton: true,
      confirmButtonText: "Tolak",
      cancelButtonText: "Batal",
      icon: "warning",
    }).then((result) => {
      if (result.isConfirmed) {
        let keterangan = result.value || "Tidak ada alasan";
        updateStatus(id, "DITOLAK", keterangan);
      }
    });
  });
  $('#staffTable tbody').on('click', '.delete-btn', function() {
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
          url: '/staff_mdt/delete/' + id, // Include id in the URL
          type: 'POST',
          success: function(response) {
            if (response.success) {
              $('#staffTable').DataTable().ajax.reload(); // Reload DataTable data
              Swal.fire('Deleted!', 'Staff berhasil dihapus.', 'success');
            } else {
              Swal.fire('Error', 'Terjadi kesalahan saat menghapus staff', 'error');
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