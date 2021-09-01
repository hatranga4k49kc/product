<?php 
namespace Model;

class Product
{
	public $id;
	public $name;
	public $price;
	public $amount;
	public $intro;
	public $date;
	public $id_item;

	public function __construct($name, $price, $amount, $intro, $date, $id_item){
		$this->name = $name;
		$this->price = $price;
		$this->amount = $amount;
		$this->intro = $intro;
		$this->date = $date;
		$this->id_item = $id_item;
	}
}




 ?>