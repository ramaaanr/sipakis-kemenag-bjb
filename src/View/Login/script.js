$(document).ready(function () {
  console.log('hellow world');
  $('#loginForm').on('submit', function (e) {
    e.preventDefault();

    const formData = {
      username: $('#username').val(),
      password: $('#password').val(),
    };

    $.ajax({
      url: '/auth/login',
      method: 'POST',
      contentType: 'application/json',
      success: function (response) {
        console.log(typeof response);
        if (response.status) {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: response.message,
            timer: 1200,
            showConfirmButton: false,
          }).then(() => {
            window.location.href = '/dashboard'; // Ganti ke halaman setelah login
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: response.message,
            timer: 1500,
            showConfirmButton: false,
          });
        }
      },
      error: function (xhr) {
        let message = 'Terjadi kesalahan saat mengirim data.';
        if (xhr.responseJSON && xhr.responseJSON.message) {
          message = xhr.responseJSON.message;
        }

        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: message,
          timer: 1500,
          showConfirmButton: false,
        });
      },
    });
  });
});
