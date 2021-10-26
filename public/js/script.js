$(function () {
	$('.custom-file-input').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass('selected').html(fileName);
	});
	$('.produk').on('click', function () {
		const id = $(this).data('id');
		const href = $(this).attr('href');

		$.ajax({
			url: "/kerja/home/popularitas",
			method: 'post',
			data: {
				id: id,
			},
			success: function () {
				document.location.href = href;
			}
		});
	});
});

const flashData = $('.flash-data').data('flashdata');
const flashData2 = $('.flashdata').data('flashdata');
const data = $('.flash-data').data('data');

if (flashData) {
	Swal.fire({
		title: data,
		text: 'Berhasil ' + flashData,
		type: 'success'
	})
}
if (flashData2) {
	Swal.fire({
		title: data,
		text: 'Belum ' + flashData2,
		type: 'warning'
	})
}

$('.hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: data + ' akan dihapus',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal',
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})
$('.logout').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Log Out',
		text: 'Apakah anda yakin ingin log out?',
		type: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin',
		cancelButtonText: 'Batal',
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})
