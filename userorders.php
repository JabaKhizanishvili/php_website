<?php
include 'navbar.php';

$id = $_SESSION['user']['id'];
$usertype = $_SESSION['user']['usertype'];

if ($usertype == 2) {
    $conn = new PDO("mysql:host=localhost;dbname=finalproject", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT orders.id, quantity, created_at as date, users.name as username, products.name as productname, products.price
    FROM ((orders
    INNER JOIN products ON orders.products_id = products.id)
    INNER JOIN users ON orders.users_id = users.id) WHERE users_id = $id ORDER BY orders.id ASC;");
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $conn = new PDO("mysql:host=localhost;dbname=finalproject", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT orders.id, quantity, created_at as date, users.name as username, products.name as productname, products.price
    FROM ((orders
    INNER JOIN products ON orders.products_id = products.id)
    INNER JOIN users ON orders.users_id = users.id) ORDER BY orders.id ASC");
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



?>
<main style="height:100vh; width: 100%">

    <?php
    echo $usertype;
    if ($usertype == 1) {
    ?>
        <div class="container w-75 mt-5 pt-5">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">order id</th>
                        <th scope="col">username</th>
                        <th scope="col">product</th>
                        <th scope="col">quantity</th>
                        <th scope="col">price</th>
                        <th scope="col">date</th>
                        <th scope="col">წაშალე</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($orders as $val) {
                        $id = $val['id'];
                    ?>
                        <tr>
                            <td><?= $val['id'] ?></td>
                            <td><?= $val['username'] ?></td>
                            <td><?= $val['productname'] ?></td>
                            <td><?= $val['quantity'] ?></td>
                            <td><?= $val['price'] * $val['quantity'] . " ლარი" ?></td>
                            <td><?= $val['date'] ?></td>
                            <td> <a href="delorder.php?id=<?= $id ?>" class="text-center"><i class="fas fa-times-circle text-danger"></i></a> </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    } else {
    ?>
        <div class="container w-75 mt-5 pt-5">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">order id</th>
                        <th scope="col">username</th>
                        <th scope="col">product</th>
                        <th scope="col">quantity</th>
                        <th scope="col">price</th>
                        <th scope="col">date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($orders as $val) {
                    ?>
                        <tr>
                            <td><?= $val['id'] ?></td>
                            <td><?= $val['username'] ?></td>
                            <td><?= $val['productname'] ?></td>
                            <td><?= $val['quantity'] ?></td>
                            <td><?= $val['price'] * $val['quantity'] . " ლარი" ?></td>
                            <td><?= $val['date'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>


</main>
<?php
include 'footer.php';
?>