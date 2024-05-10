<?php
require '../config/MySQLConnector.php';

class ProductManager
{
    private $db;
    private $nbPerPage = 50;
    private $page = 1;
    private $searchTerm;

    public function __construct()
    {
        $this->db = (new MySQLConnector())->getConnection();
    }

    public function countTotal()
    {
        $sql = "SELECT COUNT(*) AS total FROM table_product";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $total = $row['total'];
        return $total;
    }

    public function getAllProducts()
    {
        if (isset($_GET['p']) && $_GET['p'] > 0) {
            $this->page = $_GET['p'];

            $sql = "SELECT * FROM table_product LEFT JOIN table_type ON table_product.product_type_id = table_type.type_id ORDER BY product_name LIMIT :offset, :limit";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':offset', ($this->page - 1) * $this->nbPerPage, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $this->nbPerPage, PDO::PARAM_INT);
            $stmt->execute();
            $recordset = $stmt->fetchAll();
            return $recordset;
        }
    }

    public function searchProduct()
    {
        $this->searchTerm = $_POST['searchEngine'];
        if (isset($this->searchTerm)) {
            $search = '%' . $this->searchTerm . '%';
            $sql = "SELECT * FROM table_product WHERE product_name LIKE  :search";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':search', $search);
            $stmt->execute();
            $recordset = $stmt->fetchAll();
            return $recordset;
        }
    }
    /**
     * Get the value of nbPerPage
     */
    public function getNbPerPage()
    {
        return $this->nbPerPage;
    }

    /**
     * Set the value of nbPerPage
     */
    public function setNbPerPage($nbPerPage): self
    {
        $this->nbPerPage = $nbPerPage;

        return $this;
    }

    /**
     * Get the value of page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set the value of page
     */
    public function setPage($page): self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get the value of searchTerm
     */
    public function getSearchTerm()
    {
        return $this->searchTerm;
    }

    /**
     * Set the value of searchTerm
     */
    public function setSearchTerm($searchTerm): self
    {
        $this->searchTerm = $searchTerm;

        return $this;
    }
}
