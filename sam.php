<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "sam";

if (isset($_POST['insert'])) {
    $medicinename = $_POST['medicinename'];
    $Manufacturer = $_POST['Manufacturer'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $Expiry_Date = $_POST['Expiry_Date'];
    $Stock_Quantity = $_POST['Stock_Quantity'];

    $conn = new mysqli($host, $user, $password, $db_name);
    if ($conn->connect_error) {
        die('Connection failed: ' .$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO md(medicinename, Manufacturer, Description, Price, Expiry_Date, Stock_Quantity) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sssisi", $medicinename, $Manufacturer, $Description, $Price, $Expiry_Date, $Stock_Quantity);

        if ($stmt->execute()) {
            echo "Insertion successful...!";
        } else {
            echo "Error occurred during insertion: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} 
?>
