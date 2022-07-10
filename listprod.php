<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
// Category parent class
abstract class Category {
  public $categoryName; // Can predefine a list of category names
  // Abstract constructor for Category
  public function __construct($categoryName){
    $this->categoryName = $categoryName;
  }
}
// Interface that contains all methods that product should have
interface productActions {
  public function add();
  public function edit();
  public function copy();
}

// Product class
class Product extends Category implements productActions{
  public $id;
  public $productName;
  public $imageLink;
  // Constructor for Product
  public function __construct($id, $productName, $categoryName, $imageLink){
    $this->categoryName = $categoryName;
    $this->productName = $productName;
    $this->id = $id;
    $this->imageLink = $imageLink;
  }
  // Function for product
  function get_id() {
    return $this->id;
  }
  function get_name() {
    return $this->productName;
  }
  function get_categoryName() {
    return $this->categoryName;
  }
  function get_imageLink() {
    return $this->imageLink;
  }
  function add(){

  }
  public function edit(){

  }
  public function copy(){

  }
}
// Connect to the database using 
//$db_connection = pg_connect("host=localhost dbname=clients user=username password=password");

$Product1 = new Product(1, 'Product1', 'Category1', 'https://png.pngtree.com/png-vector/20210604/ourmid/pngtree-gray-network-placeholder-png-image_3416659.jpg');
$Product2 = new Product(2, 'Product2', 'Category2', 'https://png.pngtree.com/png-vector/20210604/ourmid/pngtree-gray-network-placeholder-png-image_3416659.jpg');

?>
<div class="container">
<h1>Product</h1>
<div class="form-group">
<label for="search">Search for product</label>
<textarea class="form-control" id="search" rows="1"></textarea>
</div>
<div class="text-right">
  <i class="fas fa-plus" data-toggle="modal" data-target="#myModal"></i>
</div>
<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Product name</th>
    <th>Category</th>
    <th>Image</th>
    <th>Operations</th>
  </tr>
  <tr>
    <td><?php echo $Product1->get_id(); ?></td>
    <td><?php echo $Product1->get_name(); ?></td>
    <td><?php echo $Product1->get_categoryName(); ?></td>
    <td><img src=<?php echo $Product1->get_imageLink(); ?> alt="Image for product" width="100" height="100"></td>
    <td>
      <i class="fas fa-edit" data-toggle="modal" data-target="#myModal"></i>
      <i class="fas fa-minus-circle" data-toggle="modal" data-target="#myModal"></i>
      <i class="far fa-copy" data-toggle="modal" data-target="#myModal"></i>
      <i class="fas fa-eye" data-toggle="modal" data-target="#myModal"></i>
    </td>
  </tr>
  <tr>
    <td><?php echo $Product2->get_id(); ?></td>
    <td><?php echo $Product2->get_name(); ?></td>
    <td><?php echo $Product2->get_categoryName(); ?></td>
    <td><img src=<?php echo $Product2->get_imageLink(); ?> alt="Image for product" width="100" height="100"></td>
    <td>
      <i class="fas fa-edit" data-toggle="modal" data-target="#myModal"></i>
      <i class="fas fa-minus-circle" data-toggle="modal" data-target="#myModal"></i>
      <i class="far fa-copy" data-toggle="modal" data-target="#myModal"></i>
      <i class="fas fa-eye" data-toggle="modal" data-target="#myModal"></i>
    </td>
  </tr>
</table>
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Add new product</h2>
        </div>
        <div class="modal-body">
          <p>Product name</p>
          <div class="form-group">
            <textarea class="form-control" id="productname" rows="1"></textarea>
            <p class="text-secondary">We will never share your information with anyone else</p>
          </div>
          <p>Category</p>
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Open this select menu</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <form>
            <div class="form-group">
              <label for="image">Product Image</label>
              <input type="file" class="form-control-file" id="image">
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  
</div>
<nav aria-label="Page navigation example" class="text-center">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>

</body>
</html>