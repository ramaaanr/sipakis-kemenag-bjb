<?php include __DIR__ . '/../admin-templates/header.php'; ?>

<div class="container mx-auto px-4 py-8">
  <div class="flex items-center justify-between mb-6">
    <h3 class="text-3xl font-semibold text-gray-800">Profil Lembaga Pendidikan</h3>

  </div>

  <div id="card-container">
    <!-- Card akan di-render di sini -->
  </div>
</div>

<?php include __DIR__ . '/edit-modal.php'; ?>

<script>
$(document).ready(function() {
  const USER_ID = <?= json_encode($id ?? null) ?>;

  function getLembagaPendidikan() {
    if (!USER_ID) {
      console.error("User ID tidak tersedia");
      return;
    }

    $.ajax({
      url: `/operator-lembaga-pendidikan?user_id=${USER_ID}`,
      method: 'GET',
      success: function(response) {
        const res = typeof response === 'string' ? JSON.parse(response) : response;
        if (res.status && res.data && res.data.lembaga_pendidikan_id) {
          fetchLembagaDetail(res.data.lembaga_pendidikan_id);
        } else {
          Swal.fire('Gagal', 'Data lembaga tidak ditemukan!', 'error');
        }
      },
      error: function() {
        Swal.fire('Error', 'Gagal mengambil data lembaga', 'error');
      }
    });
  }

  function fetchLembagaDetail(id) {
    $.ajax({
      url: `/lembaga-pendidikan/${id}`,
      method: 'GET',
      success: function(response) {
        const res = typeof response === 'string' ? JSON.parse(response) : response;
        if (res.status && res.data) {
          renderCard(res.data);
        } else {
          Swal.fire('Gagal', 'Data tidak ditemukan', 'error');
        }
      },
      error: function() {
        Swal.fire('Error', 'Gagal mengambil detail lembaga', 'error');
      }
    });
  }

  function renderCard(data) {
    const cardHtml = `
      <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
        <h4 class="text-2xl font-bold text-gray-800 mb-4">${data.nama}</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
          <div><span class="font-semibold text-gray-600">Jenis:</span> ${data.jenis_lembaga}</div>
          <div><span class="font-semibold text-gray-600">Jenjang:</span> ${data.jenjang}</div>
          <div><span class="font-semibold text-gray-600">NSPP:</span> ${data.nspp}</div>
          <div><span class="font-semibold text-gray-600">NPSN:</span> ${data.npsn}</div>
          <div><span class="font-semibold text-gray-600">Kecamatan:</span> ${data.nama_kecamatan}</div>
          <div><span class="font-semibold text-gray-600">Alamat:</span> ${data.alamat}</div>
          <div><span class="font-semibold text-gray-600">Telepon:</span> ${data.no_telepon}</div>
          <div><span class="font-semibold text-gray-600">Email:</span> ${data.email}</div>
        </div>

        <div class="mt-6 flex gap-3">
          <button class="edit-btn flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-sm"
            data-id="${data.id}"
            data-kecamatan_id="${data.kecamatan_id}"
            data-jenis_lembaga_pendidikan_id="${data.jenis_lembaga_pendidikan_id}"
            data-nama="${data.nama}"
            data-nspp="${data.nspp}"
            data-npsn="${data.npsn}"
            data-jenjang="${data.jenjang}"
            data-alamat="${data.alamat}"
            data-email="${data.email}"
            data-no_telepon="${data.no_telepon}">
            <span class="material-symbols-outlined mr-1">edit</span>Edit
          </button>
          
        </div>
      </div>
    `;
    $('#card-container').html(cardHtml);
  }

  $('#card-container').on('click', '.delete-btn', function() {
    const id = $(this).data('id');
    Swal.fire({
      title: 'Hapus lembaga ini?',
      text: "Tindakan ini tidak dapat dibatalkan!",
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
              $('#card-container').html('');
              Swal.fire('Deleted!', 'Lembaga berhasil dihapus.', 'success');
            } else {
              Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus', 'error');
            }
          },
          error: function() {
            Swal.fire('Error', 'Tidak dapat menghubungi server', 'error');
          }
        });
      }
    });
  });

  getLembagaPendidikan();
});
</script>

<?php include __DIR__ . '/../admin-templates/footer.php'; ?>