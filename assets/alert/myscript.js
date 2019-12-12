const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if(flashData)
{
	Swal.fire({
		title: 'Selamat !!!',
		text: flashData,
		type: 'success',
		timer: 3000
	});
}

//tombol-hapus

$('.tombol-hapus').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah Anda Yakin?',
	  text: "Data Ini Akan Dihapus",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete !'
	}).then((result) => {
	  if (result.value) {
	      document.location.href = href;
	  }
	})
});

$('.log-out').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah Anda Yakin?',
	  text: "Ingin Log Out Dari Halaman Ini",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Log Out'
	}).then((result) => {
	  if (result.value) {
	      document.location.href = href;
	  }
	})
});


