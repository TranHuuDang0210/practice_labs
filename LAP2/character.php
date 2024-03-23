/* The PHP class named 'character' has private properties for 'fullname' and 'countrycode', a
constructor method to initialize these properties, and getter methods to retrieve their values. */
<?php

// Define a PHP class named 'character'
class character
{
    // Declare private properties for 'fullname' and 'countrycode'
    private $fullname;
    private $countrycode;

    // Constructor method to initialize 'fullname' and 'countrycode' properties
    public function __construct($fullname, $countrycode)
    {
        // Assign the provided values to the properties
        $this->fullname = $fullname;
        $this->countrycode = $countrycode;
    }

    // Getter method for 'fullname' property
    public function get_fullname()
    {
        // Return the value of 'fullname'
        return $this->fullname;
    }

    // Getter method for 'countrycode' property
    public function get_countrycode()
    {
        // Return the value of 'countrycode'
        return $this->countrycode;
    }
}

?>
