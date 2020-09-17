<?php

if (!isset($_SESSION['user'])) {
    header('Location: /login');
}

?>
<!doctype html>
<html lang="en">
<?php include_once 'layouts/head.php' ?>
<body>

<!--Navbar-->
<?php include_once 'components/navbar.php'; ?>

<div class="container py-5">
    <?php var_dump($_SESSION); ?>
</div>
</body>
</html>