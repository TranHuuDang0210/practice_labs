/* The 'staff' class extends the 'character' class and generates staff codes for staff members with
specific parts. */
<?php
// Including the 'character.php' file which contains the base class 'character'
require_once("character.php");

// Defining a new class 'staff' which extends the 'character' class
class staff extends character
{
    // Declaring private properties for 'staffcode' and 'part'
    private $staffcode;
    private $part;

    // Constructor method to initialize properties
    public function __construct($fullname_staff, $countrycode, $part)
    {
        // Calling the constructor of the parent class 'character'
        parent::__construct($fullname_staff, $countrycode);

        // Initializing the 'part' property
        $this->part = $part;

        // Generating the staff code using the private method 'staffcode_continue'
        // and assigning it to the 'staffcode' property
        $this->staffcode = $this->staffcode_continue();
    }

    // Getter method for 'staffcode'
    public function get_staffcode()
    {
        return $this->staffcode;
    }

    // Getter method for 'part'
    public function get_part()
    {
        return $this->part;
    }

    // Private method to generate and continue staff codes
    final private function staffcode_continue()
    {
        // Declaring a static variable named 'makecode' and initializing it to 1
        static $makecode = 1;

        // Returning the current value of 'makecode' and then incrementing it by 1
        return $makecode++;
    }
}
?>
