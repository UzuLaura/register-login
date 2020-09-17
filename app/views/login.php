<?php

if (isset($_SESSION['user'])) {
    header('Location: /');
}

?>
<!doctype html>
<html lang="en">
<?php include_once 'layouts/head.php' ?>
<body>

<!--Navbar-->
<?php include_once 'components/navbar.php'; ?>

    <?php if (isset($error)): ?>

        <div class="">
            <?= $error; ?>
        </div>

    <?php endif; ?>

        <form method="post" action="/login">

            <!--Email input group-->
            <div class="">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email"
                       name="email"
                       class=""
                       id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       placeholder="Enter email">
            </div>

            <!--Password input group-->
            <div class="">
                <label for="exampleInputPassword1">Password</label>
                <input type="password"
                       name="password"
                       class=""
                       id="exampleInputPassword1"
                       placeholder="Password">
            </div>

            <!--Submit button-->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</body>
</html>