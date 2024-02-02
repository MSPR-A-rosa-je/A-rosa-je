<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@1.9.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background-color: #f4f4f4;">
    <!-- This is an example component -->
    <div class="h-screen font-sans login bg-cover">
        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <form class="max-w-sm m-4 p-10 bg-white bg-opacity-25 rounded shadow-xl login-form-container" method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <p class="text-gray-800 font-medium text-center text-lg font-bold">ADMIN LOGIN</p>
                        <label class="block text-sm text-white" for="email">Email</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" type="email" name="email" placeholder="Email" aria-label="email" required>
                        <div class="mt-2">
                            <label class="block text-sm text-white">Password</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" type="password" name="password" placeholder="Password" aria-label="password" required>
                        </div>
                        <div class="mt-4 items-center flex justify-between">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-gray-800 rounded" type="submit">Submit</button>
                        </div>
                    </form>

                    <div class="text-center">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
