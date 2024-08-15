<?php

require '../config/MySQLConnector.php';

class SecurityManager
{
    private PDO $db;

    public function __construct()
    {
        $this->db = (new MySQLConnector())->getConnection();
    }

    public function adminConnect(string $login, string $password): bool
    {
        $sql = "SELECT * FROM table_admin WHERE admin_login = :login";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":login" => $login]);

        if ($row = $stmt->fetch()) {
            if (password_verify($password, $row['admin_password'])) {
                session_start();
                $_SESSION["user_connected"] = "ok";
                $_SESSION['user_id'] = $row['admin_id'];
                $_SESSION['token'] = md5(random_int(0, 100000)) . date("ymdhis");
                return true;
            }
        }
        return false;
    }

    public function logout(): void
    {
        session_start();
        $_SESSION = [];
        session_destroy();
    }

}