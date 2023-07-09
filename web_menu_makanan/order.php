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

    <div class="container">
        <div class="absolute">
            <h1><b>Pilihanku:</b></h1>
            <div id="cartItems"></div>
            <div id="totalPrice"></div>

            <a href="index.php"><button class="btn btn-primary">Input Menu</button></a>
            <br>
            <br>
            <br>
            <form method="POST" action="">
                <input type="submit" class="btn btn-primary" name="hapus" value="Hapus Session">
            </form>
        </div>
        <div class="row">
            <?php 

    session_start();
    if (!empty($_SESSION['order'])) {
  foreach ($_SESSION['order'] as $item) {?>
            <div class="card">
                <img src="<?= $item['photo_url'];?>" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4><b><?= $item['name'];?></b></h4>
                    <p><?= 'Rp. '.$item['price']?></p>
                    <div align="center">
                        <button id="select-food" class="btn btn-warning"
                            onclick="addToCart('<?= $item['name'];?>', <?=$item['price']?>)">Order Now </button>
                    </div>
                </div>
            </div>
            <?php }}?>
        </div>
        <div class="container">

        </div>
        <?php if (isset($_POST['hapus'])) {
 
session_destroy();

}?>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
var shoppingCart = []; // Menyimpan data keranjang belanja

function addToCart(name, price) {
    var item = {
        name: name,
        // photo_url: photo_url,
        price: price
    };

    shoppingCart.push(item);
    displayCart();
}

function displayCart() {
    var cartItems = "";
    var totalPrice = 0;

    shoppingCart.forEach(function(item) {
        cartItems += "<div>" + item.name + " (Rp." + item.price + ")</div>";
        totalPrice += item.price;
    });

    $("#cartItems").html(cartItems);
    $("#totalPrice").text("Total: " + totalPrice);
}
</script>