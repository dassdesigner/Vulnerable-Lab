<?php
session_start();

if (!isset($_SESSION['user_login'])) {
	header('Location: ../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SSRF</title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
	<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
	<style type="text/css">
		body {
		  	padding-top: 1rem;
		}
		.starter-template {
			padding: 3rem 1.5rem;
			text-align: center;
		}
		.urlInput{
			padding: .375rem .75rem;
			font-size: 1rem;
			line-height: 1.5;
			color: #495057;
			background-color: #fff;
			background-image: none;
			background-clip: padding-box;
			border: 1px solid #ced4da;
			border-radius: .25rem;
			transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="../home.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="sqli.php">SQLI</a>
				</li>
				<li class="nav-item dropdown">
					<button class="nav-link btn bg-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuLink">
						XSS
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="xss_stored.php">Stored</a>
						<a class="dropdown-item" href="xss_reflected.php">Reflected</a>
						<a class="dropdown-item" href="xss_dom.php">Dom	</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="csrf.php">CSRF</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ssrf.php">SSRF</a>
				</li>
			</ul>
			<ul class="navbar-nav nav-right">
				<li class="nav-item">
					<a class="nav-link btn btn-outline-light text-danger" href="../home.php">Back</a>
				</li>
			</ul>
		</div>
    </nav>
    <main role="main" class="container">
		<div class="starter-template">
			<form method="get" action="#">
				<b><h1 class="content head">Server Side Request Forgery (SSRF)</h1></b>
				<input type="text" name="url" placeholder="Website to load..." class="urlInput" id="text">
				<button name="btn" class="btn btn-dark">Submit</button>
			</form>
		</div>
    </main>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
	<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
	<center>
</body>
</html>
<?php


	if (isset($_GET['btn'])){
		$url = $_GET['url'];
		$curl = curl_init();
	    curl_setopt ($curl, CURLOPT_URL, $url); // Not validating the input. Trusting the location variable
	    curl_exec ($curl); 
	    curl_close ($curl);
		
	}
?>