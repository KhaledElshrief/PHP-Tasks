<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login form</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
    if(isset($_GET["message"])){
      echo "<p style='text-align:center;font-size:30px;color:red'>$_GET[message]</p>";
    }
  ?>
<div class="container">

<form action="server.php" method="post">
  <h2>Login form</h2>
<input type="email" name="email" id="email" placeholder="email">
<input type="password" name="password" id="password" placeholder="password">
<input type="submit" value="submit" name="login">
</form>
</div>


</body>
</html>