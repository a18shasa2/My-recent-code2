<?php 
	require ("logincheck.php");    

	$ID_check = $_GET['id'];
	$emailss21 = $_SESSION["email"];

    require_once "dbconfig_website.php";
		$select_stmt=$db->prepare("SELECT * FROM winwinproduct WHERE product_id=$ID_check");	
		$select_stmt->execute();
		while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
		{
         $product_name_extract = $row['product_name'];
         $product_desc_extract = $row['product_desc'];
         $product_image_extract = $row['product_image'];
         $product_reward_extract = $row['product_reward'];
         $product_email_extract = $row['email'];
        }

      if ($emailss21 != $product_email_extract){
          header("Location: annonser.php");
          exit();
      }
                
    if (isset($_POST["register"])) {
        $connection = new mysqli("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");

		$titel = $connection->real_escape_string($_POST["titel"]);  		
		$forklaring = $connection->real_escape_string($_POST["forklaring"]);  		  	
		$email = $connection->real_escape_string($_SESSION["email"]);  
		$utbyte = $connection->real_escape_string($_POST["utbyte"]); 
        $plan = 1;
       

        if(isset($_FILES['image'])){
              $errors= array();
              $file_name = $_FILES['image']['name'];
              $file_path = "uploaded_files/" . $file_name; 
              if ($file_name == "") { 
              $file_path = $product_image_extract;
              }
              $file_size = $_FILES['image']['size'];
              $file_tmp = $_FILES['image']['tmp_name'];
              $file_type = $_FILES['image']['type'];
              $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
              $file_name_lower = strtolower($_FILES['image']['name']);

              $expensions= array("jpeg","jpg","png");

              if(in_array($file_ext,$expensions)=== false){
                 $errors1="This extension not allowed. Please choose a JPEG or PNG file.";
                 // OR "success"
              }

              if($file_size > 20971522) {
                 $errors1='File size must be excately 2 MB';
                // OR "success" or file 2097152
              }

           }
      
      

        if ($titel != "" && $forklaring != "" && $email != "" && $utbyte != "") { 
        
        //users specific to language. CHANGE this.
		//$dataq = $connection->query("INSERT INTO winwinproduct_se (firstName, lastName, email, password, plan, regDate) VALUES ('$firstName', '$lastName', '$email', '$password', '$plan', '$date_current')");

         if ($file_name == "") {
			if(empty($errors)==true) {
                 move_uploaded_file($file_tmp,"uploaded_files/".$file_name_lower);
                 $laddar_upp_good = "Klart! Filen har nu laddats upp!";
              }
              }

           if ($file_name != "") {
              for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
               $uploadDir = "uploaded_files/";
               $ext = substr(strrchr($_FILES['image']['name'][$i], "."), 1); 

               // generate a random new file name to avoid name conflict
               $fPath = md5(rand() * time()) . ".$ext";
               $fPath_new = $fPath . $file_name_lower;

               $file_path = $uploadDir . $fPath_new;

               $result = move_uploaded_file($file_tmp, $uploadDir . $fPath_new);
              }
              }

		$data = $connection->query("UPDATE winwinproduct SET product_name='$titel', product_reward='$utbyte', product_image='$file_path', product_desc='$forklaring', plan='$plan', email='$email' WHERE email='$emailss21' && product_id='$ID_check'");

    	if ($data === false)
        	echo "Connection error!";
    	else
    	   echo "Your have been signed up - please now Log In";
           header("Location: uppdaterat_annons.php");
		   exit();
	}
      
        else{ 
            $emptyvar = "Du har inte fyllt i hela formuläret. Försök igen!";
            }  
            
    }    

 session_start();
  if (!isset($_SESSION["email"]) || !isset($_SESSION["loggedIn"])) {
			$target = "Logga in";
            $link = "logga_in.php"; 
            $target_other = "Skapa konto";
            $link_other = "skapa_konto.php";     
                
	}

    else {  
        $target = "Inloggad";
        $link = "admin.php"; 
        $target_other = "Logga ut";
        $link_other = "logout.php";  
        }

?>

