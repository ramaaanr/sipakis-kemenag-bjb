<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
  <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl p-6 relative animate-fade-in">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-2">Edit Lembaga Pendidikan</h2>
    <form id="editForm">
      <input type="hidden" name="id" id="editId">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="edit_nama" class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
          <input type="text" id="edit_nama" name="nama" required
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
          <label for="edit_kecamatan_id" class="block text-sm font-medium text-gray-700">Kecamatan</label>
          <select id="edit_kecamatan_id" name="kecamatan_id" required
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200"></select>
        </div>

        <div>
          <label for="edit_jenis_lembaga_pendidikan_id" class="block text-sm font-medium text-gray-700">Jenis
            Lembaga</label>
          <select id="edit_jenis_lembaga_pendidikan_id" name="jenis_lembaga_pendidikan_id" required
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200"></select>
        </div>

        <div>
          <label for="edit_jenjang" class="block text-sm font-medium text-gray-700">Jenjang</label>
          <input type="text" id="edit_jenjang" name="jenjang" required
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
          <label for="edit_nspp" class="block text-sm font-medium text-gray-700">NSPP</label>
          <input type="text" id="edit_nspp" name="nspp" required
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
          <label for="edit_npsn" class="block text-sm font-medium text-gray-700">NPSN</label>
          <input type="text" id="edit_npsn" name="npsn" required
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div class="md:col-span-2">
          <label for="edit_alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
          <input type="text" id="edit_alamat" name="alamat" required
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
          <label for="edit_no_telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
          <input type="text" id="edit_no_telepon" name="no_telepon" required
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
          <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="edit_email" name="email" required
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
        </div>
      </div>

      <div class="flex justify-end mt-6 space-x-2">
        <button type="button" id="editModalClose"
          class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Tutup</button>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
$(document).on('click', '.edit-btn', function() {
  function populateSelect(endpoint, selectId, selectedValue = null) {
    $.ajax({
      url: endpoint,
      method: 'GET',
      dataType: 'json',
      success: function(res) {
        const data = res.data;
        const select = $(selectId);
        select.empty();
        select.append('<option value="" disabled>Pilih data</option>');

        $.each(data, function(index, item) {
          const selected = selectedValue && selectedValue == item.id ? 'selected' : '';
          select.append(`<option value="${item.id}" ${selected}>${item.nama}</option>`);
        });
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: 'Gagal Ambil Data',
          text: 'Tidak dapat mengambil data dari ' + endpoint,
          timer: 1500,
          showConfirmButton: false
        });
      }
    });
  }


  // Show Modal on Button Click
  const data = $(this).data();
  console.log(data);
  $('#editId').val(data.id);
  $('#edit_nama').val(data.nama);
  $('#edit_nspp').val(data.nspp);
  $('#edit_npsn').val(data.npsn);
  $('#edit_jenjang').val(data.jenjang);
  $('#edit_alamat').val(data.alamat);
  $('#edit_no_telepon').val(data.no_telepon);
  $('#edit_email').val(data.email);
  populateSelect('/kecamatan', '#edit_kecamatan_id', data.kecamatan_id);
  populateSelect('/jenis-lembaga-pendidikan', '#edit_jenis_lembaga_pendidikan_id', data
    .jenis_lembaga_pendidikan_id);


  $('#editModal').removeClass('hidden');

  $('#editForm').on('submit', function(e) {
    e.preventDefault(); // Stop default form submission

    const id = $('#editId').val(); // Ambil ID dari input hidden
    const formData = $(this).serialize(); // Ambil semua data form

    $.ajax({
      url: `/lembaga-pendidikan/${id}`,
      type: 'POST', // Atau PATCH jika API mendukung
      data: formData,
      success: function(res) {
        const response = typeof res === 'string' ? JSON.parse(res) : res;
        if (response.status) {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil diperbarui!',
            timer: 1500,
            showConfirmButton: false
          }).then(() => {
            $('#editModal').addClass('hidden'); // Tutup modal
            $('#editForm')[0].reset(); // Reset form
            // Reload data di halaman (atau perbarui card langsung)
            location.reload();
          });


        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: response.message || 'Terjadi kesalahan saat memperbarui data!'
          });
        }
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Gagal menghubungi server!'
        });
      }
    });
  });

});
</script>