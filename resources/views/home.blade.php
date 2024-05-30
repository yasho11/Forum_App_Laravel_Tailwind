<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md space-y-8">
        <!-- Flash Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
            <!--The logout menu--->
        @auth
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <p class="mb-4">Congrats, you are logged in!</p>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Log Out</button>
                </form>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <!---Create Menu Post-->
                <h2>Create a New Post</h2>
                <form action="/create-post" method="POST">
                    @csrf
                    <div>
                        <label for="Title" class="block text-sm font-medium">Title</label>
                        <input name="title" type="text" placeholder="Title" required class="mt-1 p-2 w-full border rounded">
                    </div>
                    <div>
                        <label for="body" class="block text-sm font-medium">Body</label>
                        <textarea name="body" placeholder="Content here ....." required class="mt-1 p-2 w-full border rounded"></textarea>
                    </div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 mt-5">Create Post</button>
                </form>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <!---View Post-->
                <h2>All Posts</h2>
                @foreach ($posts as $post)
                <div class="bg-white p-6 rounded-lg shadow-lg text-center mt-6">
                    <h3> {{$post['title']}}</h3>
                    {{$post['body']}}
                </div>
                    
                @endforeach
            </div>
        @else
        <!--Login and register part-->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Register</h2>
                <form action="/register" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium">Name</label>
                        <input name="name" type="text" placeholder="Name" required class="mt-1 p-2 w-full border rounded">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input name="email" type="email" placeholder="Email" required class="mt-1 p-2 w-full border rounded">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium">Password</label>
                        <input name="password" type="password" placeholder="Password" required class="mt-1 p-2 w-full border rounded">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Register</button>
                </form>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Log In</h2>
                <form action="/login" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="loginemail" class="block text-sm font-medium">Email</label>
                        <input name="loginemail" type="email" placeholder="Email" required class="mt-1 p-2 w-full border rounded">
                    </div>
                    <div>
                        <label for="loginpassword" class="block text-sm font-medium">Password</label>
                        <input name="loginpassword" type="password" placeholder="Password" required class="mt-1 p-2 w-full border rounded">
                    </div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Login</button>
                </form>
            </div>
        @endauth
    </div>
</body>
</html>
