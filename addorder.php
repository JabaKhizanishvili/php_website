<?php

include 'navbar.php';
// SELECT orders.id, products.name, products.price
// FROM orders
// INNER JOIN products ON orders.products_id = products.id
?>
<main style="height:100vh; width: 100%">
    <div class="container mt-5 pt-5">
        <?php
        $id = $_GET['id'];
        $conn = new PDO("mysql:host=localhost;dbname=finalproject", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM products where id = $id");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // print_r($products);
        // echo "user id : " . $_SESSION['user']['id'];
        ?>
    </div>



    <div class="card" style="max-width: 18rem; position:absolute; top:50%; left:50%; transform:translate(-50%,-40%)">
        <img class="card-img-top" src="./assets/images/<?php echo $products[0]['img'] ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $products[0]['name']; ?></h5>
        </div>
        <form action="buy.php" method="post">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex">ფასი : <div id="prodprice"> <?= $products[0]['price'] ?></div> ლარი
                </li>

                <li class="list-group-item">

                    <div class="d-flex justify-content-between align-items-center">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        რაოდენობა: <input id="quantity" name="quantity" style="width:40%; float:left;" type="number" value="1">
                        <!-- <input type="submit" value="gadadi"> -->
                    </div>


                </li>
            </ul>
            <div class="card-body d-flex align-items-center justify-content-between">
                <input type="submit" class="btn btn-primary" value="ყიდვა">
                ფასი : <div id="price"></div>
            </div>

        </form>

    </div>
</main>
<?php


include 'footer.php';
?>
<script>
    let sum = 0;
    let quantity = document.getElementById("quantity");
    let pricesum = document.getElementById("price")
    let price = document.getElementById("prodprice");
    quantity.addEventListener("change", function(e) {
        console.log(price.innerHTML, quantity.value);
        sum = price.innerHTML * quantity.value;
        console.log(pricesum)
        pricesum.innerHTML = sum + " ლარი";

        // pricesum.innerHTML = price.innerHTML * document.getElementById("quantity").innerHTML;
    })
    pricesum.innerHTML = price.innerHTML + " ლარი"
</script>