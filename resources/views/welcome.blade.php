<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-slate-200 p-6">
        <div class="max-w-6xl mx-auto h-full px-3 space-y-6">
            <header class="h-24 bg-white shadow-sm p-8 rounded-md">
                <div class="flex justify-between h-full items-center">
                    <h1 class="text-4xl font-semibold capitalize">simple laravel blog api</h1>
                </div>
            </header>

            <section class="bg-white shadow-sm rounded-md p-8">
                <h1 class="text-3xl mb-3 font-semibold">Some endpoints</h1>

                <div class="p-3 bg-slate-200 rounded-md">
                    <code class="space-y-4">
                        <p class="flex justify-between">
                            <span>/api/posts</span>
                            <span class="font-semibold rounded-md bg-blue-500 text-white px-2 py-1">GET</span>
                        </p>

                        <p class="flex justify-between">
                            <span>/api/posts/{id}</span>
                            <span class="font-semibold rounded-md bg-blue-500 text-white px-2 py-1">GET</span>
                        </p>

                        <p class="flex justify-between">
                            <span>/api/posts</span>
                            <span class="font-semibold rounded-md bg-green-500 text-white px-2 py-1">POST</span>
                        </p>

                        <p class="flex justify-between">
                            <span>/api/posts/{id}/edit</span>
                            <span class="font-semibold rounded-md bg-blue-500 text-white px-2 py-1">GET</span>
                        </p>

                        <p class="flex justify-between">
                            <span>/api/posts/{id}</span>
                            <span class="font-semibold rounded-md bg-orange-500 text-white px-2 py-1">PUT</span>
                        </p>

                        <p class="flex justify-between">
                            <span>/api/posts/{id}</span>
                            <span class="font-semibold rounded-md bg-red-500 text-white px-2 py-1">DELETE</span>
                        </p>
                    </code>
                </div>
            </section>
        </div>
    </body>
</html>
