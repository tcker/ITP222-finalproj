<!-- <!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow max-w-md w-full">
        <h2 class="text-2xl font-bold mb-4 text-center">Reset Password</h2>
        <form action="index.php?uri=handle-reset" method="POST" class="space-y-4">
            <div>
                <label class="block mb-1">New Password</label>
                <input type="password" name="password" required class="w-full border p-2 rounded" />
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Reset Password</button>
        </form>
    </div>
</body>
</html> -->

<h2>Reset Password</h2>
<form action="index.php?uri=handle-reset" method="POST">
    <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>">

    <label>New Password:</label><br>
    <input type="password" name="new_password" required><br><br>

    <button type="submit">Reset Password</button>
</form>
