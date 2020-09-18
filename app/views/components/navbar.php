<nav class="navbar">
    <div class="container">
        <?php if (!isset($_SESSION['user'])): ?>
            <a class="navbar-item" href="/login">Login</a>
            <a class="navbar-item" href="/register">Register</a>
        <?php else: ?>
            <a class="navbar-item" href="/logout">Logout</a>
        <?php endif; ?>
    </div>
</nav>