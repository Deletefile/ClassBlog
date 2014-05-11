<?php
/* CLASS SITE */
class all{

var $host 	  = "localhost"; 
var $username = "";
var $password = "";
var $database = "";

public function connect() {
		mysql_connect($this->host,$this->username,$this->password) or die("Could not connect. " . mysql_error());
		mysql_select_db($this->database) or die("Could not select database. " . mysql_error());
	   
		}
public function login()	{
		$user = "";
		$pass =	"";
	if (($_POST["user"] == $user) and ($_POST["pass"] == $pass)){
		$_SESSION[""] = "";
		header("Location:admin.php");
		exit;				
		} 
	}

function write()	{
		if (isset ($_POST["titolo"], $_POST["articolo"],$_POST["pass"]) && trim ($_POST["titolo"]) && trim ($_POST["articolo"]) && trim($_POST["pass"])) {
		$title = mysql_real_escape_string($_POST['titolo']);
		
		$article = nl2br(htmlentities($_POST['articolo']));
		$article2 = mysql_real_escape_string($article);
		$pasta = $_POST['pass'];
		$pappa = "pass";
		$sql = "INSERT INTO articoli (art_titolo,art_articolo) VALUES ('$title','$article2')";
		if ($pasta == $pappa) {
		mysql_query($sql) or die (mysql_error());
		}else{
		echo 'Token errato!';
		} 
		}
		mysql_close();
	}
		
function category(){
		$category = htmlentities($_GET["cat"]);
		echo "Category->".htmlentities($_GET["cat"]).".";
		$sql = "SELECT * FROM articoli ORDER BY art_data DESC";
	$query = @mysql_query($sql) or die (mysql_error());


if(mysql_num_rows($query) > 0){
  
  while($row = mysql_fetch_array($query)){
    
    $titolo = stripslashes($row['art_titolo']);
    $articolo = stripslashes($row['art_articolo']);
    $all = '<div id="article"><h3>'.$titolo.'</h3>'.'<br>'.$articolo.'</div>';
    echo $all;
     
  } 
}else{
  
  echo "Nothing in the database";
}
}
}
?>
