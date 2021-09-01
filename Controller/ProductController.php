<?php 
namespace Controllers;
use function Couchbase\defaultDecoder;
use Model\Product;
use Model\ProductDB;
use Model\DBconnection;
use Model\Items;

class ProductController
{
	public $ProductDB;
	public function __construct(){
		$connection = new DBConnection("mysql:host=localhost;dbname=product_1", "root", "");
		$this->ProductDB = new ProductDB($connection->connect());
	}

	public function add(){
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$items = $this->ProductDB->get_items();
			include 'Views/add.php';
		} else {
			$date = date('Y-m-d');
			$product = new Product($_POST['name'], $_POST['price'], $_POST['amount'], $_POST['intro'], $date , $_POST['id_item']);
			$this->ProductDB->create($product);
			header('Location: index.php');
		}
	}

	public function getAll(){
		$products = $this->ProductDB->getAll();
		include 'Views/list.php';
	}

	public function delete(){
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$id = $_GET['id'];
			$product = $this->ProductDB->get($id);
			include 'Views/delete.php';
		} else {
			$id = $_POST['id'];
			$this->ProductDB->delete($id);

			header('Location: index.php');
		}
	}

	public function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$id = $_GET['id'];
			$product = $this->ProductDB->get($id);
			$items = $this->ProductDB->get_items();
			include 'Views/edit.php';
		} else {
			$id = $_GET['id'];
			$date = date('Y-m-d');
			$product = new Product($_POST['name'], $_POST['price'], $_POST['amount'], $_POST['intro'], $date , $_POST['id_item']);
			$this->ProductDB->update($id, $product);
			header('Location: index.php');
		}
	}




}



?>