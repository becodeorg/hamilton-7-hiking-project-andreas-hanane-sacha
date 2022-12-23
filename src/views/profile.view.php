<section>
    <form action="/profil" method="post" class="flex flex-col w-full md:w-5/12 rounded overflow-hidden shadow-lg m-auto mt-12 mb-12 py-5 px-5">
        <?php if($_POST['update']=== "change"){ ?>
            <div class="mb-5">
                <label for="nickname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nickname</label>
                <input type="text" name="nickname" value="<?= $_SESSION['user']['nickname'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Firstname</label>
                <input type="text" name="firstname" value="<?= $_SESSION['user']['firstname'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                <input type="text" name="lastname" value="<?= $_SESSION['user']['lastname'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" name="email" value="<?= $_SESSION['user']['email'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="flex flex-col sm:flex-row w-3/5s m:w-full justify-between justify m-auto">
                <button name="update" value="update" type="submit" class="flex justify-center text-white items-center bg-sky-400 hover: bg-sky-500 focus:ring-4 focus:ring-blue-300 font-medium  rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Change</button>
                <button name="update" value="-1" type="submit" class="flex text-white items-center bg-sky-400 hover: bg-sky-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Discard changes</button>
                <button name="update" value="delete" type="submit" class="flex justify-center text-white items-center bg-red-500 hover: bg-red-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Delete</button>
            </div>
        <?php }else{ ?>
            <h1 class="font-bold text-2xl m-auto mb-5 mt-5">My Profile</h1>
            <div class="flex flex-row mb-5">
                <label for="nickname" class="font-bold mr-2">Nickname : </label>
                <p><?= $_SESSION['user']['nickname'] ?></p>
            </div>
            <div class="flex flex-row mb-5">
                <label for="firstname" class="font-bold mr-2">Firstname : </label>
                <p><?= $_SESSION['user']['firstname'] ?></p>
            </div>
            <div class="flex flex-row mb-5">
                <label for="lastname" class="font-bold mr-2">Lastname : </label>
                <p><?= $_SESSION['user']['lastname'] ?></p>
            </div>
            <div class="flex flex-row mb-5">
                <label for="email" class="font-bold mr-2">Email : </label>
                <p><?= $_SESSION['user']['email'] ?></p>
            </div>
            <div>
                <button name="update" value="change" type="submit" class="flex m-auto text-white bg-sky-400 hover: bg-sky-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Change</button>
            </div>
        <?php } ?>
    </form>
</section>

<section class="flex flex-col py-10 px-10">
    <?php if (!empty($hikes)) : ?>
        <h2 class="font-bold text-2xl"><?php echo $_SESSION['user']['nickname']; ?>'s hikes</h2>
    <?php endif; ?>
    <div class="mt-7 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
        <?php foreach ($hikes as $hike) { ?>
            <div class="flex flex-col rounded overflow-hidden shadow-lg mb-12 w-full py-5 px-5">
                <a href="/singleHike?id=<?php echo $hike['id']; ?>"><img class="w-full mb-7" src="/resources/img/hike1.jpg" alt="hiking1"></a>
                <a class="w-auto font-bold text-sky-400 hover:text-sky-600 text-xl mb-5" href="/singleHike?id=<?php echo $hike['id']; ?>"><h3><?php echo ucfirst($hike['name']); ?></h3></a>
                <div class="flex flex-row mb-5">
                    <label for="distance" class="mr-2">Distance : </label>
                    <p><?php echo $hike['distance'] ."km"; ?></p>
                </div>
                <div class="flex flex-row mb-5">
                    <label for="duration" class="mr-2">Duration : </label>
                    <p><?php echo intdiv($hike['duration'], 60) .'h'. ($hike['duration'] % 60 == 0 ? "00" : $hike['duration'] % 60); ?></p>
                </div>
                <div class="flex flex-row mb-5">
                    <label for="elevation_gain" class="mr-2">Elevation Gain : </label>
                    <p><?php echo $hike['elevation_gain']; ?></p>
                </div>
                <div class="flex flex-row mb-5">
                    <?php if ($hike['isUpdated']) : ?>
                        <label for="updatedBy" class="mr-2">Updated by : </label>
                        <p><?php echo $_SESSION['user']['nickname']; ?></p>
                    <?php else : ?>
                        <label for="createdBy" class="mr-2">Created by : </label>
                        <p><?php echo $_SESSION['user']['nickname']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="flex flex-row mb-5">
                    <?php if ($hike['isUpdated']) : ?>
                        <label for="updatedBy" class="mr-2">Updated the </label>
                        <p><?php echo $hike['date_creation'] ?></p>
                    <?php else : ?>
                        <label for="createdBy" class="mr-2">Created the </label>
                        <p><?php echo $hike['date_creation'] ?></p>
                    <?php endif; ?>
                </div>
                <hr class="mb-5">
                <div class="flex flex-row mb-5">
                    <ul class="flex flex-row flex-wrap">
                        <?php foreach ($hike['tags'] as $tag) { ?>
                            <li class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" id=<?php echo $tag; ?>><?php echo $tag; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</section>