<nav>
    <ul>
        <?php if (!isset($_SESSION['user'])): ?>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
        <?php else: ?>
            <li><a href="/logout">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>