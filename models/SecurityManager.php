<?php

require '../config/MySQLConnector.php';

class SecurityManager
{
    private $db;


    public function __construct()
    {
        $this->db = (new MySQLConnector())->getConnection();
    }

    public function adminConnect()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $sql = "SELECT * FROM table_admin WHERE admin_login = :login";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([":login" => $_POST['login']]);
            if ($row = $stmt->fetch()) {
                if (password_verify($_POST['password'], $row['admin_password'])) {
                    session_start();
                    $_SESSION["user_connected"] = "ok";
                    $_SESSION['user_id'] = $row['admin_id'];
                    $_SESSION['token'] = md5(random_int(0, 100000)) . date("ymdhis");
                    header("Location: ?controller=home&action=index");
                    session_start();
                    exit();
                }
            }
        }
    }
}
