/* The class 'member' in the PHP code defines properties for a member's full name, email, and a unique
member ID generated using a function, with getter methods for accessing these properties. */
<?php
// Including the 'hotro.php' file which contains the 'idcontinue' function
require_once("hotro.php");

// Defining a new class 'member'
class member
{
    // Declaring private properties for 'fullname', 'email', and 'idmember'
    private $fullname;
    private $email;
    private $idmember;

    // Constructor method to initialize properties
    public function __construct($fullname, $email)
    {
        // Assigning the provided values to 'fullname' and 'email' properties
        $this->fullname = $fullname;
        $this->email = $email;

        // Generating a unique id for the member using the 'idcontinue' function
        $this->idmember = idcontinue();
    }

    // Destructor method to clean up object when it's destroyed
    public function __destruct()
    {
        // Setting properties to NULL to release memory
        $this->fullname = NULL;
        $this->email = NULL;
        $this->idmember = NULL;
    }

    // Getter method for 'fullname'
    public function get_fullname()
    {
        return $this->fullname;
    }

    // Getter method for 'email'
    public function get_email()
    {
        return $this->email;
    }

    // Getter method for 'idmember'
    public function get_id()
    {
        return $this->idmember;
    }
}
?>
