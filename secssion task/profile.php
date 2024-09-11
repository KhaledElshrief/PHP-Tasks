<!DOCTYPE html>
<html lang="en" style="display:flex;justify-content:center;text-align:center">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
  <?php
  try {
      // Establishing database connection using PDO
      $connection = new PDO("mysql:host=localhost;dbname=test", "root", "");
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Set PDO error mode to exception
  } catch (PDOException $e) {
      die("Database connection failed: " . $e->getMessage());  // Handle the exception
  }

  $id = $_GET["id"];
  $name = htmlspecialchars($_GET["name"], ENT_QUOTES, 'UTF-8');  // Prevent XSS

  ?>

  <h1 style="color:rgb(106, 68, 2); text-align:center; margin:5px; font-weight: bold;"><?= $name ?> Profile</h1>

  <?php
  // Using prepared statements to prevent SQL Injection
  $str = "SELECT image FROM users WHERE id = :id";
  $query = $connection->prepare($str);
  $query->bindParam(':id', $id, PDO::PARAM_INT);  // Binding the parameter securely
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);

  if ($result) {
      $filename = $result["image"];
      $imageurl = "images/" . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8');  // Prevent XSS

      echo "<div>";
      echo "<img src='$imageurl' alt='image' style='max-width: 200px; max-height: 200px; border-radius:100px'>";
      echo "</div>";
  } else {
      echo "No image found for this user.";
  }
  ?>
</body>
</html>
