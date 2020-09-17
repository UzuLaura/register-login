<?php

if (isset($_SESSION['user'])) {
    header('Location: /');
}

?>
<!doctype html>
<html lang="en">
<?php include_once 'layouts/head.php'; ?>
<body>

<!--Navbar-->
<?php include_once 'components/navbar.php'; ?>

<div class="container py-5">

    <?php if (isset($errors)): ?>

        <?php foreach ($errors as $error): ?>

            <div class="alert alert-danger" role="alert">
                <?= $error; ?>
            </div>

        <?php endforeach; ?>

    <?php endif; ?>

    <form method="post" action="/register">
        <!--Name input group-->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                   value="<?= isset($fields['name']) ? $fields['name'] : ''; ?>"
                   name="name"
                   class="form-control"
                   id="name"
                   placeholder="Enter name">
        </div>

        <!--Last Name input group-->
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text"
                   value="<?= isset($fields['last_name']) ? $fields['last_name'] : ''; ?>"
                   name="last_name"
                   class="form-control"
                   id="last_name"
                   placeholder="Enter last name">
        </div>

        <!--Email input group-->
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="text"
                   value="<?= isset($fields['email']) ? $fields['email'] : ''; ?>"
                   name="email"
                   class="form-control"
                   id="email"
                   aria-describedby="emailHelp"
                   placeholder="Enter email">
        </div>

        <!--Phone Number input group-->
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text"
                   value="<?= isset($fields['phone']) ? $fields['phone'] : ''; ?>"
                   name="phone"
                   class="form-control"
                   id="phone"
                   placeholder="Enter your phone number">
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

        <!--Password repeat input group-->
        <div class="form-group">
            <label for="exampleInputPassword2">Repeat password</label>
            <input type="password"
                   name="password_repeat"
                   class="form-control"
                   id="exampleInputPassword2"
                   placeholder="Repeat password">
        </div>


        <!--Submit button-->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>