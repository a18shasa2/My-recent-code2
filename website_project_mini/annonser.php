<?php
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
    <title>Prototyp</title>
    <link rel="stylesheet" href="../../dropdown.css" type="text/css">
	
    <!-- Bootstrap core CSS -->
	<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<style>        
	        .button{background:transparent;border:1px solid rgba(0,0,0,.25);border-radius:4px;box-sizing:border-box;color:rgba(0,0,0,.6)!important;display:block;font-size:13px;font-weight:600;line-height:40px;padding:0 2em;text-align:center;text-transform:uppercase}p .button{margin:5px 0}.button:not(.button--cta):not(.button--more):hover{border-color:rgba(0,0,0,.35)}.-inverse .button:not(.button--cta):not(.button--more),.button:not(.button--cta):not(.button--more).-inverse{background:transparent;border-color:#fff;color:#fff!important}.-inverse .button:not(.button--cta):not(.button--more):hover,.button:not(.button--cta):not(.button--more).-inverse:hover{border-color:#f0f0f0;color:#f0f0f0!important}.button svg{fill:rgba(0,0,0,.3);display:inline;margin:-3px 4px 0 0;vertical-align:middle}.button--cta{background-color:#63cc98;border-color:transparent;color:#fff!important}.button--cta:disabled{color:hsla(0,0%,100%,.5)!important}.button--cta:hover{background-color:#37a08e}.button--more{background-color:#7db9d8;border-color:transparent;color:#fff!important;display:inline-block;text-transform:none}.button--more:hover{background-color:#75b5d6}.button--menu{line-height:32px;padding:0 0.5em}.button--alternative{background-color:#2e4b64;border-color:transparent;color:#fff!important;display:inline-block;text-transform:none}.button--block{display:block;width:100%}@media screen and (min-width:960px){.button:not(.button--block){display:inline-block;margin-right:10px}}
    .button--menu123{line-height:32px;padding:0 0.2em}
    .button--menu123:hover{background-color:gainsboro}
        
        .cover-container {
	  max-width: 42em;
	}
	.masthead {
	  margin-bottom: 2rem;
	}
      
      img {
  pointer-events: none;
  user-select: none;
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

    .button--menu1234{line-height:32px;padding:0 1.4em;margin:2px;background-color:#63cc98;color:#fff!important;width: 167px;}
    .button--menu1234:hover{background-color:#37a08e}

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
              
      img {
  pointer-events: none;
  user-select: none;
}
      
    @media (max-width: 800px){
   .container {
       		margin-left: 0px;
         }
    
         }  
      </style>
      
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
      <a class="navbar-brand" href="se.php"><img oncontextmenu="return false;"  src="logo.png" height="78" width="110" style="margin-right:-160px;"></a>
          <!--Beginning of dropdown toggle bar-->     
          <div class="dropdown">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation" style="margin-right:100px;"><img oncontextmenu="return false;"  class="mb-2" src="toggle_bar.png" alt=""></button>
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
            <a style=color:transparent href="se.php">Hem hemm</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="se.php">Hem<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="annonser.php">Annonser </a>
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
    <a href="en/en.php"><img class="mb-2" src="lang_engelska1.png" alt="">Engelska</a>
    <a href="no/no.php"><img class="mb-2" src="lang_norska1.png" alt="">Norska</a>
  </div>
</div>       
            </li>
      <!--end drop down menu--->
           <li><a class="button button--cta button--menu" href="<?php echo $link ?>" ><?php echo $target ?></a></li>
            <li><a class="button button--menu123" href="<?php echo $link_other ?>" ><?php echo $target_other ?></a></li>
        </ul>
      </div>
    
    </nav>
    <main role="main" >
      <div class="album py-5 bg-light">
        <div class="container" >
            <h1>Annonser</h1>
            <p>Se alla annonser nedan. <br> 🔑 symbolen innebär att du har skapat annonsen. <br> 📨 symbolen innebär att du har svarat på annonsen.</p>
            <a class="button button--menu1234" style=margin-bottom:10px;margin-top:-5px; href="https://website.com/en_old/win_win/winwin_skapa_annons.php">Lägg till annons</a>
              
               <!--Beginning of new cards-- 
                       <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                  <a href="little_lulu_episode.php">
                <img oncontextmenu="return false;"  class="card-img-top" src="../Little%20lulu.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a class="card-text" href="little_lulu_episode.php" title="Little lulu episode" ><strong>Little lulu</strong></a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                  <a href="popeye_episode.php">
                <img oncontextmenu="return false;"  class="card-img-top" src="../Popeye.png" alt="Card image cap">
                      </a>
                <div class="card-body">
                  <a class="card-text" href="popeye_episode.php" title="Popeye episode" ><strong>Popeye</strong></a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                  <a href="stalmannen_episode.php">
                <img oncontextmenu="return false;"  class="card-img-top" src="../Stalmannen.png" alt="Card image cap">
                <div class="card-body">
                  <a class="card-text" href="stalmannen_episode.php" title="Stålmannen episode" ><strong>Stålmannen</strong></a>
                </div>
              </div>
            </div>   
              <!--End of new cards--> 
              
        
  <!--ALTERNATIVE BOX ONE -->
  <div class="alert-message"></div>
  
  

    <div class="row" style=margin-right:100px;> <!--margin-right is used to change the margin of the boxes OR make the boxes smaller -->
		
        <div class="row">
		
		<?php
		require_once "dbconfig_website.php";
		$select_stmt=$db->prepare("SELECT * FROM winwinproduct");	
		$select_stmt->execute();
		while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
		{
		?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="winwin_annons_article.php?id=<?php echo $row['product_id']; ?>"><img class="card-img-top" src="<?php echo $row['product_image']; ?>" width="400px" height="270px"></a>
	
        <?php	
        //check for green marker only
        $emailss21=$_SESSION["email"]; 
        $row_id_check=$row['product_id'];
		$select_stmt1=$db->prepare("SELECT * FROM winwinsvara WHERE product_code='$row_id_check' && email='$emailss21'");	
		$select_stmt1->execute();
		while($row1=$select_stmt1->fetch(PDO::FETCH_ASSOC))
		{
        $row_email_check=$row1['product_code'];
        }
        ?>

              <div class="card-body">
                <a href="winwin_annons_article.php?id=<?php echo $row['product_id']; ?>"><h4 class="card-title text-primary"> <?php if ($row['email'] == $_SESSION["email"]) { ?> 🔑 <?php } ?>  <?php if ($row_email_check == $row['product_id']) { ?> 📨 <?php } ?>   <?php echo $row['product_name'] ; ?> </h4></a>
                <!-- h5><?php echo number_format($row['product_price'],2); ?>/-</h5 -->
              </div>
			  
              <div class="card-footer">
				<form class="form-submit">
					<input type="hidden" class="pid" value="<?php echo $row['product_id']; ?>">
					<input type="hidden" class="pname" value="<?php echo $row['product_name']; ?>">
					<input type="hidden" class="pprice" value="<?php echo $row['product_price']; ?>">
					<input type="hidden" class="pimage" value="<?php echo $row['product_image']; ?>">
					<input type="hidden" class="pcode" value="<?php echo $row['product_code']; ?>">
					<a class="btn btn-success btn-md" href="winwin_annons_article.php?id=<?php echo $row['product_id']; ?>">Läs mer</a>
				</form>
              </div>
			  
            </div>
          </div>
		<?php
		}
		?>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <!--ALTERNATIVE BOX ONE -->

      
              
          </div>
      </div>
    </main>
<div class="container">
  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
          <a href="se.php"><img oncontextmenu="return false;" class="mb-2" src="logo.png" alt="" height="78" width="110"></a><br>© XXXX 2022
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
          <li><a class="text-muted" href="mailto:info@prototype.com">info@prototyp.com</a></li>
		  <li><div class="text-muted" href="#">XXXX-XXXXX</div></li>
        </ul>
      </div>
    </div>
  </footer>
</div>
</body>
</html>
