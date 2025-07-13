<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form action="/PalmTrack/auth/login" method="post" class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl mb-6 text-center font-bold">Login</h2>
        <?php if (!empty($error)) : ?>
            <p class="text-red-600 text-sm mb-4 text-center"><?= $error ?></p>
        <?php endif; ?>
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" required class="w-full border px-3 py-2 rounded">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" required class="w-full border px-3 py-2 rounded">
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-700">Login</button>
    </form>
</body>
</html>
