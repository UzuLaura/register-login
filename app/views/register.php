<?php

if (isset($_SESSION['user'])) {
    header('Location: /');
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

    <!--Errors-->
    <?php if (isset($errors)): ?>
        <?php include 'components/errors.php'; ?>
    <?php endif; ?>

    <div class="card">

        <!--Form Heading-->
        <h2>Registration</h2>

        <!--Registration Form-->
        <form method="post" action="/register">

            <!--Name input group-->
            <div class="form-group">
                <label for="registration-name">Name</label>
                <input type="text"
                       value="<?= isset($fields['name']) ? $fields['name'] : ''; ?>"
                       name="name"
                       id="registration-name"
                       placeholder="Enter name"
                       required>
            </div>

            <!--Last Name input group-->
            <div class="form-group">
                <label for="registration-last_name">Last Name</label>
                <input type="text"
                       value="<?= isset($fields['last_name']) ? $fields['last_name'] : ''; ?>"
                       name="last_name"
                       id="registration-last_name"
                       placeholder="Enter last name"
                       required>
            </div>

            <!--Email input group-->
            <div class="form-group">
                <label for="registration-email">Email address</label>
                <input type="text"
                       value="<?= isset($fields['email']) ? $fields['email'] : ''; ?>"
                       name="email"
                       id="registration-email"
                       placeholder="Enter email"
                       required>
            </div>

            <!--Phone Number input group-->
            <div class="form-group">
                <label for="registration-phone">Phone Number</label>
                <input type="text"
                       value="<?= isset($fields['phone']) ? $fields['phone'] : ''; ?>"
                       name="phone"
                       id="registration-phone"
                       placeholder="Enter your phone number"
                       required>
            </div>

            <!--Password input group-->
            <div class="form-group">
                <label for="registration-password">Password</label>
                <input type="password"
                       name="password"
                       id="registration-password"
                       placeholder="Password"
                       minlength="8"
                       maxlength="12"
                       required>
            </div>

            <!--Password repeat input group-->
            <div class="form-group">
                <label for="registration-password_repeat">Repeat password</label>
                <input type="password"
                       name="password_repeat"
                       id="registration-password_repeat"
                       placeholder="Repeat password"
                       required>
            </div>

            <!--Submit button-->
            <button type="submit" class="button">Submit</button>

        </form>
    </div>
</main>
</body>
</html>