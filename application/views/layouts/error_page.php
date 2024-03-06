<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>404 | Halaman Tidak Ditemukan</title>
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>src/backend/css_custom/style.css" />
</head>
<body>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1><span></span></h1>
			</div>
			<br/>
			<h2>Oops! Halaman Tidak Ditemukan</h2>
			<p>Maaf, tetapi halaman yang Anda cari tidak ada,mungkin telah dihapus, atau kamu salah ketik alamat.</p>
			<a href="#" id="myHref">Kembali ke Halaman Sebelumnya</a>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
<script>
	$("#myHref").on('click', function() {
		window.history.back();
	});
</script>
</body>
</html>
