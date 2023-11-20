<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="crud";

$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error()) ."<br>";
}


    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    $skills = $_POST['skills'];
    $password=$_POST['password'];



    $portfolioImage = $_FILES['portfolioImage']['tmp_name'];
    $resume = $_FILES['resume']['tmp_name'];

    // Read file contents
    $portfolioImageContent = file_get_contents($portfolioImage);
    $resumeContent = file_get_contents($resume);

    // Escape special characters in file content
   $Fphoto= $conn->real_escape_string($portfolioImageContent);
    $Fresume= $conn->real_escape_string($resumeContent);

    // Get file types
    $portfolioImageType = $_FILES['portfolioImage']['type'];
    $resumeType = $_FILES['resume']['type'];

    // SQL query to insert data into the database with BLOB content
    $sql = "INSERT INTO portfolio_data (name, email, phone, about, skills, portfolio_image, portfolio_image_type, resume, resume_type,password)
            VALUES ('$name', '$email', '$phone', '$about', '$skills', '$Fphoto', '$portfolioImageType', '$Fresume', '$resumeType','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

// Your database connection closing code comes here
?>