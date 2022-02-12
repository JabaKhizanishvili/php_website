<?php
class addProd
{
    public function __construct($name = "", $price = "", $img = "", $cat = 1)
    {
        $this->name = $name;
        $this->price = $price;
        $this->img = $img;
        $this->cat = $cat;
        $this->conn();
    }

    public function conn()
    {
        $conn = new PDO("mysql:host=localhost;dbname=finalproject", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    public function getdata()
    {
        $conn = $this->conn();
        $stmt = $conn->prepare("SELECT * FROM orders WHERE 1;");
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($orders);
    }

    public function addimg()
    {
        $target_dir = "./assets/images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

class insertdb extends addProd
{
    public function insertProd()
    {
        $conn = $this->conn();
        $stmt = $conn->prepare("INSERT INTO products (name, price, img, products_category)
        VALUES (:name, :price, :img, :products_category)");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':img', $this->img);
        $stmt->bindParam(':products_category', $this->cat);
        $stmt->execute();
    }
}
$name = $_POST["name"];
$price = $_POST["price"];
$cat = $_POST["cat"];
$img = $_FILES['fileToUpload']['name'];

$addprod = new AddProd($name, $price, $img);
$addprod->addimg();
$insert = new insertdb($name, $price, $img);
$insert->insertProd();

return header("location:index.php");
