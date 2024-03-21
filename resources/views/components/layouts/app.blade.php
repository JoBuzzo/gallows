<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }} </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="manifest" href="/manifest.json">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#181818] min-h-screen overflow-x-hidden text-white">
    <x-layouts.sidebar :title="$title" />

    <main class="overflow-x-hidden">
        {{ $slot }}
    </main>

    <script>
        function updateCountdown() {
            if (document.getElementById("countdown")) {

                var now = new Date();

                var midnight = new Date(now);
                midnight.setHours(24, 0, 0, 0);

                var timeUntilMidnight = midnight - now;

                var hours = Math.floor(timeUntilMidnight / (1000 * 60 * 60));
                var minutes = Math.floor((timeUntilMidnight % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeUntilMidnight % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML = hours + "h " + minutes + "m " +
                    seconds +
                    "s";
            }

        }

        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
</body>

</html>
