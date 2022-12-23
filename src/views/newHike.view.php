<section class="flex flex-col justify-center m-auto mb-10 mt-10 w-full">
    <div class="py-5 px-5 m-auto sm:max-w-md w-full bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
        <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white mb-8 mt-3">
            Add a new hike
        </h1>
        <form action="/newHike" method="post" class="flex flex-col justify-center space-y-4 md:space-y-6">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="distance" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Distance (metters)</label>
                <input type="number" name="distance" min="1" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>
            <div>
                <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration (minutes)</label>
                <input type="number" name="duration" min="1" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>
            <div>
                <label for="elevation_gain" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Elevation Gain</label>
                <input type="number" name="elevation_gain" min="1" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>
            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea name="description" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
            </div>
            <div>
                <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                <ul class="flex flex-wrap justify-between px-5 space-5">
                    <?php foreach ($tags as $tag) { ?>
                        <li class="flex">
                            <input class="text-sm ml-2 mr-1 inline-block" type="checkbox" name="tags[]" value=<?php echo $tag['id']; ?> id=<?php echo $tag['name']; ?> />
                            <label class="text-sm mb-1" for=<?php echo $tag['name']; ?>><?php echo $tag['name']; ?></label>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <button type="submit" class="flex m-auto text-white bg-sky-400 hover: bg-sky-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add a new hike</button>
        </form>
    </div>
</section>