</body>

<footer class="mt-auto px-10 py-10 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <a href="/" class="<?php if ($url === '' || $url === 'singleHike' ) { echo "underline"; } ?> mr-4 hover:underline md:mr-6 ">Home</a>
        </li>
        <?php if ($_SESSION['user']['loggedIn']) : ?>
            <li>
                <a href="/newHike" class="<?php if ($url === 'newHike' ) { echo "underline"; } ?> mr-4 hover:underline md:mr-6 ">Add a new Hike</a>
            </li>
            <li>
                <a href="/profile" class="<?php if ($url === 'profile' ) { echo "underline"; } ?> mr-4 hover:underline md:mr-6 ">My Profile</a>
            </li>
            <!--
            <?php if ($_SESSION['user']['is_admin']) : ?>
                <li>
                    <a href="/adminPanel" class="<?php if ($url === 'adminPanel' ) { echo "underline"; } ?> mr-4 hover:underline md:mr-6 ">Admin Panel</a>
                </li>
            <?php endif; ?>
            -->
            <li>
                <a href="/logout" class="mr-4 hover:underline md:mr-6 ">Logout</a>
            </li>
        <?php else : ?>
            <li>
                <a href="/login" class="<?php if ($url === 'login' ) { echo "underline"; } ?> mr-4 hover:underline md:mr-6 ">Login</a>
            </li>
            <li>
                <a href="/registration" class="<?php if ($url === 'registration' ) { echo "underline"; } ?> mr-4 hover:underline md:mr-6 ">Register</a>
            </li>
        <?php endif; ?>
    </ul>
</footer>

</html>