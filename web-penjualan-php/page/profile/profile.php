<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Sertakan file CSS Anda di sini -->
    <title>Full Page Card</title>
</head>
<style>
body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    /* Mengisi seluruh tinggi viewport */
    background-color: #f0f0f0;
    /* Atur warna latar belakang sesuai keinginan Anda */
}

.card {
    width: 500px;
    /* Atur lebar card sesuai keinginan Anda */
    padding: 20px;
    background-color: white;
    /* Atur warna latar belakang card sesuai keinginan Anda */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    /* Atur bayangan card sesuai keinginan Anda */
    border-radius: 8px;
    /* Membuat sudut card terlihat lebih lembut */
    text-align: center;
}

.rounded-thumbnail {
    height: 300px;
    width: 300px;
    border-radius: 50%;
    /* Membuat gambar menjadi bulat */
    object-fit: cover;
    /* Menghindari distorsi gambar jika ukuran tidak sesuai */
}

.full-width {
    width: 100%;
    /* Mengisi seluruh lebar card */
    box-sizing: border-box;
    /* Menghindari penambahan margin dan padding */
}
</style>

<body>
    <div class="card">
        <h1>Ralita</h1>
        <center>
            <p><img class="rounded-thumbnail" style="height: 300px;" src="images/employee2.png" alt="Employee Image" />
            </p>
        </center>
        <p><button class="btn btn-warning full-width">Update Profile</button></p>
        <p><button class="btn btn-danger full-width">Go Back</button></p>
    </div>

</body>

</html>