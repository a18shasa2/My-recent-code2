<?php
//Does NOT have "en/".
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
        /* beg login button*/
               .button{background:transparent;border:1px solid rgba(0,0,0,.25);border-radius:4px;box-sizing:border-box;color:rgba(0,0,0,.6)!important;display:block;font-size:13px;font-weight:600;line-height:40px;padding:0 2em;text-align:center;text-transform:uppercase}p .button{margin:5px 0}.button:not(.button--cta):not(.button--more):hover{border-color:rgba(0,0,0,.35)}.-inverse .button:not(.button--cta):not(.button--more),.button:not(.button--cta):not(.button--more).-inverse{background:transparent;border-color:#fff;color:#fff!important}.-inverse .button:not(.button--cta):not(.button--more):hover,.button:not(.button--cta):not(.button--more).-inverse:hover{border-color:#f0f0f0;color:#f0f0f0!important}.button svg{fill:rgba(0,0,0,.3);display:inline;margin:-3px 4px 0 0;vertical-align:middle}.button--cta{background-color:#63cc98;border-color:transparent;color:#fff!important}.button--cta:disabled{color:hsla(0,0%,100%,.5)!important}.button--cta:hover{background-color:#37a08e}.button--more{background-color:#7db9d8;border-color:transparent;color:#fff!important;display:inline-block;text-transform:none}.button--more:hover{background-color:#75b5d6}.button--menu{line-height:32px;padding:0 0.5em}.button--alternative{background-color:#2e4b64;border-color:transparent;color:#fff!important;display:inline-block;text-transform:none}.button--block{display:block;width:100%}@media screen and (min-width:960px){.button:not(.button--block){display:inline-block;margin-right:10px}}
    .button--menu123{line-height:32px;padding:0 0.2em}
    .button--menu123:hover{background-color:gainsboro}
        /*end of login button settings*/
        
        /*drop down button settings*/
        .dropbtn {
background:transparent;border:1px solid rgba(0,0,0,.25);border-radius:4px;box-sizing:border-box;color:rgba(0,0,0,.6)!important;display:block;font-size:12.2px;font-weight:600;line-height:40px;padding:0 2em;text-align:center;margin:0px 20px 0 0;line-height:32px;padding:0 0.5em;
}
        
.dropbtn:hover, .dropbtn:focus {
background-color:gainsboro
}
       
      img {
  pointer-events: none;
  user-select: none;
}
      
.navbar-toggler:hover, .navbar-toggler:focus {
background-color:gainsboro
}


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #ddd;}
        
.show {display: block;}
        /*end of drop down button settings*/
        
             /* navigaiton bar settings*/
         .button_nav_bar2 {
            display: block;
            width: 130px;
            padding: 10px;
            background: #63cc98;
            border: none;
            color: white;
            border-radius: 5px;
            margin-bottom: 10px;
            margin-top: 10px;
            cursor: pointer;
         }

         .button_nav_bar2:hover {
            background-color: #37a08e;
            cursor: pointer;
            text-decoration: underline;
         }
        
                 .button_nav_bar3 {
            display: block;
            width: 130px;
            padding: 10px;
            background: silver;
            border: none;
            color: white;
            border-radius: 5px;
            margin-bottom: 10px;
            margin-top: 10px;
            cursor: pointer;
         }

         .button_nav_bar3:hover {
            background-color: black;
            cursor: pointer;
            text-decoration: underline;
         }
         /* navigaiton bar settings*/
        
    .indent {
    margin-left: 420px;
    margin-right: 270px;
}    
        
    .indent2 {
    margin-left: 470px;
}  
   
            .indent3 {
    margin-left: 370px;
    margin-right: 270px;
} 
  
         .indent4 {
    margin-left: 410px;
}  
    
    .indent5 {
    margin-left: 490px;
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
	.container { 		margin-left: 100px; 	}    	
      
             /*Mobil upplösning.*/ 
        @media (max-width: 800px){
   .container {
       		margin-left: -20px;
         }
    
 .indent {
    margin-left: 80px;
    margin-right: 270px;
}    
        
    .indent2 {
    margin-left: 160px;
}  
   
            .indent3 {
    margin-left: 70px;
    margin-right: 270px;
} 
  
         .indent4 {
    margin-left: 90px;
}  
    
    .indent5 {
    margin-left: 180px;
}  

    
         }  
        
@media (max-width: 500px){
   .container {
       		margin-left: -20px;
         }
    
 .indent {
    margin-left: 20px;
    margin-right: 270px;
}    
        
    .indent2 {
    margin-left: 70px;
}  
   
            .indent3 {
    margin-left: -23px;
    margin-right: 270px;
} 
  
         .indent4 {
    margin-left: 10px;
}  
    
    .indent5 {
    margin-left: 90px;
}  

    
         }  
      </style>
      
      <!--Beginning of cookie consent script--> 
<script src="load_en.js"></script>
      <!--End of cookie consent script--> 
      
  </head>
  <body>      
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
      <a class="navbar-brand" href="en.php"><img src="../logo.png" height="48" width="140" style="margin-right:-160px;"></a>

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
            <a class="nav-link" href="<?php echo $link ?>"><?php echo $target ?></a>
          </li>
                        <li class="nav-item">
            <a class="nav-link" href="<?php echo $link_other ?>" style=color:#1569C7><?php echo $target_other ?></a>
          </li>
        </ul>
  </div>
</div>     
      <!--End of dropdown toggle bar-->  
	  
<div class="collapse navbar-collapse" id="navbarsExample08">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a style=color:transparent>Hem hemm</a>
          </li>
          <li class="nav-item active">
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
    <a href="../no/no.php"><img class="mb-2" src="../lang_norska1.png" alt="">Norweigian</a>
  </div>
</div>       
            </li>
      <!--end drop down menu--->
           <li><a class="button button--cta button--menu" href="<?php echo $link ?>" ><?php echo $target ?></a></li>
            <li><a class="button button--menu123" href="<?php echo $link_other ?>" ><?php echo $target_other ?></a></li>
        </ul>
      </div>
    <!--end of login buttons--->
    
    </nav>
    <main role="main">
<p></p>

       <div class="indent3">
        <img class="mb-2" src="../logo.png" alt=""  width="410">
      </div>     

        <p class=indent4>
           Website for XXXX and YYY!

</p> 
            <ul class=indent2>
        <li>Only <strong>2 SEK</strong> per day!</li>        
        <li>Watch in <strong>HD-quality</strong>!</li>
        <li>Watch in <strong>multiple languages</strong>!</li>
        <li>Watch up to <strong>20 films and tv-series</strong>!</li>
        <li>Listen to <strong>exclusive dubs</strong>!</li>
    </ul>
        
            <div class="indent5">
                <a href="library.php" title="Bibliotek" style="text-decoration:none"> <button type="submit" class="button_nav_bar2"><strong>SEE MOVIES</strong></button> </a>
                <a href="log_in.php" title="Prenumenera" style="text-decoration:none"> <button type="submit" class="button_nav_bar3"><strong>Subscribe</strong></button> </a>
                </div>   
 
    </main>
<div class="container">
  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
          <a href="https://website.com/"><img oncontextmenu="return false;" class="mb-2" src="../logo.png" alt="" height="60" width="195"></a><br>© WEBSITE 2021
      </div>
      <div class="col-6 col-md">
        <h5>About us</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="about_us.php">About us</a></li>
          <li><a class="text-muted" href="sekretess.php">Privacy Policy</a></li>
        </ul>
      </div>
     <div class="col-6 col-md">
        <h5>Follow us</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="about_us.php">Youtube</a></li>
          <li><a class="text-muted" href="sekretess.php">Facebook</a></li>
          <li><a class="text-muted" href="sekretess.php">Instagram</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Contact</h5>
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
