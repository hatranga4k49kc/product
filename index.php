<?php 
require "Models/DBconnection.php";
require "Models/ProductDB.php";
require "Models/Items.php";
require "Models/Product.php";
require "Controller/ProductController.php";
use \Controllers\ProductController;


 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<?php 
			$controller = new ProductController();
			$page = isset($_REQUEST['page'])? $_REQUEST['page'] : NULL;
			switch ($page){
				case 'add':
				$controller->add();
				break;
        // case 'add':
        //     $controller->add();
        //     break;
        case 'delete':
            $controller->delete();
            break;
         case 'update':
            $controller->edit();
            break;
        //     case 'add_citizen':
        //     $controller_citizen->add_citizen();
        //     break;
        //     case 'infor':
        //     $controller_citizen->infor();
        //     break;
        //     case 'edit_citizen':
        //     $controller_citizen->editCitizen();
        //     break;
				default:
				$controller->getAll();
				break;
			}


 			

			?>
		</div>
	</div>
</body>
</html>