<?php include __DIR__ . '/../admin-templates/header.php'; ?>

<div class="container px-6 py-8 mx-auto ">
  <div class="flex items-center space-x-2 ">
    <h3 class="text-3xl font-medium text-gray-700">Data Murid</h3>

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
                Nama Murid
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Lembaga Pendidikan
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                NISN
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Alamat
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tempat Tanggal Lahir
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Rombel Kelas
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tingkat
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

<?php include __DIR__ . '/add-modal.php'; ?>
<?php include __DIR__ . '/detail-modal.php'; ?>
<?php include __DIR__ . '/edit-modal.php'; ?>

<script>
  $(document).ready(function() {
    let lembagaPendidikanId = null;
    const USER_ID = <?= json_encode($id ?? null) ?>;
    const ROLE = <?= json_encode($role ?? null) ?>;

    function getLembagaPendidikanIdAndFetchMurid() {
      if (!USER_ID) {
        console.error("User ID tidak ditemukan");
        return;
      }
      if (ROLE === 'admin') {
        fetchMurid(null);
      } else {
        $.ajax({
          url: `/operator-lembaga-pendidikan?user_id=${USER_ID}`,
          method: 'GET',
          success: function(response) {
            const res = typeof response === 'string' ? JSON.parse(response) : response;
            if (res.status && res.data && res.data.lembaga_pendidikan_id) {
              lembagaPendidikanId = res.data.lembaga_pendidikan_id;
              const lembagaPendidikan = res.data.lembaga_pendidikan;
              console.log(res.data);
              console.log("lembaga_pendidikan_id =", lembagaPendidikanId);
              $('#lembaga_pendidikan_id').val(lembagaPendidikanId); // set lembaga_pendidikan_id di modal
              $('#lembaga_pendidikan').val(lembagaPendidikan);
              fetchMurid(lembagaPendidikanId);
            } else {
              Swal.fire('Gagal', 'Data lembaga pendidikan tidak ditemukan!', 'error');
            }
          },
          error: function() {
            Swal.fire('Error', 'Gagal mengambil data lembaga pendidikan', 'error');
          }
        });
      }
    }


    function fetchMurid(lembagaId) {
      $('#table').DataTable({
        destroy: true,
        ajax: {
          url: `/murid${lembagaId ? `?lembaga_pendidikan_id=${lembagaId}` : ''}`,
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
            data: 'nisn'
          },
          {
            data: 'alamat'
          },
          {
            data: 'tempat_tanggal_lahir'
          },
          {
            data: 'rombel_kelas'
          },
          {
            data: 'tingkat'
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
                    data-nama="${row.nama}"
                    data-alamat="${row.alamat}"
                    data-tempat_tanggal_lahir="${row.tempat_tanggal_lahir}"
                    data-rombel_kelas="${row.rombel_kelas}"
                    data-tingkat="${row.tingkat}"
                    data-nisn="${row.nisn}"
                    data-jenis_kelamin="${row.jenis_kelamin}">
                    <span class="material-symbols-outlined">info</span>
                  </button>
                  <button class="edit-btn bg-blue-500 text-white px-2 py-1 rounded" data-id="${row.id}"
                    data-lembaga_pendidikan_id="${row.lembaga_pendidikan_id}"
                    data-lembaga_pendidikan="${row.lembaga_pendidikan}"
                    data-nama="${row.nama}"
                    data-alamat="${row.alamat}"
                    data-tempat_tanggal_lahir="${row.tempat_tanggal_lahir}"
                    data-rombel_kelas="${row.rombel_kelas}"
                    data-tingkat="${row.tingkat}"
                    data-nisn="${row.nisn}"
                    data-jenis_kelamin="${row.jenis_kelamin}">
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

    getLembagaPendidikanIdAndFetchMurid();

    // Hapus
    $('#table tbody').on('click', '.delete-btn', function() {
      const id = $(this).data('id');
      Swal.fire({
        title: 'Yakin ingin menghapus Murid ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '/murid/' + id,
            type: 'DELETE',
            success: function(res) {
              const response = typeof res === 'string' ? JSON.parse(res) : res;
              if (response.status) {
                $('#table').DataTable().ajax.reload();
                Swal.fire('Deleted!', 'Murid berhasil dihapus.', 'success');
              } else {
                Swal.fire('Error', 'Terjadi kesalahan saat menghapus Murid', 'error');
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