<main class="flex flex-col min-h-screen">
    <div class="flex flex-col justify-center items-center mt-22">
        <img src="resources/img/errorImg.jpg" alt="errorImg" class="w-2/5" />
        <h1 class="font-bold sm:text-3xl text-xl"><?= /** @var string $errorMsg */ $errorMsg ?></h1>
        <p>
            <a href="/" class="mt-5 flex justify-center text-white items-center bg-sky-400 hover: bg-sky-500 focus:ring-4 focus:ring-blue-300 font-medium  rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Go back home</a>
        </p>
    </div>
</main>

