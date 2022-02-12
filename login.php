<?php
session_start();
class login
{
    public function conn()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=finalproject", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn = $conn;
        return $conn;
    }


    public function loginUser()
    {
        $userData = $_POST;
        $mail = $userData["mail"];
        $conn = $this->conn();
        $stmt = $conn->prepare("SELECT * FROM users WHERE mail='$mail';");
        $stmt->execute();
        $user = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetch();

        if (password_verify($userData["password"], $user["password"])) {
            echo "warmatebit gaiare registracia";
            $_SESSION['loginback'] = true;
            $_SESSION["user"] = $user;
            print_r($_SESSION["user"]);
            echo "<br>";
            return header("location:index.php?succsess=წარმატებით გაიარეთ ავტორიზაცია!");
        } else {
            echo "error";
            $_SESSION['loginback'] = false;
            return header("location:index.php?error");
        }
        $conn = null;
    }

    // function insterAuthKey($authKey, $userId)
    // {
    //     $conn = $this->conn();

    //     $sql = "UPDATE users SET auth_key='$authKey' WHERE id=$userId limit 1";

    //     // Prepare statement
    //     $stmt = $conn->prepare($sql);

    //     // execute the query
    //     $stmt->execute();

    //     $conn = null;
    // }
}


$login = new Login();
$login->conn();
$login->loginUser();
