<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Sistem PJK</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Sistem Deteksi Risiko PJK</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="http://localhost/sistem_pjk/artikel">Artikel<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" data-toggle="modal" data-target="#exampleModal"?>Login<span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="http://localhost/sistem_pjk/assets/img/gambar1.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="http://localhost/sistem_pjk/assets/img/gambar2.jpg" class="d-block w-100" alt="...">
			</div>
		</div>
	</div>
		<!-- Modal Login-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
            <form class="user" method="post">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Silahkan Login</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="container">
											</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
						</div>
					</div>
					<div class=" modal-footer">
						<button class="btn btn-primary btn-block" type="submit">Login</button>
					</div>