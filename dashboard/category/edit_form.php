<?php

include "../../connection.php";

$id = $_GET['id'];
@$errorMessage = $_GET['err'];

$sql = "SELECT * FROM category WHERE id='$id'";

$row = mysqli_fetch_array(mysqli_query($conn, $sql));

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../style/bootstrap.min.css" />
	<script src="../../style/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="../../style/main.css" />
	<title>The Blog</title>
</head>

<body>
	<div class="container">
		<!-- Start Top Navigation -->
		<nav class="nav-main" aria-label="main navigation">
			<a href="../"><img src="../../assets/logo.svg" alt="The Blog Logo" /></a>

			<div>
				<a href="#">About Us</a>
				<a href="#">Contact Us</a>
			</div>
		</nav>
		<!-- End Top Navigation -->

		<header>
			<section class="banner">
				<img src="../../assets/banner.jpg" alt="Banner" />
				<h1 class="display-1">THE BLOG</h1>
			</section>
		</header>

		<main>
			<div class="row my-4">
				<!-- Start Aside -->
				<aside class="col-12 col-md-3 mb-4">
					<div class="manage">
						<p class="manage__title">Manage</p>

						<nav class="nav-side" aria-label="Manage Navigation">
							<a href="../post/">
								<p>Post</p>
							</a>
							<a href="./">
								<p>Category</p>
							</a>
							<a href="../user/">
								<p>User</p>
							</a>
						</nav>
					</div>
				</aside>

				<section class="col-12 col-md-9">
					<h3>Edit Category</h3>
					<hr>

					<form action="./update.php" method="post">
						<input type="hidden" name="id" value="<?= $row['id'] ?>" class="input mt-1 mb-2">

						<label for="name">Category Name</label>
						<input type="text" name="name" id="name" value="<?= $row['name'] ?>" class="input mt-1 mb-2">

						<?php if ($errorMessage) { ?>
							<p class="error">* <?= $errorMessage ?></p>
						<?php } ?>
						<input type="submit" name="submit" value="Update" class="btn-primary">
					</form>
				</section>
		</main>

		<footer>
			<p>Copyright © <?= date('Y') ?> <a href="#">The Blog</a></p>
		</footer>
	</div>
</body>

</html>