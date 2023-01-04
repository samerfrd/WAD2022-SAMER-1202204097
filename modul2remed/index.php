<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<form method="POST">
  <input type="text" name="num1" placeholder="Number 1">
  <input type="text" name="num2" placeholder="Number 2">
  <select name="operator">
    <option>None</option>
    <option>Tambah</option>
    <option>Kurang</option>
    <option>Kali</option>
    <option>Bagi</option>
  </select>
  <br>
  <button type="submit" name="submit" value="submit">Calculate</button>
</form>

<?php
if (isset($_POST['submit'])) {
  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $operator = $_POST['operator'];
  
  switch ($operator) {
    case "None":
      echo "You must select an operator!";
      break;
    case "Tambah":
      echo $num1 + $num2;
      break;
    case "Kurang":
      echo $num1 - $num2;
      break;
    case "Kali":
      echo $num1 * $num2;
      break;
    case "Bagi":
      echo $num1 / $num2;
      break;
  }
}









