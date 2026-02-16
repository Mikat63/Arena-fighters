<?php
require_once "../utils/db_connect.php";
require_once "../utils/autoloader.php";

$title = "home";
require_once "./partials/page-infos.php";
?>

<script defer src="./assets/scripts/main.js"></script>
</head>

<body class="overflow-hidden">

    <main class="w-full h-svh bg-[url('public/assets/backgrounds/home-bg.gif')] bg-cover bg-center flex flex-col items-center justify-around">
        <div class="w-50 h-50 sm:w-60 sm:h-60 md:w-80 md:h-80 ">
            <img src="./assets/logo/Logo.png" alt="Logo de Arena Fighters">
        </div>

        <!-- button with effect -->
        <div class="flex flex-col gap-6 max-w-sm mx-auto relative z-10">
            <button
                class="group relative p-4 rounded-2xl border-2 border-amber-500 bg-linear-to-br from-amber-900 via-orange-900 to-amber-950 shadow-2xl hover:shadow-amber-500/50 hover:shadow-2xl hover:scale-[1.02] hover:-translate-y-1 active:scale-95 transition-all duration-500 ease-out cursor-pointer hover:border-amber-400 overflow-hidden">
                <div
                    class="absolute inset-0 bg-linear-to-r from-transparent via-amber-300/70 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out"></div>

                <div
                    class="absolute inset-0 rounded-2xl bg-linear-to-r from-amber-500/20 via-orange-400/30 to-amber-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                <div class="relative z-10 flex items-center gap-4">

                    <div class="flex-1 text-left">
                        <p
                            class="text-amber-400 font-bold text-lg group-hover:text-amber-300 transition-colors duration-300 drop-shadow-sm">
                            Commencer
                        </p>

                    </div>
                    <div
                        class="opacity-40 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300">
                        <svg
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            fill="none"
                            class="w-5 h-5 text-amber-400">
                            <path
                                d="M9 5l7 7-7 7"
                                stroke-width="2"
                                stroke-linejoin="round"
                                stroke-linecap="round"></path>
                        </svg>
                    </div>
                </div>
            </button>
        </div>

    </main>


    <?php
    require_once "./partials/footer.php";
    ?>