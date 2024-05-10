<?php

require '../core/Controller.php';
require '../models/ProductManager.php';

class ProductController extends Controller
{
    private ProductManager $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
    }

    public function index()
    {
        $products = $this->productManager->getAllProducts();
        $total = $this->productManager->countTotal();
        $nbPerPage = $this->productManager->getNbPerPage();
        $page = $this->productManager->getPage();

        $this->render('product/index.html.php', [
            'title' => 'Test d\'affichage des produits',
            'recordset' => $products,
            'total' => $total,
            'nbPerPage' => $nbPerPage,
            'page' => $page,

        ]);
    }

    public function search()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $searchTerm = $this->productManager->getSearchTerm();
            $searchResults = $this->productManager->searchProduct($searchTerm);
            $this->render('product/search-results.html.php', [
                'title' => 'Résultats de la recherche : ',
                'searchTerm' => $searchTerm,
                'searchResults' => $searchResults,
            ]);
            var_dump($searchResults);
        }
    }
}
