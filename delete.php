<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "sam";  


  if (isset($_POST['delete'])) {

    $medicinename = $_POST['medicinename'];

    $conn = new mysqli($host, $user, $password, $db_name);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("DELETE FROM md WHERE medicinename = ?");
        $stmt->bind_param("s", $medicinename);

        if ($stmt->execute()) {
            echo "Deletion successful...!";
        } else {
            echo "Error occurred during deletion: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>