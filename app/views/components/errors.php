<?php foreach ($errors as $error): ?>

    <!--Error Message-->
    <div class="notification">
        <?= $error; ?>
    </div>

<?php endforeach; ?>