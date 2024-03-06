const flashData = $('.flash-data').data('flashdata');
const flashDataGagal = $('.flash-data-gagal').data('flashdatagagal');

const Toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 3000
});

//notif sukses
if (flashData) {
	Toast.fire({
		type: 'success',
		title: 'Data Berhasil ' + flashData
	});
}

//notif gagal
if(flashDataGagal){
	Toast.fire({
		type: 'error',
		title: 'Data Gagal ' + flashDataGagal
	});
}

//tombol hapus
$('.tombol-hapus').on('click',function(e){

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data akan dihapus permanen",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