<!doctype html>
<html lang="sv">
  <head>
    <meta charset="utf-8">
    <title>WEBSITE</title>
    <link rel="stylesheet" href="../../dropdown.css" type="text/css">
    <link rel="stylesheet" href="../../skapa_konto_layout.css" type="text/css">
	
    <!-- Bootstrap core CSS -->
	<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<style>
   /*buttons*/
         .button{background:transparent;border:1px solid rgba(0,0,0,.25);border-radius:4px;box-sizing:border-box;color:rgba(0,0,0,.6)!important;display:block;font-size:13px;font-weight:600;line-height:40px;padding:0 2em;text-align:center;text-transform:uppercase}p .button{margin:5px 0}.button:not(.button--cta):not(.button--more):hover{border-color:rgba(0,0,0,.35)}.-inverse .button:not(.button--cta):not(.button--more),.button:not(.button--cta):not(.button--more).-inverse{background:transparent;border-color:#fff;color:#fff!important}.-inverse .button:not(.button--cta):not(.button--more):hover,.button:not(.button--cta):not(.button--more).-inverse:hover{border-color:#f0f0f0;color:#f0f0f0!important}.button svg{fill:rgba(0,0,0,.3);display:inline;margin:-3px 4px 0 0;vertical-align:middle}.button--cta{background-color:#63cc98;border-color:transparent;color:#fff!important}.button--cta:disabled{color:hsla(0,0%,100%,.5)!important}.button--cta:hover{background-color:#37a08e}.button--more{background-color:#7db9d8;border-color:transparent;color:#fff!important;display:inline-block;text-transform:none}.button--more:hover{background-color:#75b5d6}.button--menu{line-height:32px;padding:0 0.5em}.button--alternative{background-color:#2e4b64;border-color:transparent;color:#fff!important;display:inline-block;text-transform:none}.button--block{display:block;width:100%}@media screen and (min-width:960px){.button:not(.button--block){display:inline-block;margin-right:10px}}
    .button--menu123{line-height:32px;padding:0 0.2em}
    .button--menu123:hover{background-color:gainsboro}
        
    .indent {
    margin-left: 250px;
    margin-right: 270px;
}  
            .indent2 {
    margin-left: 100px;
}   
	.cover-container {
	  max-width: 42em;
	}
	.masthead {
	  margin-bottom: 2rem;
	}
	.masthead-brand {
	  margin-bottom: 0;
	}
	.nav-masthead .nav-link {
	  padding: .25rem 0;
	  font-size: 1.6rem;
	  font-weight: 700;
	  color: #000;
	  background-color: transparent;
	  border-bottom: .25rem solid transparent;
	}
	.nav-masthead .nav-link:hover,
	.nav-masthead .nav-link:focus {
	  border-bottom-color: #000;
	}
	.nav-masthead .nav-link + .nav-link {
	  margin-left: 2.5rem;
	}
	.nav-masthead .active {
	  color: #6c757d;
	  border-bottom-color: #6c757d;
	}
	@media (min-width: 48em) {
	  .masthead-brand {
		float: left;
	  }
	  .nav-masthead {
		float: center;
	  }
	}
	.cover {
	  padding: 0 1.5rem;
	}
	.cover .btn-lg {
	  padding: .75rem 1.25rem;
	  font-weight: 700;
	}
	
	.navbar-nav .nav-link {
		color: #000;
		background-color: transparent;
		border-bottom: .25rem solid transparent;
	}
	.navbar-nav .nav-link:hover,
	.navbar-nav .nav-link:focus {
		color: #DC3545 !important;
		border-bottom-color: #DC3545;
	}
	.navbar-nav .active>.nav-link {
		color: #DC3545 !important;
		border-bottom-color: #DC3545;
	}
	
	.navbar-nav .nav-item {
	  font-size: 1.6rem;
	  font-weight: 700;
	}
	.navbar-nav .nav-link {
		margin-right: .9rem !important;
		margin-left: .9rem !important;
		padding-right: 0 !important;
		padding-left: 0 !important;
		
		padding-bottom: 0px;
		padding-top: 0px;
	}
	.bg-light {
		background-color: #FFF !important;
	}
	.container { 		margin-left: 100px; 	}    	</style>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
      <a class="navbar-brand" href="se.php"><img src="logo.png" height="78" width="110" style="margin-right:-160px;"></a>
          <!--Beginning of dropdown toggle bar-->     
          <div class="dropdown">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation" style="margin-right:100px;"><img class="mb-2" src="toggle_bar.png" alt=""></button>
  <div class="dropdown-content">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="se.php">Hem</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="annonser.php">Annonser</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nyheter.php">Nyheter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="om_oss.php">Om oss</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontakt.php">Kontakt</a>
            <li class="nav-item">
            <a class="nav-link" href="skapa_konto.php">Skapa Konto</a>
          </li>
                        <li class="nav-item">
            <a class="nav-link" href="logga_in.php" style=color:#1569C7>Logga in</a>
          </li>
        </ul>
  </div>
</div>     
      <!--End of dropdown toggle bar-->  
	  
<div class="collapse navbar-collapse" id="navbarsExample08">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a style=color:transparent href="se.php">Hem hemm</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="se.php">Hem<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="annonser.php">Annonser</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="nyheter.php">Nyheter</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="om_oss.php">Om oss</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="kontakt.php">Kontakt</a>
                  <!--beg drop down menu--->
          <li>
            <div class="dropdown">
  <button class="dropbtn" ><img class="mb-2" src="lang.png" alt=""></button>
  <div class="dropdown-content">
    <a href="se.php"><img class="mb-2" src="lang_no.png" alt="">Svenska</a>
    <a href="../en.php"><img class="mb-2" src="lang_engelska1.png" alt="">Engelska</a>
    <a href="../no.php"><img class="mb-2" src="lang_norska1.png" alt="">Norska</a>
  </div>
</div>       
            </li>
      <!--end drop down menu--->
           <li><a class="button button--cta button--menu" href="<?php echo $link ?>" ><?php echo $target ?></a></li>
            <li><a class="button button--menu123" href="<?php echo $link_other ?>" ><?php echo $target_other ?></a></li>
        </ul>
      </div>
    
  <!-- Buttons in nav-bar 
<button type="submit" class="button_nav_bar">Log in</button>
<button type="submit" class="button_nav_bar_empty" style=color:black>Skapa konto</button>
  <!-- Buttons in nav-bar -->
    
      </nav>
    <main role="main">

<p><p>
        
        
<!-- Beg. of newsarticle -->
 <div id="container">
     <p><p>
         <div class="form-wrap">
            <h2 style="text-align:center">Redigera annons</h2>
            <form method="post" action="redigera_annons.php?id=<?php echo $ID_check; ?>" enctype = "multipart/form-data"> 
            <div class="form-group">    
            <label for="first-name">Titel</label>    
            <input type="text" name="titel" placeholder="Skriv in titeln"  value="<?php echo $product_name_extract; ?>"/>
            </div>
                
            <div class="form-group">    
            <label for="last-name">Förklaring</label>
            <textarea class="form-control" style=border-color:black; name="forklaring" id="body" placeholder="Skriv in förklaringen" cols="30" rows="5"><?php echo $product_desc_extract; ?></textarea>
            </div>  
                
            <div class="form-group">    
            <label for="last-name">Utbyte</label>
            <textarea class="form-control" style=border-color:black; name="utbyte" id="body" placeholder="Skriv in utbytet" cols="30" rows="5"><?php echo $product_reward_extract; ?></textarea>
            </div>
             
            <div class="form-group">    
            <label for="image">Uppdatera bild</label>    
            <input type = "file" name="image"  />
            </div>  

            <div class="indent2">
                <input type="submit" name="register" value="Uppdatera annons" class="button button--cta button--menu" /> 
            </div>
            <p style=color:red> <?php echo $emptyvar ?>    </p>
            </form>
 

         </div>
      </div>    
<!-- End of news article -->
       
        
        
    </main>
<div class="container">
  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row" >
      <div class="col-12 col-md">
        <img class="mb-2" src="logo.png" alt="" height="78" width="110"><br>© WEBSITE 2021
      </div>
      <div class="col-6 col-md">
        <h5>Om oss</h5>
        <ul class="list-unstyled text-small">
          <li>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<a class="text-muted" href="sekretess.php">Policy</a>&nbsp;</li>
          <li><a class="text-muted" href="about_us.php">About us</a>&nbsp; </li>
        </ul>
      </div>
        <div class="col-6 col-md">
        <h5>Följ oss</h5>
        <ul class="list-unstyled text-small">
          <li>&nbsp; &nbsp;<a class="text-muted" href="#">Youtube</a>&nbsp; &nbsp;</li>
          <li>&nbsp; &nbsp;<a class="text-muted" href="#">Facebook</a></li>
          <li>&nbsp; &nbsp;<a class="text-muted" href="#">Instagram</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Kontakt</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="mailto:info@prototype.com">info@prototype.com</a></li>
		  <li><div class="text-muted" href="#">XXXXXXX</div></li>
        </ul>
      </div>
    </div>
  </footer>
</div>
</body>
</html>
