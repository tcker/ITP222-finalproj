<!-- <!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow max-w-md w-full">
        <h2 class="text-2xl font-bold mb-4 text-center">Forgot Password</h2>
        <form action="index.php?uri=handle-forgot" method="POST" class="space-y-4">
            <div>
                <label class="block mb-1">Enter your email</label>
                <input type="email" name="email" required class="w-full border p-2 rounded" />
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Send Reset Link</button>
        </form>
    </div>
</body>
</html> -->

<h2>Forgot Password</h2>
<form action="index.php?uri=handle-forgot" method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <button type="submit">Send Reset Link</button>
</form>
