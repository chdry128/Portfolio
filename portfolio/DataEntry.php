<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio Data Form</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Portfolio Information Form</h2>
    <form action="backend.php" method="post" enctype="multipart/form-data">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br><br>
        

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="about">About Yourself:</label><br>
        <textarea id="about" name="about" rows="4" cols="50" required></textarea><br><br>

        <label for="portfolioImage">Upload Portfolio Image:</label>
        <input type="file" id="portfolioImage" name="portfolioImage" accept="image/*" required><br><br>

        <label for="resume">Upload Resume (PDF):</label>
        <input type="file" id="resume" name="resume" accept=".pdf" required><br><br>

        <label for="skills">Skills (comma-separated):</label><br>
        <input type="text" id="skills" name="skills" required><br><br>

        

        <input type="submit" value="Submit">
    </form>
</body>
</html>
