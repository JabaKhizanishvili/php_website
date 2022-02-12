<?php
session_start();
$errors = [];
$usersdata = $_POST;

class valideteInput
{
    public $err;
    public function __construct($name = "", $password = "", $rpassword = "", $mail = "")
    {
        $this->username = $name;
        $this->password = $password;
        $this->rpassword = $rpassword;
        $this->mail = $mail;
    }


    public function validate()
    {
        if (strlen($this->username) >= 8 && strlen($this->password) >= 8 && $this->rpassword == $this->password) {
            $_SESSION['back'] = true;
            $this->err = true;
            return header("location:index.php?succsess=წარმატებით გაიარეთ რეგისტრაცია!");
        } else {
            $this->err = false;
            if (strlen($this->username) < 8) {
                $errors["user"] = "username must be at least 8 characters";
            }
            if (strlen($this->password) < 8) {
                $errors["pass"] = "password must be at least 8 characters";
            }
            if ($this->rpassword != $this->password) {
                $errors["match"] = "Passwords do not match";
            }
            $text = http_build_query(["errors" => $errors]);

            return header("location:index.php?" . $text);
        }
    }
}

$jaba = new valideteInput($usersdata['username'], $usersdata['password'], $usersdata['rpassword'], $usersdata['mail']);
$jaba->validate();

class users extends ValideteInput
{
    public $conn = null;

    public function db_connection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "finalproject";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }


    public function getUsers()
    {
        $conn = $this->db_connection();
        $stmt = $conn->prepare("SELECT * FROM users");

        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();

        return $result;
    }
}

$a = new users();

class insertUser extends users
{
    public function insert()
    {
        $user_type = 2;
        $this->validate();
        $pass = password_hash($this->password, PASSWORD_BCRYPT);
        if ($this->err == 1) {
            $conn = $this->db_connection();
            $stmt = $conn->prepare("INSERT INTO users (name, mail, password, usertype)
        VALUES (:name, :mail, :password, :usertype)");
            $stmt->bindParam(':name', $this->username);
            $stmt->bindParam(':mail', $this->mail);
            $stmt->bindParam(':password', $pass);
            $stmt->bindParam(':usertype', $user_type);
            $stmt->execute();
        }
    }
}

$insert = new insertUser($usersdata['username'], $usersdata['password'], $usersdata['rpassword'], $usersdata['mail']);
$insert->insert();
