<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC PHP</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
	<!-- Boxicons -->
	<link rel='stylesheet' type="text/css" href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css'>
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php (isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] === "true") ? $_SESSION['darkmode'] = true : $_SESSION['darkmode'] = false; ?>
<body class="<?= theme('bg-dark text-white-75','bg-white') ?>" <?= !isset($_COOKIE['darkmode']) ? 'onload="loadDarkMode()"' : false; ?> >

    <?php //(!$logged) ? false : require('sidebar.php'); ?>
    <?php false ? false : require('sidebar.php'); ?>

    <section id="content">

        <?php false ? false : require('nav.php'); ?>

        <?php //(!$logged) ? false : require('nav.php'); ?>
        <main role="main"><!-- MAIN -->

