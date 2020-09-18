<?php

if (!isset($_SESSION['user'])) {
    header('Location: /login');
}

?>
<!doctype html>
<html lang="en">

<!--Head-->
<?php include_once 'layouts/head.php'; ?>

<body>
<header>

    <!--Navbar-->
    <?php include_once 'components/navbar.php'; ?>

</header>

<main class="container">

    <div class="card">

        <!--Heading-->
        <h2>Account Info</h2>

        <!--Account Info Block-->
        <div class="info-block">
            <p>Email: <?= $_SESSION['user']->email; ?></p>
            <p>Name: <?= $_SESSION['user']->name; ?></p>
            <p>Last name: <?= $_SESSION['user']->last_name; ?></p>
            <p>Phone number: <?= $_SESSION['user']->phone; ?></p>
            <p>Registration date: <?= $_SESSION['user']->registered_at; ?></p>
        </div>
    </div>

</main>

</body>
</html>