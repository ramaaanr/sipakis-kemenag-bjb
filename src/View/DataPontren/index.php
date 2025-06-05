<?php include __DIR__ . '/../admin-templates/header.php'; ?>

<div class="container px-6 py-8 mx-auto ">
  <div class="flex items-center space-x-2 ">
    <h3 class="text-3xl font-medium text-gray-700">Data Lembaga Pontren</h3>
    <a id="btn-cetak-pontren" target="__blank"
      class="cetak-container bg-blue-500 flex text-sm space-x-2 rounded-md px-2 py-1 h-fit text-white hover:blue-700"
      href="/pontren/cetak">
      <span class="material-symbols-outlined text-sm">
        print
      </span> <span>Cetak Semua Data</span>
    </a><button id="btn-cetak-pontren-kec"
      class="cetak-container bg-blue-500 flex text-sm space-x-2 rounded-md px-2 py-1 h-fit text-white hover:blue-700"><span
        class="material-symbols-outlined text-sm">
        print
      </span> <span>Cetak Data Kecamatan</span>
    </button>
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
  <div class="flex flex-col mt-2">
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
        <table id="lembagaTable" class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nama Lembaga
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Kecamatan
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Alamat
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Grup
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jenjang
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jumlah Murid Pria
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jumlah Murid Wanita
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jumlah Murid Keseluruhan
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
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

  function fetch(status = "DISETUJUI") {
    if ($.fn.DataTable.isDataTable('#lembagaTable')) {
      $('#lembagaTable').DataTable().destroy(); // Hapus instance sebelumnya
    }
    $('#lembagaTable').DataTable({
      ajax: {
        url: `/pontren/getall?status=${status}`, // URL to fetch data from
        dataSrc: function(json) {
          console.log('test');
          console.log("Data fetched: ", json); // Debugging
          return json;
        } // Indicate that data is a flat array
      },
      columns: [{
          data: 'id',
          render: function(data, type, row) {
            return `<p class="hidden"> ${row.id} </p>`
          }

        },
        {
          data: 'nama_lembaga',
        },
        {
          data: 'nama_kecamatan'
        },
        {
          data: 'alamat'
        },
        {
          data: 'grup'
        },
        {
          data: 'jenjang'
        },
        {
          data: 'jumlah_santri_pria'
        },
        {
          data: 'jumlah_santri_wanita'
        },
        {
          data: 'jumlah_keseluruhan'
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
data-id="${row.id}"
data-status="${row.status}"
data-nspp="${row.nspp}"
data-npsn="${row.npsn}"
data-nama_lembaga="${row.nama_lembaga}"
data-grup="${row.grup}"
data-jenjang="${row.jenjang}"
data-kecamatan_id="${row.kecamatan_id}"
data-nama_kecamatan="${row.nama_kecamatan}"
data-alamat="${row.alamat}"
data-jumlah_santri_pria="${row.jumlah_santri_pria}"
data-jumlah_santri_wanita="${row.jumlah_santri_wanita}"
data-jumlah_keseluruhan="${row.jumlah_keseluruhan}"
    >
    <span class="material-symbols-outlined">edit</span>
</button>
                         <button class="delete-btn bg-red-500 text-white px-2 py-1 rounded" data-id="${row.id}"><span class="material-symbols-outlined">
delete
</span></button>
                        <button class="detail-btn bg-green-500 text-white px-2 py-1 rounded"
data-id="${row.id}"
data-nspp="${row.nspp}"
data-npsn="${row.npsn}"
data-nama_lembaga="${row.nama_lembaga}"
data-grup="${row.grup}"
data-keterangan="${row.keterangan}"

data-jenjang="${row.jenjang}"
data-kecamatan_id="${row.kecamatan_id}"
data-nama_kecamatan="${row.nama_kecamatan}"
data-alamat="${row.alamat}"
data-jumlah_santri_pria="${row.jumlah_santri_pria}"
data-jumlah_santri_wanita="${row.jumlah_santri_wanita}"
data-jumlah_keseluruhan="${row.jumlah_keseluruhan}"
    >
    <span class="material-symbols-outlined">info</span>
</button>
                   </div> `;
            }

            if (role == 'admin') {

              return `
                        <div class="flex space-x-1">
                          <button data-id="${row.id}" class = "disetujui-btn bg-lime-500 text-white px-2 py-1 rounded"><span class = "material-symbols-outlined"> check_circle </span></button>
                          <button data-id="${row.id}" class = "ditolak-btn bg-red-500 text-white px-2 py-1 rounded"><span class = "material-symbols-outlined">cancel</span></button>
                        <button class="detail-btn bg-green-500 text-white px-2 py-1 rounded"
data-id="${row.id}"
data-nspp="${row.nspp}"
data-npsn="${row.npsn}"
data-nama_lembaga="${row.nama_lembaga}"
data-grup="${row.grup}"
data-keterangan="${row.keterangan}"
data-jenjang="${row.jenjang}"
data-kecamatan_id="${row.kecamatan_id}"
data-nama_kecamatan="${row.nama_kecamatan}"
data-alamat="${row.alamat}"
data-jumlah_santri_pria="${row.jumlah_santri_pria}"
data-jumlah_santri_wanita="${row.jumlah_santri_wanita}"
data-jumlah_keseluruhan="${row.jumlah_keseluruhan}"
    >
    <span class="material-symbols-outlined">info</span>
</button>
                   </div> `;

            }

            return `
                        <div class="flex space-x-1">
                        <button class="detail-btn bg-green-500 text-white px-2 py-1 rounded"
data-id="${row.id}"
data-nspp="${row.nspp}"
data-npsn="${row.npsn}"
data-nama_lembaga="${row.nama_lembaga}"
data-grup="${row.grup}"
data-jenjang="${row.jenjang}"
data-kecamatan_id="${row.kecamatan_id}"
data-nama_kecamatan="${row.nama_kecamatan}"
data-alamat="${row.alamat}"
data-jumlah_santri_pria="${row.jumlah_santri_pria}"
data-jumlah_santri_wanita="${row.jumlah_santri_wanita}"
data-jumlah_keseluruhan="${row.jumlah_keseluruhan}"
    >
    <span class="material-symbols-outlined">info</span>
</button>
                        <button class="edit-btn bg-blue-500 text-white px-2 py-1 rounded"
data-id="${row.id}"
data-nspp="${row.nspp}"
data-npsn="${row.npsn}"
data-nama_lembaga="${row.nama_lembaga}"
data-grup="${row.grup}"
data-jenjang="${row.jenjang}"
data-kecamatan_id="${row.kecamatan_id}"
data-nama_kecamatan="${row.nama_kecamatan}"
data-alamat="${row.alamat}"
data-jumlah_santri_pria="${row.jumlah_santri_pria}"
data-jumlah_santri_wanita="${row.jumlah_santri_wanita}"
data-jumlah_keseluruhan="${row.jumlah_keseluruhan}"
    >
    <span class="material-symbols-outlined">edit</span>
</button>


                        
                   </div> `;
          }
        }

      ],
      order: [
        [0, "desc"]
      ],
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
      url: `/pontren/update/${id}`,
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

  // Event: Klik tombol "Disetujui"
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

  function formatPrice(price) {
    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  }

  function formatDateTime(dateTimeStr) {
    const options = {
      year: 'numeric',
      month: 'long',
      day: 'numeric',
      hour: '2-digit',
      minute: '2-digit'
    };
    const date = new Date(dateTimeStr);
    return date.toLocaleDateString('id-ID', options).replace(' at ', ' Jam ');
  }




  // Event delegation for edit button
  $('#lembagaTable tbody').on('click', '.edit-btn', function() {

    var id = $(this).data('id');
    var nspp = $(this).data('nspp');
    var npsn = $(this).data('npsn');
    var nama_lembaga = $(this).data('nama_lembaga');
    var grup = $(this).data('grup');
    var jenjang = $(this).data('jenjang');
    var kecamatan_id = $(this).data('kecamatan_id');
    var nama_kecamatan = $(this).data('nama_kecamatan');
    var alamat = $(this).data('alamat');
    var status = $(this).data('status');
    var jumlah_santri_pria = $(this).data('jumlah_santri_pria');
    var jumlah_santri_wanita = $(this).data('jumlah_santri_wanita');
    var jumlah_keseluruhan = $(this).data('jumlah_keseluruhan');

    $('#editId').val(id);
    $('#editNspp').val(nspp);
    $('#editStatus').val(status);
    $('#editNamaLembaga').val(nama_lembaga);
    $('#editGrup').val(grup);
    $('#editJenjang').val(jenjang);
    $('#editKecamatanId').val(kecamatan_id);
    $('#editNamaKecamatan').val(nama_kecamatan);
    $('#editAlamat').val(alamat);
    $('#editJumlahSantriPria').val(jumlah_santri_pria);
    $('#editJumlahSantriWanita').val(jumlah_santri_wanita);
    $('#editJumlahKeseluruhan').val(jumlah_keseluruhan);

    $('#editModal').removeClass('hidden');
  });

  $('#lembagaTable tbody').on('click', '.detail-btn', function() {

    var id = $(this).data('id');
    var keterangan = $(this).data('keterangan');
    var nspp = $(this).data('nspp');
    var npsn = $(this).data('npsn');
    var nama_lembaga = $(this).data('nama_lembaga');
    var grup = $(this).data('grup');
    var jenjang = $(this).data('jenjang');
    var kecamatan_id = $(this).data('kecamatan_id');
    var nama_kecamatan = $(this).data('nama_kecamatan');
    var alamat = $(this).data('alamat');
    var jumlah_santri_pria = $(this).data('jumlah_santri_pria');
    var jumlah_santri_wanita = $(this).data('jumlah_santri_wanita');
    var jumlah_keseluruhan = $(this).data('jumlah_keseluruhan');

    $('#detailId').text(id);
    $('#detailNspp').text(nspp);
    $('#detailNpsn').text(npsn);
    $('#detailNamaLembaga').text(nama_lembaga);
    $('#detailGrup').text(grup);
    $('#detailJenjang').text(jenjang);
    $('#detailKecamatanId').text(kecamatan_id);
    $('#detailNamaKecamatan').text(nama_kecamatan);
    $('#detailAlamat').text(alamat);
    $('#detailKeterangan').text(keterangan);
    $('#detailJumlahSantriPria').text(jumlah_santri_pria);
    $('#detailJumlahSantriWanita').text(jumlah_santri_wanita);
    $('#detailJumlahKeseluruhan').text(jumlah_keseluruhan);

    $('#detailModal').removeClass('hidden');
  });

  $('#detailModalClose').on('click', function() {
    $('#detailModal').addClass('hidden');
  });

  // Event handler for modal close button
  $('#editModalClose').on('click', function() {
    $('#editModal').addClass('hidden');
  });

  // Handle form submission for editing lembaga
  $('#editForm').submit(function(e) {
    e.preventDefault();

    var id = $('#editForm').find('input[name="id"]').val(); // Get the ID from a hidden input
    var formData = $(this).serialize(); // Serialize the form data

    $.post(`/pontren/edit/${id}`, formData, function(response) {
      if (response.success) {
        $('#editModal').addClass('hidden');
        $('#lembagaTable').DataTable().ajax.reload(); // Reload DataTable data
        Swal.fire('Success', 'Lembaga berhasil diubah', 'success');
      } else {
        Swal.fire('Error', 'Terjadi kesalahan saat mengubah lembaga', 'error');
      }
    });
  });
  // JavaScript to show SweetAlert with kecamatan selection and redirection
  $('#btn-cetak-pontren-kec').click(function() {
    Swal.fire({
      title: 'Pilih Kecamatan',
      input: 'select',
      inputOptions: {
        '1': 'BANJARBARU SELATAN',
        '2': 'LIANG ANGGANG',
        '3': 'CEMPAKA',
        '4': 'LANDASAN ULIN',
        '5': 'BANJARBARU UTARA'
      },
      inputPlaceholder: 'Pilih kecamatan',
      showCancelButton: true,
      confirmButtonText: 'Cetak',
      cancelButtonText: 'Batal',
      customClass: {
        confirmButton: 'bg-green-500', // Apply 'btn-confirm' class to confirm button
        cancelButton: 'bg-red-500' // Apply 'btn-cancel' class to cancel button
      },
      inputValidator: (value) => {
        return new Promise((resolve) => {
          if (value) {
            resolve();
          } else {
            resolve('Anda harus memilih kecamatan!');
          }
        });
      }
    }).then((result) => {
      if (result.isConfirmed) {
        // Redirect to the print page with the selected kecamatan ID
        window.open(`/pontren/cetak/${result.value}`, '_blank');

      }
    });
  });



  // Event delegation for delete button
  $('#lembagaTable tbody').on('click', '.delete-btn', function() {
    var id = $(this).data('id');
    Swal.fire({
      title: 'Yakin ingin menghapus lembaga ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '/pontren/delete/' + id, // Include id in the URL
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