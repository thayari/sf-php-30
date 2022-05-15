<?php
	$isUserAuthorised = false;
	if (isset($_COOKIE['id'])) {
		$isUserAuthorised = true;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="/CSS/style.css">
	<title>PHP-30</title>
</head>

<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
					<div class="navbar-nav">
						<a class="nav-link" href="<?=ROOT_PATH?>?url=main">Галерея</a>
						<?php if ($isUserAuthorised):?>
						<a class="nav-link" href="<?=ROOT_PATH?>?url=form">Добавить</a>
						<a class="nav-link" href="<?=ROOT_PATH?>?url=auth">Выйти</a>
						<?php else:?>
						<a class="nav-link" href="<?=ROOT_PATH?>?url=auth">Войти</a>
						<?php endif;?>
					</div>
				</div>
			</div>
		</nav>
		</header>
	<div class="container">
		<?php 
		// $content_view из Application/Core/View.php
		include $content_view; 
		?>
	</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="/JS/script.js"></script>

</html>