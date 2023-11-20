
<html>
    <head>
        <title>portfolio</title>
        <link rel="stylesheet" href="design.css">
    </head>
    <body>
        <div class="portfolio-container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "crud";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

           
           

            $query = "SELECT * FROM portfolio_data WHERE email = ? AND password = ?";
            $stmt = $conn->prepare($query);
            
            if ($stmt) {
                $stmt->bind_param("ss", $email, $password);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    
                    echo '<script>alert("Login successful. Welcome to the dashboard!");</script>';

                    // Display user details fetched from the database
                    echo '<div class="portfolio-entry">';
                    echo '<h2>' . $row['name'] . '</h2>';
                    echo '<p>Email: ' . $row['email'] . '</p>';
                    echo '<p>Phone: ' . $row['phone'] . '</p>';
                    echo '<p>About: ' . $row['about'] . '</p>';
                    echo '<p>Skills: ' . $row['skills'] . '</p>';
                    echo '<img src="data:' . $row['portfolio_image_type'] . ';base64,' . base64_encode($row['portfolio_image']) . '" alt="Portfolio Image">';
                    echo '<a class="download-resume" href="data:' . $row['resume_type'] . ';base64,' . base64_encode($row['resume']) . '" download>Download Resume</a>';
                    echo '</div>';
                    die(); 
                } else {
                    // User does not exist or invalid credentials
                    echo '<script>alert("Register First. You are being redirected to SignUp page!");</script>';
                    echo "<script>setTimeout(\"location.href = 'DataEntry.php';\", 2500);</script>";
                    die(); 
                }
            } else {
                // Error in prepared statement
                echo "Error in prepared statement.";
            }
            
            $stmt->close(); // Close the prepared statement
        }

        // Close the database connection when done
        $conn->close();
        ?>
        </div>
    </body>
    </html>
    
