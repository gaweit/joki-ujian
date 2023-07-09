<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Order Page</title>
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <?php
    session_start();

    // Cek jika session order tidak tersedia, inisialisasi session
    if (!isset($_SESSION['order'])) {
        $_SESSION['order'] = array();
    }

    // Cek jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mendapatkan data dari form
        $foodCode = $_POST['food_code'];
        $foodName = $_POST['food_name'];
        $foodPrice = $_POST['food_price'];
        $foodPhotoUrl = $_POST['food_photo_url'];

        // Membuat array item makanan
        $foodItem = array(
            'code' => $foodCode,
            'name' => $foodName,
            'price' => $foodPrice,
            'photo_url' => $foodPhotoUrl
        );

        // Menambahkan item makanan ke dalam session
        $_SESSION['order'][] = $foodItem;
    }
    ?>

    <div class="container-input">
        <div class="form-container">
            <form method="POST" action="index.php" class="login-form">

                <h2>Order Form</h2>
                <div>
                    <label for="food_code">Food Code:</label>
                    <input type="text" id="food_code" name="food_code" class="form-control" required>
                </div>
                <div>
                    <label for="food_name">Food Name:</label>
                    <input type="text" id="food_name" name="food_name" class="form-control" required>
                </div>
                <div>
                    <label for="food_price">Food Price:</label>
                    <input type="number" id="food_price" name="food_price" class="form-control" required>
                </div>
                <div>
                    <label for="food_photo_url">Food Photo URL:</label>
                    <input type="text" id="food_photo_url" name="food_photo_url" class="form-control" required>
                    <br>
                </div><button type="submit" class="btn btn-primary">Simpan </button>
            </form>
            <br>
            <div align="center">
                <a href="order.php"><button type="" class="btn btn-primary">Page Order -></button></a>
            </div>
        </div>