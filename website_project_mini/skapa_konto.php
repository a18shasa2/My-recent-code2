<?php                     
    if (isset($_POST["register"])) {
        $connection = new mysqli("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");

		$firstName = $connection->real_escape_string($_POST["firstName"]);  		
		$lastName = $connection->real_escape_string($_POST["lastName"]);  				
		$email = $connection->real_escape_string($_POST["email"]);  
		$password = sha1($connection->real_escape_string($_POST["password"])); 
        $plan = "1";
        $date_current = date('Y-m-d');
		
        if ($firstName != "" && $lastName != "" && $email != "" && $password != "") { 
		$data = $connection->query("INSERT INTO users (firstName, lastName, email, password, plan, regDate) VALUES ('$firstName', '$lastName', '$email', '$password', '$plan', '$date_current')");
        
        //users specific to language. CHANGE this.
		$dataq = $connection->query("INSERT INTO users_se (firstName, lastName, email, password, plan, regDate) VALUES ('$firstName', '$lastName', '$email', '$password', '$plan', '$date_current')");

    	if ($data === false)
        	echo "Connection error!";
    	else
    	   echo "Your have been signed up - please now Log In";
           header("Location: grattis_skapat_konto.php");
		   exit();
	}
        else{ 
            $emptyvar = "Du har inte fyllt i hela formuläret. Försök igen!";
            }  
            
    }    

 session_start();
 if (!isset($_SESSION["email"]) || !isset($_SESSION["loggedIn"])) {
			$target = "Log in";
            $link = "log_in.php"; 
            $target_other = "Sign up";
            $link_other = "sign_up.php";     
                
	}

    else {  
        $target = "Logged in";
        $link = "admin.php"; 
        $target_other = "Log ut";
        $link_other = "logout.php";  
        }

?>

<!doctype html>
<html lang="sv">
  <head>
    <meta charset="utf-8">
    <title>WEBSITE</title>
    <link rel="stylesheet" href="../dropdown.css" type="text/css">
    <link rel="stylesheet" href="../skapa_konto_layout.css" type="text/css">
	
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
    margin-left: 120px;
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
      <a class="navbar-brand" href="http://website.com/"><img src="../logo.png" height="48" width="160" style="margin-right:-160px;"></a>
          <!--Beginning of dropdown toggle bar-->     
          <div class="dropdown">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation" style="margin-right:100px;"><img class="mb-2" src="../toggle_bar.png" alt=""></button>
  <div class="dropdown-content">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="en.php">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="library.php">Library</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="news.php">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about_us.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
            <li class="nav-item">
            <a class="nav-link" href="sign_up.php">Skapa Konto</a>
          </li>
                        <li class="nav-item">
            <a class="nav-link" href="log_in.php" style=color:#1569C7>Log in</a>
          </li>
        </ul>
  </div>
</div>     
      <!--End of dropdown toggle bar-->  
	  
<div class="collapse navbar-collapse" id="navbarsExample08">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a style=color:transparent href="http://website.com/">Hem hemm</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="en.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="library.php">Library </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="news.php">News</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="about_us.php">About us</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="contact.php">Contact</a>
                  <!--beg drop down menu--->
          <li>
            <div class="dropdown">
  <button class="dropbtn" ><img class="mb-2" src="../lang_engelska.png" alt=""></button>
  <div class="dropdown-content">
    <a href="../se.php"><img class="mb-2" src="../lang_no.png" alt="">Swedish</a>
    <a href="en.php"><img class="mb-2" src="../lang_engelska1.png" alt="">English</a>
    <a href="../no.php"><img class="mb-2" src="../lang_norska1.png" alt="">Norweigian</a>
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
            <h2 style="text-align:center">Skapa konto</h2>
            <form method="post" action="sign_up.php"> 
            <div class="form-group">    
            <label for="first-name">Förnamn</label>    
            <input type="text" name="firstName" placeholder="Skriv ditt förnamn"  />
            </div>
                
            <div class="form-group">    
            <label for="last-name">Efternamn</label>
            <input type="text" name="lastName" placeholder="Skriv ditt efternamn"  />  
            </div>  
                
            <div class="form-group">    
            <label for="email">Email</label>    
            <input type="email" name="email" placeholder="Skriv din email"  />
            </div>    
                
            <div class="form-group">    
            <label for="password">Lösenord</label>    
            <input type="password" name="password" placeholder="Skriv ditt lösenord"  />
            </div>    
                
            <div class="indent2">
                <input type="submit" name="register" value="Sign up" class="button button--cta button--menu" /> 
            </div>
            <p style=color:red> <?php echo $emptyvar ?>    </p>
               <p class="bottom-text">
                  Genom att klicka på Skapa konto-knappen, accepterar du våra
                  <a href="sekretess.php" style=color:darkblue>allmäna villkor</a> och
                  <a href="sekretess.php" style=color:darkblue>integritetspolicy</a>
               </p>
            <p>Har du redan ett konto? <a href="log_in.php">Log in</a></p>
            </form>
         </div>
      </div>    
<!-- End of news article -->
       
        
        
    </main>
<div class="container">
  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row" >
      <div class="col-12 col-md">
        <img class="mb-2" src="../logo.png" alt="" height="60" width="195"><br>© WEBSITE 2021
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
		  <li><div class="text-muted" href="#">NUMBER</div></li>
        </ul>
      </div>
    </div>
  </footer>
</div>
</body>
</html>