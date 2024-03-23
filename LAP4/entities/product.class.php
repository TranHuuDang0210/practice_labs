/* The class named 'Product' in PHP defines properties and methods to handle product data including
saving to the database and retrieving a list of products. */
<?php
// Including the database class file
require_once("config/db.class.php");

// Defining a class named 'Product'
class Product
{
    // Public properties to store product data
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    // Constructor method to initialize product properties
    public function __construct(
        $pro_name,
        $cate_id,
        $price,
        $quantity,
        $desc,
        $picture
    ) {
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
    }

    // Method to save product data to the database
    public function save()
    {
        // Creating a new instance of the 'Db' class for database operations
        $db = new Db();

        // Constructing the SQL query to insert product data into the database
        $sql = "INSERT INTO product (ProductName, CateID, Price, Quantity, Description, Picture) 
                VALUES ('$this->productName', '$this->cateID', '$this->price', '$this->quantity', '$this->description', '$this->picture')";

        // Executing the SQL query using the 'query_execute' method from the 'Db' class
        $result = $db->query_execute($sql);

        // Returning the result of the query execution
        return $result;
    }

    // Method to retrieve a list of products from the database
    public static function list_product()
    {
        // Creating a new instance of the 'Db' class for database operations
        $db = new DB();

        // Constructing the SQL query to select all products from the database
        $sql = "SELECT * FROM product";

        // Executing the SQL query using the 'select_to_array' method from the 'Db' class
        $rs = $db->select_to_array($sql);

        // Returning the result set
        return $rs;
    }
}
?>
