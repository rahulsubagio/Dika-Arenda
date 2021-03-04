<!doctype html>
<html lang="en" class="h-100">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dika Arenda</title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

	<style>
		body {
			height: 100%;
			background-image: url("<?= base_url('assets/gambar/background.jpeg') ?>"),
				linear-gradient(rgba(75, 75, 75, 1), rgba(75, 75, 75, 0.3));
			background-size: cover;
			background-position: center;
			background-color: rgba(75, 75, 75, 0.3);
			background-blend-mode: overlay;
		}

		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		.icon {
			width: 100%;
			height: auto;
			display: block;
		}

		.icon-link {
			position: relative;
			width: 50%;
		}

		.overlay {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			height: 100%;
			width: 100%;
			opacity: 0;
			transition: .5s ease;
			background-color: #008CBA;
		}

		.icon-link:hover .overlay {
			opacity: 1;
		}

		.text {
			color: white;
			font-size: 20px;
			position: absolute;
			top: 50%;
			left: 50%;
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
			text-align: center;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>


	<!-- Custom styles for this template -->
	<link href="<?= base_url('assets/css/cover.css') ?>" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white">

	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		<header class="mb-auto">
			<div>
				<h3 class="float-md-start mb-0">Dika Arenda</h3>
				<nav class="nav nav-masthead justify-content-center float-md-end">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
					<a class="nav-link" href="#">Features</a>
					<a class="nav-link" href="#">Contact</a>
				</nav>
			</div>
		</header>

		<main class="px-3">
			<h1>Rumah Potong Ayam</h1>
			<div class="row row-cols-1 row-cols-md-3 g-4">
				<div class="col">
					<a class="icon-link" href="#">
						<img src="<?= base_url('assets/gambar/youtube.png') ?>" class="icon">
						<div class="overlay">
							<div class="text">Kasir</div>
						</div>
					</a>
				</div>
				<div class="col">
					<a class="icon-link" href="#">
						<img src="<?= base_url('assets/gambar/youtube.png') ?>" class="icon">
						<div class="overlay">
							<div class="text">Marketing</div>
						</div>
					</a>
				</div>
				<div class="col">
					<a class="icon-link" href="#">
						<img src="<?= base_url('assets/gambar/youtube.png') ?>" class="icon">
						<div class="overlay">
							<div class="text">Pimpinan</div>
						</div>
					</a>
				</div>
			</div>
		</main>

		<footer class="mt-auto text-white-50">
			<p>Copyright &copy; 2021</p>
		</footer>

	</div>

</body>

</html>