<nav>
    <a href="/"><h1>THE HIKING PROJECT</h1></a>
    <ul>
        <?php if ($_SESSION['user']['loggedIn']) { ?>
            <div>
                <a href="/newHike"><li>Add a new hike</li></a>
                <div>
                    <a href="/profil"><li>My Profile</li></a>
                    <?php if ($_SESSION['user']['is_admin']) { ?>
                        <a href="/panelAdmin"><li>Panel Admin</li></a>
                    <?php } ?>
                    <a href="/logout"><li>Logout</li></a>
                </div>
            </div>
        <?php } else { ?>
            <div>
                <a href="/login"><li>Login</li></a>
                <a href="/registration"><li>Registration</li></a>
            </div>
        <?php } ?>
    </ul>
</nav>