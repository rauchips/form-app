<?php
$ID = 0;
$ID++;

$firstName = $lastName = $email = $gender = $age = $editor = "";

if(empty($_POST["firstName"])){
  $error_fn = "*****Please enter an your first name*****";
}

if(empty($_POST["lastName"])){
  $error_ln = "*****Please enter your last name*****";
}

if(empty($_POST["email"])){
  $error_email = "*****Please enter an email address*****";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error_email = "*****Please enter a valid email address*****";
}

if(empty($_POST["gender"])){
  $error_gender = "*****Please enter your gender*****";
}

if(empty($_POST["age"])){
  $error_age = "*****Please enter your age*****";
}else if ($_POST["age"] >= 100) {
  $error_age = "*****Age cannot be greater than 100*****";
}

if(empty($_POST["editor"])){
  $error_editor = "*****Please enter your choice of editor*****";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <style>
    table,
    th,
    td {
        border: 1px solid black;
    }
    </style>
</head>
<body>
  <h2>Register</h2>
  <form method="POST" action="index.php">  
    First Name: <input type="text" name="firstName" id="fistName">
    <br><br>
    <span><?php echo $error_fn; ?></span>
    <br><br>
    Last Name: <input type="text" name="lastName" id="lastName">
    <br><br>
    <span><?php echo $error_ln; ?></span>
    <br><br>
    E-mail: <input type="text" name="email" id="email">
    <br><br>
    <span><?php echo $error_email; ?></span>
    <span><?php echo $error_email_invalid; ?></span>
    <br><br>
    Gender:
    <select name="gender" id="gender">
      <option value="none" selected disabled hidden>Select an Option</option>
      <option value="male" id="male">Male</option>
      <option value="female" id="female">Female</option>
    </select>
    <br><br>
    <span><?php echo $error_gender; ?></span>
    <br><br>
    Age: <input type="text" name="age" id="age">
    <br><br>
    <span><?php echo $error_age; ?></span>
    <br><br>
    Code Editor of Choice:
    <input type="radio" name="editor" value="vim">Vim
    <input type="radio" name="editor" value="emacs">Emacs
    <input type="radio" name="editor" value="vs-code">VS-Code
    <input type="radio" name="editor" value="webstorm">Webstorm
    <input type="radio" name="editor" value="notepad">Notepad
    <br><br>
    <span><?php echo $error_editor; ?></span>
    <br><br>  
    <input type="submit" name="submit" value="Submit">  
  </form>
</body>
</html>

<?php
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $age = $_POST["age"];
  $editor = $_POST["editor"];


// Database Connection
$conn =  new mysqli('localhost', 'root', 'M@1lteg0', 'Form');
$sql = "SELECT * FROM users;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0){
  echo "<h2>Your Input:</h2>";
  echo "<h3>firstName</h3>";
  echo "<h3>lastName</h3>";
  echo "<h3>email</h3>";
  echo "<h3>gender</h3>";
  echo "<h3>lastName</h3>";
  echo "<h3>lastName</h3>";
  while ($row = mysqli_fetch_assoc($result)){
    echo $row['firstName']."<br>";
    echo $row['lastName']."<br>";
    echo $row['email']."<br>";
    echo $row['lastName']."<br>";
    echo $row['lastName']."<br>";
    echo $row['lastName']."<br>";
  }
}

	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users(firstName, lastName, email, gender, age, editor) values(?, ?, ?, ?, ?, ?);");
		$stmt->bind_param("sssssi", $firstName, $lastName, $email, $gender, $age, $editor);
		$execval = $stmt->execute();
		$stmt->close();
		$conn->close();
	}

?>