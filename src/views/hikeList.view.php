<section class="flex flex-col px-12 py-10 w-full max-w-8xl m-auto">
    <h2 class="text-2xl mb-10">Hello <span class="font-bold text-sky-400"><?php echo $_SESSION['user']['nickname']; ?></span> !</h2>
    <h2 class="text-2xl underline mb-7">There are the avaible hikes : </h2>
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
            </div>
        <?php } ?>
    </div>
</section>