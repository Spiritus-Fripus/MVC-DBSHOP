<?php
/**
 * DOC VARIABLE
 * @var string $bodyContent
 */
?>
<!doctype html>
<html lang="en">

<head>
    <title>BDSHOP MVC</title>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>

</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="?controller=home&action=index">INDEX</a>
        <a class="navbar-brand" href="?controller=product&action=index&p=1">PRODUCT</a>
        <a class="navbar-brand" href="?controller=security&action=login">LOGIN</a>
        <?php if (!empty($_SESSION['user_connected'])) { ?>
            <a class="navbar-brand" href="?controller=security&action=logout">LOGOUT</a>
        <?php } ?>
    </nav>
</header>
<main>
    <?= $bodyContent ?>
</main>
<footer>
    <!-- place footer here -->
</footer>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>