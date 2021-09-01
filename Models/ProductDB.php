<?php 
namespace Model;

class ProductDB
{
	public $connection;
	public function __construct($connection)
	{
		$this->connection = $connection;
	}

	public function create($product){
		$sql =" INSERT INTO `product` (name, price, amount, intro, `date`,id_item) VALUES (?,?,?,?,?,?) ";
		$statement = $this->connection->prepare($sql);
		$statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->amount);
        $statement->bindParam(4, $product->intro);
        $statement->bindParam(5, $product->date);
        $statement->bindParam(6, $product->id_item);
        return $statement->execute();
	}

	public function get_items(){
		$sql = "SELECT * FROM items";
		$statement = $this->connection->prepare($sql);
        $statement->execute();
		$result = $statement->fetchAll();
		$items = [];

		foreach($result as $row){
			$item = new Items($row['name']);
			$item->id = $row['id'];
			$items[] = $item;
		}

		return $items;
	}

	public function getAll(){
		$sql = "SELECT product.*,items.name as 'item_name' FROM product JOIN items ON product.id_item = items.id";
		$statement = $this->connection->prepare($sql);
		$statement->execute();
        $result = $statement->fetchAll();
        $products = [];
         foreach ($result as $row) {
           $product = new Product($row['name'],$row['price'],$row['amount'], $row['intro'], $row['date'], $row['item_name']);
           $product->id = $row['id'];
           $products[] = $product;
        }

        return $products;
	}

	public function get($id){
		$sql = "SELECT product.*,items.name as 'item_name' FROM product JOIN items ON product.id_item = items.id WHERE product.id = ?";

		$statement = $this->connection->prepare($sql);
		$statement->bindParam(1, $id);
		$statement->execute();
		$row = $statement->fetch();

		$product = new Product($row['name'],$row['price'],$row['amount'], $row['intro'], $row['date'], $row['id_item']);
		$product->id = $row['id'];
		return $product;


	}
	public function delete($id){
		$sql = "DELETE FROM product WHERE id = ?";
		$statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
	}

	public function update($id, $product){
		$sql = "UPDATE product SET name = ?, price = ?, amount = ?, intro = ?, 'date' = ?, id_item = ? WHERE id = ? ";
		$statement = $this->connection->prepare($sql);
		$statement->bindParam(1, $product->name);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->amount);
        $statement->bindParam(4, $product->intro);
        $statement->bindParam(5, $product->date);
        $statement->bindParam(6, $product->id_item);
        $statement->bindParam(7, $id);
        return $statement->execute();
	}


	
}


 ?>