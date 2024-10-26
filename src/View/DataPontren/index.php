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


  $('#lembagaTable').DataTable({
    ajax: {
      url: '/pontren/getall', // URL to fetch data from
      dataSrc: '' // Indicate that data is a flat array
    },
    columns: [{
        data: 'nama_lembaga'
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
      }, {
        data: null,
        render: function(data, type, row) {
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


                        <button class="delete-btn bg-red-500 text-white px-2 py-1 rounded" data-id="${row.id}"><span class="material-symbols-outlined">
delete
</span></button>
                   </div> `;
        }
      }

    ]
  });

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
    var jumlah_santri_pria = $(this).data('jumlah_santri_pria');
    var jumlah_santri_wanita = $(this).data('jumlah_santri_wanita');
    var jumlah_keseluruhan = $(this).data('jumlah_keseluruhan');

    $('#editId').val(id);
    $('#editNspp').val(nspp);
    $('#editNpsn').val(npsn);
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