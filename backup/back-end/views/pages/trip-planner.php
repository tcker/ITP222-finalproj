<?php
include '../pages/navbar.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "compass_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$trip = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city = $conn->real_escape_string(trim($_POST['city'] ?? ''));
    $country = $conn->real_escape_string(trim($_POST['country'] ?? ''));

    $activities = isset($_POST['activities']) ? $_POST['activities'] : [];
    $info_type = isset($_POST['info_type']) ? $_POST['info_type'] : [];

    $activities_str = $conn->real_escape_string(implode(", ", $activities));
    $info_type_str = $conn->real_escape_string(implode(", ", $info_type));

    if (empty($city) || empty($country)) {
        $error = "Please fill in both City and Country.";
    } else {
        $sql = "INSERT INTO trips (city, country, activities, info_type) VALUES ('$city', '$country', '$activities_str', '$info_type_str')";

        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;

            $result = $conn->query("SELECT * FROM trips WHERE id = $last_id");
            $trip = $result->fetch_assoc();
        } else {
            $error = "Error saving trip: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Trip Planner</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-black px-8">

<main class="container mx-auto px-4 pt-20 pb-32 flex-grow">
    <h1 class="text-4xl font-extrabold text-white mb-8 text-center">Plan Your Next Adventure.</h1>

    <section class="bg-white rounded-xl shadow-lg p-6 mb-12 border border-gray-200">
        <p class="text-gray-800 leading-relaxed text-center text-lg mb-8">
            Either select a region on the map (placeholder) or type it into the fields below:
        </p>

            <div class="w-full h-64 rounded-lg overflow-hidden border border-gray-300 mb-8">
            <iframe
                class="w-full h-full"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15447.02539327398!2d120.9739234!3d14.6042007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca243c3e4bdf%3A0x3e68fc93f31b50ee!2sManila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1700000000000"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            </div>


        <?php if ($error): ?>
            <div class="mb-6 text-red-600 font-semibold text-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="#" method="POST" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-800 mb-2">City or closest major city:</label>
                    <input type="text" id="city" name="city" value="<?= isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '' ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#006699] focus:border-[#006699] sm:text-sm" placeholder="e.g., New York">
                </div>
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-800 mb-2">Country or Region:</label>
                    <input type="text" id="country" name="country" value="<?= isset($_POST['country']) ? htmlspecialchars($_POST['country']) : '' ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#006699] focus:border-[#006699] sm:text-sm" placeholder="e.g., USA">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-4">Tell us what kind of things you will be doing there:</label>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <?php
                    $activities_list = ['hiking', 'kayaking', 'fishing', 'mountain_biking', 'skiing', 'surfing'];
                    foreach ($activities_list as $activity) {
                        $checked = (isset($_POST['activities']) && in_array($activity, $_POST['activities'])) ? 'checked' : '';
                        $label = ucwords(str_replace('_', ' ', $activity));
                        echo "<div class='flex items-center'>
                                <input id='$activity' name='activities[]' type='checkbox' value='$activity' class='focus:ring-[#006699] h-4 w-4 text-[#006699] border-gray-300 rounded' $checked>
                                <label for='$activity' class='ml-2 block text-sm text-gray-800'>$label</label>
                            </div>";
                    }
                    ?>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-4">What kind of information do you want about this trip?</label>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <?php
                    $info_list = ['transportation', 'weather', 'political_info', 'health', 'gear', 'activity_specific'];
                    foreach ($info_list as $info) {
                        $checked = (isset($_POST['info_type']) && in_array($info, $_POST['info_type'])) ? 'checked' : '';
                        $label = ucwords(str_replace('_', ' ', $info));
                        echo "<div class='flex items-center'>
                                <input id='$info' name='info_type[]' type='checkbox' value='$info' class='focus:ring-[#006699] h-4 w-4 text-[#006699] border-gray-300 rounded' $checked>
                                <label for='$info' class='ml-2 block text-sm text-gray-800'>$label</label>
                            </div>";
                    }
                    ?>
                </div>
            </div>

            <div class="flex justify-center pt-4">
                <button type="submit" class="px-8 py-3 bg-[#006699] text-white font-semibold rounded-md shadow-md hover:bg-[#993300] transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-[#006699] focus:ring-offset-2">
                    Submit
                </button>
            </div>
        </form>
    </section>

    <?php if ($trip): ?>
        <section class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 max-w-lg mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center text-gray-900">Trip Receipt</h2>
            <p><strong>City:</strong> <?= htmlspecialchars($trip['city']) ?></p>
            <p><strong>Country:</strong> <?= htmlspecialchars($trip['country']) ?></p>
            <p><strong>Activities:</strong> <?= htmlspecialchars($trip['activities']) ?: 'None selected' ?></p>
            <p><strong>Info Requested:</strong> <?= htmlspecialchars($trip['info_type']) ?: 'None selected' ?></p>
            <p><strong>Submitted At:</strong> <?= $trip['created_at'] ?></p>
        </section>
    <?php endif; ?>
</main>

</body>
</html>

<?php
$conn->close();
?>
