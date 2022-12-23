<form action="/singleHike?id=<?php echo $hike['id']; ?>" method="post" class="flex flex-col w-5/12s m:w-full rounded overflow-hidden shadow-lg m-auto mt-12 mb-12 py-5 px-5">
    <img class="w-auto mb-7" src="/resources/img/hike1.jpg" alt="hiking1">
    <?php if($_POST['update']=== "change"){ ?>
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" value="<?= $hike['name'] ?>"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="distance" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Distance</label>
            <input type="number" name="distance" step=0.01 min="1" value="<?= $hike['distance'] ?>"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration</label>
            <input type="number" name="duration" step=0.01 min="1" value="<?= $hike['duration'] ?>"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="elevation_gain" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Elevation Gain</label>
            <input type="number" name="elevation_gain" step=0.01 min="1" value="<?= $hike['elevation_gain'] ?>"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea name="description" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= $hike['description'] ?></textarea>
        </div>
        <div class="mb-10">
            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
            <ul class="flex flex-wrap justify-between px-5 space-5">
                <?php foreach ($allTags as $tag) { ?>
                    <li class="flex">
                        <input
                                type="checkbox"
                                name="tags[]"
                                value="<?php echo $tag['id']; ?>"
                                id="<?php echo $tag['name']; ?>"
                                <?php if (in_array($tag['name'], $hike['tags'])) { echo "checked='checked'"; } ?>
                                class="text-sm ml-2 mr-1 inline-block"
                        />
                        <label for="<?php echo $tag['name']; ?>" class="text-sm mb-1"><?php echo $tag['name']; ?></label>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="flex flex-col sm:flex-row w-3/5s m:w-full justify-between justify m-auto">
            <button name="update" value="update" type="submit" class="flex justify-center text-white items-center bg-sky-400 hover: bg-sky-500 focus:ring-4 focus:ring-blue-300 font-medium  rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Change</button>
            <button name="update" value="-1" type="submit" class="flex text-white items-center bg-sky-400 hover: bg-sky-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Discard changes</button>
            <button name="update" value="delete" type="submit" class="flex justify-center text-white items-center bg-red-500 hover: bg-red-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Delete</button>
        </div>
    <?php } else { ?>
        <h2 class="w-auto font-bold text-sky-400 text-xl mb-5"><?php echo $hike['name']; ?></h2>
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
            <label for="description" class="mr-2">Description : </label>
            <p><?php echo $hike['description'] ?></p>
        </div>
        <div class="flex flex-row mb-5">
            <?php if ($hike['isUpdated']) : ?>
                <label for="updatedBy" class="mr-2">Updated by : </label>
                <p><?php echo $hike['updatedBy'] ?></p>
            <?php else : ?>
                <label for="createdBy" class="mr-2">Created by : </label>
                <p><?php echo $hike['createdBy'] ?></p>
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
        <div>
            <?php if (($_SESSION['user']['id'] === $hike['id_user']) || $_SESSION['user']['is_admin']) : ?>
                <button name="update" value="change" type="submit" class="flex m-auto text-white bg-sky-400 hover: bg-sky-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Change</button>
            <?php endif; ?>
        </div>
    <?php } ?>
</form>