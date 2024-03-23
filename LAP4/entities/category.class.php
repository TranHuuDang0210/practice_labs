/* The Category class in PHP defines properties and methods for managing category data in a database,
including saving new categories and retrieving a list of existing categories. */
<?php
// Including the database class file
require_once("config/db.class.php");

// Defining a class named 'Category'
class Category
{
    // Public properties to store category data
    public $cateId;
    public $cateName;
    public $cateDes;

    // Constructor method to initialize category properties
    public function __construct($cate_name, $cate_des)
    {
        $this->cateName = $cate_name;
        $this->cateDes = $cate_des;
    }

    // Method to save category data to the database
    public function save()
    {
        // Creating a new instance of the 'Db' class for database operations
        $db = new Db();

        // Constructing the SQL query to insert category data into the database
        $sql = "INSERT INTO category (CategoryName, Description) VALUES ('$this->cateName', '$this->cateDes')";

        // Executing the SQL query using the 'query_execute' method from the 'Db' class
        $result = $db->query_execute($sql);

        // Returning the result of the query execution
        return $result;
    }

    // Method to retrieve a list of categories from the database
    public static function list_category()
    {
        // Creating a new instance of the 'Db' class for database operations
        $db = new DB();

        // Constructing the SQL query to select all categories from the database
        $sql = "SELECT * FROM category";

        // Executing the SQL query using the 'select_to_array' method from the 'Db' class
        $rs = $db->select_to_array($sql);

        // Returning the result set
        return $rs;
    }
}
?>
