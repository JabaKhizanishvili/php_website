<?php

print_r($_POST);
$name = $_POST['name'];
$price = $_POST['price'];
$id = $_POST['id'];
$img = $_FILES['fileToUpload']['name'];
echo $img;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalproject";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE products SET products.name = '$name', products.price = '$price', products.img = '$img' WHERE id= $id";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
return header("location:index.php");
