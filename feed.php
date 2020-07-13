<!Doctype html>
<html>
<head>
<style>
.nav{
	width:100%;
	background:#000033;
	height:100px;
	margin-top:0%;
}
ul{
	list-style:none;
	padding:0;
	margin:0;
	position:top;
}
li{
	float:left;
	margin-top:30px;
}
a{
	width:150px;
	color:white;
	display:block;
	text-decoration:none;
	font-size:20px;
	text-align:center;
	padding:10px;
	border-radius:10px;
	font-family:century gothic;
	font-weight:bold;
}
a:hover{
	background:#ffcccc;
	trasition:0.6s;
}
</style>
</head>
<title>Gujarat Tourism-FEEDBACK</title>
<table align="left" cellpadding="5px">

<tr>
<td><img src= "1.jpg" width="90%" height="80px" alt="image" /> </td>
<td></td>

<td><h1><font face="italic" color="#663366">GUJARAT TOURISM <br> FEEDBACK</font></h1></td>
</tr>
</table>

<br><br><br>
<br>
<br>

<table cellpadding="20px">
<tr>
<td><a href="index1.php"><font color="marroon">HOME</font></a></td>
<td><a href="destination.html"><font color="maroon">DESTINATION</font></a></td>
<td><a href="hotel.html"><font color="maroon">HOTEL</font></a></td>
<td><a href="about.html"><font color="maroon">ABOUT US</font></a></td>
</table>
<hr>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $siteErr  = "";
$name = $email = $site = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["site"])) {
    $siteErr = "status is required";
  } else {
    $site = test_input($_POST["site"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Your Feedback</h2>
<p><span class="error"><font color="red">* required field</font></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 <u> Name:</u> <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <u>E-mail:</u> <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
 <u> Comment:</u> <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
 <u> Like the site:</u>
  <input type="radio" name="site" <?php if (isset($site) && $site=="like") echo "checked";?> value="like the site">LIKE
  <input type="radio" name="site" <?php if (isset($site) && $site=="dislike") echo "checked";?> value="dislike the site">DISLIKE
  <input type="radio" name="site" <?php if (isset($site) && $site=="bad") echo "checked";?> value="I don't like the site">BAD
  <span class="error">* <?php echo $siteErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Response is here:</h2>";
echo $name ;
echo "<br>";
echo $email;
echo "<br>";
echo $comment;
echo "<br>";
echo $site;
?>


</body>
</html>