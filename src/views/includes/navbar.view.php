<nav>
    <ul>
        <a href="/"><li>Home</li></a>
        <?php if ($_SESSION['loggedIn']) { ?>
            <a href="/profil"><li>Profil</li></a>
            <a href="/logout"><li>Logout</li></a>
        <?php } else { ?>
            <a href="/login"><li>Login</li></a>
            <a href="/registration"><li>Registration</li></a>
        <?php } ?>
    </ul>
</nav>