/* The class named 'Db' in PHP establishes a database connection, executes query statements, and
fetches results into an array. */
<?php
// Define a class named 'Db'
class Db
{
    // Database connection variable
    protected static $connection;

    // Connection initialization function
    public function connect()
    {
        // Establishing a connection to the database
        $connection = mysqli_connect(
            "localhost", // Hostname
            "root",      // Username
            "",          // Password (empty for localhost)
            "demo_lap3"  // Database name
        );

        // Setting character set to UTF-8
        mysqli_set_charset($connection, 'utf8');

        // Check if connection was successful
        if (mysqli_connect_errno()) {
            echo "Database connection failed: " . mysqli_connect_error();
        }

        // Return the connection object
        return $connection;
    }

    // Function to execute query statement
    public function query_execute($queryString)
    {
        // Initialize connection
        $connection = $this->connect();

        // Execute query using mysqli's query function
        $result = $connection->query($queryString);

        // Close the connection
        $connection->close();

        // Return the result of the query execution
        return $result;
    }

    // Function to fetch results into an array
    public function select_to_array($queryString)
    {
        // Initialize an empty array to store rows
        $rows = array();

        // Execute the query
        $result = $this->query_execute($queryString);

        // Check if result is false
        if ($result == false) return false;

        // Loop through each row and append it to the $rows array
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }

        // Return the array of rows
        return $rows;
    }
}
?>
