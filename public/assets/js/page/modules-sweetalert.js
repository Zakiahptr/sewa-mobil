"use strict";

$(".confirmDelete").click(function(event){
    let form = $(this).closest("form");
    event.preventDefault();
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Anda akan Menghapus Data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1cbb8c',
        cancelButtonColor: '#ff3d60',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Tidak, Batal!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        } else {
            Swal.fire({
                title: 'Dibatalkan',
                text: '',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
            });
        }
    });
});

$("#confirmLogout").click(function(e){
    let form = $(this).closest("form");
    e.preventDefault();
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Anda akan keluar dari akun anda!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1cbb8c',
        cancelButtonColor: '#ff3d60',
        confirmButtonText: 'Ya, Keluar!',
        cancelButtonText: 'Tidak, Batal!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        } else {
            Swal.fire({
                title: 'Dibatalkan',
                text: '',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
            });
        }
    });
});



$("#swal-1").click(function() {
	swal('Hello');
});

$("#swal-2").click(function() {
	swal('Good Job', 'You clicked the button!', 'success');
});

$("#swal-3").click(function() {
	swal('Good Job', 'You clicked the button!', 'warning');
});

$("#swal-4").click(function() {
	swal('Good Job', 'You clicked the button!', 'info');
});

$("#swal-5").click(function() {
	swal('Good Job', 'You clicked the button!', 'error');
});

$("#swal-6").click(function() {
  swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal('Poof! Your imaginary file has been deleted!', {
        icon: 'success',
      });
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});

$("#swal-7").click(function() {
  swal({
    title: 'What is your name?',
    content: {
    element: 'input',
    attributes: {
      placeholder: 'Type your name',
      type: 'text',
    },
    },
  }).then((data) => {
    swal('Hello, ' + data + '!');
  });
});

$("#swal-8").click(function() {
  swal('This modal will disappear soon!', {
    buttons: false,
    timer: 3000,
  });
});
