<div style="height: 100vh">
    <div class="dark:text-slate-300  h-auto ">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-2">
            <div class="border-2 border-purple-500 w-full h-auto p-4 flex justify-between items-center rounded-md bg-purple-500 dark:text-white">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 0 640 512"><path fill="#ffffff" d="M72 88a56 56 0 1 1 112 0a56 56 0 1 1-112 0m-8 157.7c-10 11.2-16 26.1-16 42.3s6 31.1 16 42.3v-84.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32v-26.8C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416v-21.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32h-64c-17.7 0-32-14.3-32-32m8-328a56 56 0 1 1 112 0a56 56 0 1 1-112 0m120 157.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128a64 64 0 1 1 0-128m-80 272c0 16.2 6 31 16 42.3v-84.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zm64 42.3c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32h-64c-17.7 0-32-14.3-32-32v-42.8c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112"/></svg>
                </div>
                <div class="flex items-end text-white">
                    <p class="font-bold text-4xl">
                        78
                    </p>
                    <span>
                         Inmigrantes
                    </span>
                </div>
            </div>
            <div class="border-2 border-teal-400 w-full h-auto p-4 flex justify-between items-center rounded-md bg-teal-400 dark:text-white">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 0 640 512"><path fill="#ffffff" d="M32 32c17.7 0 32 14.3 32 32v256h224V160c0-17.7 14.3-32 32-32h224c53 0 96 43 96 96v224c0 17.7-14.3 32-32 32s-32-14.3-32-32v-32H64v32c0 17.7-14.3 32-32 32S0 465.7 0 448V64c0-17.7 14.3-32 32-32m144 96a80 80 0 1 1 0 160a80 80 0 1 1 0-160"/></svg>
                </div>
                <div class="flex items-end text-white">
                    <p class="font-bold text-4xl">
                        78
                    </p>
                    <span>
                         Disponibles
                    </span>
                </div>
            </div>
            <div class="border-2 border-blue-400 w-full h-auto p-4 flex justify-between items-center rounded-md bg-blue-400 dark:text-white">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="40" viewBox="0 0 576 512"><path fill="#ffffff" d="M64 32C28.7 32 0 60.7 0 96v320c0 35.3 28.7 64 64 64h32V32zm64 0v448h320V32zm384 448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64h-32v448zM256 176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16h-48v48c0 8.8-7.2 16-16 16h-32c-8.8 0-16-7.2-16-16v-48h-48c-8.8 0-16-7.2-16-16v-32c0-8.8 7.2-16 16-16h48z"/></svg>
                </div>
                <div class="flex items-end text-white">
                    <p class="font-bold text-4xl">
                        78
                    </p>
                    <span>
                         Artículos
                    </span>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-2">
            <div class="col-span-1">
                <x-chartjs-component :chart="$chartDonut" />
            </div>
            <div class="col-span-2">
                <x-chartjs-component :chart="$chart" />

            </div>
        </div>
    </div>

    <div class=" h-auto">
        <a href="" class="grid grid-cols-1 md:grid-cols-5 gap-4 p-4">
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 justify-center">
                <div class="w-full flex flex-wrap justify-center p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 26 26"><path fill="#A9A9A9" d="M16.563 15.9c-.159-.052-1.164-.505-.536-2.414h-.009c1.637-1.686 2.888-4.399 2.888-7.07c0-4.107-2.731-6.26-5.905-6.26c-3.176 0-5.892 2.152-5.892 6.26c0 2.682 1.244 5.406 2.891 7.088c.642 1.684-.506 2.309-.746 2.396c-3.324 1.203-7.224 3.394-7.224 5.557v.811c0 2.947 5.714 3.617 11.002 3.617c5.296 0 10.938-.67 10.938-3.617v-.811c0-2.228-3.919-4.402-7.407-5.557m-5.516 8.709c0-2.549 1.623-5.99 1.623-5.99l-1.123-.881c0-.842 1.453-1.723 1.453-1.723s1.449.895 1.449 1.723l-1.119.881s1.623 3.428 1.623 6.018c0 .406-3.906.312-3.906-.028"/></svg>
                </div>
                <div class="font-semibold text-xl flex justify-center dark:text-white pb-3">
                    <p>Administrador</p>
                </div>
            </div>
        </a>


    </div>
</div>
