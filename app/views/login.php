<?php

if (isset($_SESSION['user'])) {
    header('Location: /');
}

var_dump($_SESSION);

?>
<!doctype html>
<html lang="en">
<?php include_once 'layouts/head.php' ?>
<body>

<!--Navbar-->
<?php include_once 'components/navbar.php'; ?>

<div class="container py-5">

    <?php if (isset($error)): ?>

            <div class="alert alert-danger" role="alert">
                <?= $error; ?>
            </div>

    <?php endif; ?>

    <form method="post" action="/login">

        <!--Email input group-->
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   id="exampleInputEmail1"
                   aria-describedby="emailHelp"
                   placeholder="Enter email">
        </div>

        <!--Password input group-->
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password"
                   name="password"
                   class="form-control"
                   id="exampleInputPassword1"
                   placeholder="Password">
        </div>

        <!--Submit button-->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>