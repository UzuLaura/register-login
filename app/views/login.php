<?php

if (isset($_SESSION['user'])) {
    header('Location: /');
}

?>
<!doctype html>
<html lang="en">

<!--Head-->
<?php include_once 'layouts/head.php' ?>

<body>
<header>

    <!--Navbar-->
    <?php include_once 'components/navbar.php'; ?>

</header>
<main class="container">

    <!--Errors-->
    <?php if (isset($errors)): ?>
        <?php include 'components/errors.php'; ?>
    <?php endif; ?>

    <div class="card">

        <!--Form Heading-->
        <h2>Login</h2>

        <!--Registration Form-->
        <form method="post" action="/login">

            <!--Email input group-->
            <div class="form-group">
                <label for="login-email">Email address</label>
                <input type="email"
                       name="email"
                       id="login-email"
                       placeholder="Enter email"
                       required>
            </div>

            <!--Password input group-->
            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password"
                       name="password"
                       id="login-password"
                       placeholder="Password"
                       required>
            </div>

            <!--Submit button-->
            <button type="submit" class="button">Submit</button>

        </form>
    </div>
</main>
</body>
</html>