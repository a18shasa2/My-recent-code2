<?php
	session_start();
    if (!isset($_SESSION["email"]) || !isset($_SESSION["loggedIn"])) {
			$target = "Sign in";
            $link = "sign_in.php"; 
            $target_other = "Sign up";
            $link_other = "sign_up.php";     
                
	}

    else {  
        $target = "Profile";
        $link = "profile.php"; 
        $target_other = "Log out";
        $link_other = "logout.php";  
        }
?> 

<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <title>WEBSITE</title>        
    <link rel="icon" href="img/xxxx.png">
        
      <!--Beginning of cookie consent script--> 
<script src="load_en.js"></script>
      <!--End of cookie consent script--> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="style/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="style/owl/owl.theme.default.min.css">

    <!-- HTML5Shiv -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->
  <!-- Estilo customizado -->
<style>
      a:hover {
color: white;
}

      img {
  pointer-events: none;
  user-select: none;
  oncontextmenu="return false;"
}
  
.navbar {
	background-color: #1B1B1B!important;

}
body::-webkit-scrollbar{
	visibility: hidden;
}

body {
    overflow: overlay;
}

/*--------navegação-----*/
.navbar {
	position: relative;
	z-index: 1000;
}

.navbar .form-control {
	background-color: #1b1b1b!important;
	color: #fff;
	border-color: #fff;
	border-radius: 0;
	max-width: 115px;
	line-height: 28px;J
	height: 28px;
}

.navbar img{
	height: 24px;
}

.navbar-dark .navbar-toggler{
	color: #fff;
	border: none;
	padding-left: 0;
	padding-right: 0;
	margin-right: 15px;
}

.navbar ul.sidebar {
	color: #999898;
	max-width: 250px;
	background-color: #1b1b1b;
	position: absolute;
	top: 60px;
	left: -250px;
	height: calc(100vh - 60px);
	overflow-y: auto;
	transition: all 0.1s ease-out;
	opacity: .5;
}
.navbar.sidebar-open ul {
	left: 0;
	opacity: 1;
}

.text-reset {
	color: #999898;
}
.navbar ul li{
	padding: 0.3em 1em;
}

.navbar ul li .divider{	
	border-bottom: #999898 1px solid;
	margin: 0.3em auto;
}

.media-avatar img{
	height: 38px;
}

.backdrop {
	background-color: rgba(0, 0, 0, 0.4);
	position: fixed;
	top: 60px;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 999;
}





/*--- banner ----*/

.container-fluid {

}

.logo {
transform: rotate(0.5deg);
transform-origin: left right;
width: 400px;

}

.full-banner {	
	background: url('img/guerranasestrelas.jpg');
	background-size: contain;
	background-repeat: no-repeat;
	background-position: right;
	height: 200px;
	width: 800px;
}

.full-banner small {
	color: #999898;
	font-size: 20px;
}


.full-banner .play{
	background-color: #13ae4b;
	border-radius: 0;
	border: none;
	width: 150px;
	height: 60px;	
}

.full-banner .info{
	background-color: #fff;
	border-radius: 0;
	border: none;
	width: 250px;
	height: 60px;
	color: #000;

}

.play, .info{
    border: none;
    padding: 0.9rem;
    font-size: 1rem;
}

.full-banner .L{
	border: 0.1px solid #999898;	
	padding-left: 7px;
	padding-right: 7px;
}


.list-titles h2, footer {
	color: white;
}
    

.list-titles img{
	min-width: 220px;	
}


/*----- efeito hover e carossel --*/
.carrosel-filmes{
    margin-top: 1px;    
}

.container {
position: relative;			
display: flex;
flex-wrap: wrap;
}

.container .box{
position: relative;
width: 1100px;
overflow: hidden;
transition: 0.5s;
}

.container .box:hover{
cursor: pointer;
z-index: 1;
transform: scale(1.25);
box-shadow: 0 25px 40px rgba(0, 0, 0, .5);
}

.container .box .imgbox{
position: relative;
top: 0;
left: 0;
width: 100%;
height: 100%;
-o-object-fit: cover;
 object-fit: cover;
}

.container .box .imgbox:before{
content: '';
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: 1;
background: linear-gradient(180deg,#999898,#000);
mix-blend-mode: multiply;
opacity: 0;
transition: 0.5s;
}

.container .box:hover .imgbox:before{
opacity: 5;
}

.container .box .imgbox img{
position: relative;
top: 0;
left: 0;
width: 100%;
height: 100%;
-o-object-fit: cover;
     object-fit: cover;}

.container .box .content {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: 1;
display: flex;
padding: 20px;
align-items: flex-end;
}

.container .box .content h2{
color: #fff;
transition: 0.5s;
text-transform: uppercase;
margin-bottom: 5px;
font-size: 15px;
transform: translateY(200px);
}

.container .box:hover .content h2 {	
transform: translateY(0);
transition-delay:  0.6s;

}

.container .box .content p {
color: #fff;
transform: translateY(200px);
transition: 0.5s;
font-size: 10px;
}

.container .box:hover .content p{
transform: translateY(0);
transition-delay:  0.7s;
}

/*--Media--*/

@media (min-width: 320px) and (max-width: 499px){
		.container-fluid{
		background-color: #000;	
			margin-bottom: 10px;
		}

		.full-banner .play{
			background-color: #13ae4b;
			border-radius: 0;
			border: none;
			width: 80px;
			height: 30px;	
		}

		.full-banner .info{
			background-color: #fff;
			border-radius: 0;
			border: none;
			width: 120px;
			height: 40px;
			color: #000;

		}

		.play, .info{
			 border: none;
			 padding: 0.9rem;
			 font-size: 0.5em;
		}

		small span {
			color: white;
		}	

}


@media (min-width: 500px) and (max-width: 767px){
		.full-banner {
			min-height: 256px;
					
		}
		.navbar .form-control {
		max-width: 180px;
		}

		.imgbox img {
		height: 100px;
		width: 100px;
					
		}


		.full-banner {	
		background: url('img/guerranasestrelassmall.jpg');
		background-size: contain;
		background-repeat: no-repeat;
		background-position: right;
		height: 300px;
		width: 200px;
	
}

}


@media (min-width: 768px) {
	.list-titles img {
	min-width: 220px;
			
}

	.full-banner {	
	background: url('img/guerranasestrelassmall.jpg');
	background-size: contain;
	background-repeat: no-repeat;
	background-position: right;
	height: 550px;
	width: 200px;
}

}


@media (min-width: 992px)  { 
	.navbar .bg-dark{
		background-color: transparent!important;
		/*background-image: gradient*/
	}

	.full-banner {
		min-height: 50vh;

	}
	.full-banner p{
		color: #999898;
		max-width: 50vw;
	}
	.navbar-brand.flex-grow-1{
		flex-grow: initial!important;
	}
	.navbar ul li{
		font-size: 15px;
	}
	.navbar ul.nav{
		flex-grow: 1!important;
	}
	.navbar ul.nav .active {
		color: #FFF!important;
		font-weight: bold;


	}
	.navbar img {
		height: 34px;
	}
	.container-fluid {
		background-color: #000;
	}

	.full-banner {	
	background: url('img/guerranasestrelassmall.jpg');
	background-size: contain;
	background-repeat: no-repeat;
	background-position: right;
	height: 550px;
	width: 200px;
	


}

@media (min-width: 1200px) and (max-width: 3000px) {
	.navbar ul.nav li{
		padding: 0;
	}

	.navbar ul li{
		font-size: 15px;
	}

	.navbar ul.nav {
		color: rgba(255, 255, 255, .5)!important;
	}

	.navbar ul.nav .active {
		color: rgba(255, 255, 255, 1)!important;
		font-weight: bold;
	}

	
	.logo{		
		height: 200px;
	}

	.container-fluid {
		background-color: #000;
	}


	.full-banner {	
	background: url('img/guerranasestrelassmall.jpg');
	background-size: contain;
	background-repeat: no-repeat;
	background-position: right;
	height: 550px;
	width: 300px;
	
}

	.full-banner .play{
	background-color: #13ae4b;
	border-radius: 0;
	border: none;
	width: 150px;
	height: 60px;
	padding-bottom: 10px;	
	}

	.full-banner .info{
	background-color: #fff;
	border-radius: 0;
	border: none;
	width: 220px;
	height: 60px;
	color: #000;
	

	}

	.play, .info{
	 border: none;		
	font-size: 0.9em;
	}

 }




</style>
        

<style>

/* Buttons */
.btn12 {
--primary-color: #13ae4b;
	display: inline-block;
	background: var(--primary-color);
	color: #fff;
	padding: 0.4rem 1.3rem;
	font-size: 1rem;
	text-align: center;
	border: none;
	cursor: pointer;
	margin-right: 0.5rem;
	transition: opacity 0.2s ease-in;
	outline: none;
	box-shadow: 0 1px 0 rgba(0, 0, 0, 0.45);
	border-radius: 2px;
}

.btn12:hover {
	opacity: 0.9;
}

.btn12-rounded {
	border-radius: 5px;
}

.btn12-xl {
	font-size: 2rem;
	padding: 1.5rem 2.1rem;
	text-transform: uppercase;
}

.btn12-lg {
	font-size: 1rem;
	padding: 0.8rem 1.3rem;
	text-transform: uppercase;
}

.btn12-icon {
	margin-left: 1rem;
}

</style>


<style>
/* Buttons */
.btn12_alt {
--primary-color: #999899;
	display: inline-block;
	background: var(--primary-color);
	color: white;
	padding: 0.4rem 1.3rem;
	font-size: 1rem;
	text-align: center;
	border: black;
	cursor: pointer;
	margin-right: 0.5rem;
	transition: opacity 0.2s ease-in;
	outline: none;
	box-shadow: 0 1px 0 rgba(0, 0, 0, 0.45);
	border-radius: 2px;
}

.btn12_alt:hover {
	opacity: 0.9;
    background: ;
}

.btn12_alt-rounded {
	border-radius: 5px;
}

.btn12_alt-xl {
	font-size: 2rem;
	padding: 1.5rem 2.1rem;
	text-transform: uppercase;
}

.btn12_alt-lg {
	font-size: 1rem;
	padding: 0.8rem 1.3rem;
	text-transform: uppercase;
}

.btn12_alt-icon {
	margin-left: 1rem;
}

</style>

        
</head>
<body oncontextmenu="return false;">   

<nav class="navbar navbar-dark bg-dark fixed-top"> <!-- inicio navegação-->

        <button type="button" class="navbar-toggler d-lg-none">
            <img src="img/menu.png" alt="Menu"> </button>


        <a href="https://companywebsite.com" class="navbar-brand sidebar-open flex-grow-1">
        <img src="img/logo_1_org_white.png" alt="Logo" class="my-1 mx-2">
        </a>


           <ul class="nav text-white d-none d-lg-flex">
                <li class="nav-item">
              <a href="en.php
                    " class="nav-link text-reset  d-xl-flex " onMouseOver="this.style.color='#FFF'" onMouseOut="this.style.color='#999898'" style="font-size: 1.6rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;" >Home</a>
                </li>
                  <li class="nav-item">
              <a href="library.php
                    " class="nav-link text-reset  d-xl-flex " onMouseOver="this.style.color='#FFF'" onMouseOut="this.style.color='#999898'" style="font-size: 1.6rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;">Library</a>
                </li>
                  <li class="nav-item">
              <a href="news.php
                    " class="nav-link text-reset  d-xl-flex" onMouseOver="this.style.color='#FFF'" onMouseOut="this.style.color='#999898'" style="font-size: 1.6rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;">News</a>
                </li>
                  <li class="nav-item">
              <a href="about_us.php
                    " class="nav-link text-reset  d-xl-flex" onMouseOver="this.style.color='#FFF'" onMouseOut="this.style.color='#999898'" style="font-size: 1.6rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;">About us</a>
                      <li class="nav-item">
              <a href="contact.php
                    " class="nav-link text-reset  d-xl-flex" onMouseOver="this.style.color='#FFF'" onMouseOut="this.style.color='#999898'" style="font-size: 1.6rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;">Contact</a>
                </li>
                </li>

         </ul>


    <link rel="stylesheet" href="dropdown.css" type="text/css">
  
        <form class="form-inline">
<div class="dropdown">
  <button class="dropbtn" ><img oncontextmenu="return false;"  class="mb-2" src="../lang_engelska.png" alt=""></button>
  <div class="dropdown-content">
    <a href="../se/se.php"><img class="mb-2" src="../lang_no.png" alt="" width="47">Swedish</a>
    <a href="en.php"><img class="mb-2" src="../lang_engelska1.png" alt="" width="47">English</a>
    <a href="../no/no.php"><img class="mb-2" src="../lang_norska1.png" alt="" width="47" >Norweigian</a>
  </div>
</div>       
        </form> 



           <div class="media text-white p-2 d-none d-lg-flex">
            <a href="<?php echo $link ?>" class="btn12 btn12-rounded"><strong><?php echo $target ?></strong></a> 
            <a href="<?php echo $link_other ?>" class="btn12_alt btn12_alt-rounded"><strong><?php echo $target_other ?></strong></a>     
        </div>

        <ul class="list-unstyled font-weight-bold sidebar" style=text-align:center>
            <li class="media media-avatar">
            <a href="<?php echo $link ?>" class="btn12 btn12-rounded"><?php echo $target ?></a> 
            <a href="<?php echo $link_other ?>" class="btn12_alt btn12_alt-rounded"><?php echo $target_other ?></a>  
        </div>                
    

            </li>
            <li class="divider"></li>
                <li><a href="en.php" class="text-reset" onMouseOut="this.style.color='#999898'" style="font-size: 1.5rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;">Home</a></li>
                <li><a href="library.php" class="text-reset" onMouseOut="this.style.color='#999898'" style="font-size: 1.5rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;">Library</a></li>
                <li><a href="news.php" class="text-reset" onMouseOut="this.style.color='#999898'" style="font-size: 1.5rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;">News</a></li>
                <li><a href="about_us.php" class="text-reset" onMouseOut="this.style.color='#999898'" style="font-size: 1.5rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;">About us</a></li>
                <li><a href="contact.php" class="text-reset" onMouseOut="this.style.color='#999898'" style="font-size: 1.5rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;">Contact</a></li>
            </li>
        </ul>          
</nav>  <!-- fim navegação-->
    
    <style>

/* CSS VARIABLES */
:root {
  --primary: #141414;
  --light: #F3F3F3;
  --dark: 	#686868;
}

html, body {
  width: 100vw;
  min-height: 100vh;
  margin: 0;
  padding: 0;
  background-color: #1B1B1B;
  color: var(--light);
  font-family: Arial, Helvetica, sans-serif;
  box21-sizing: border-box21;
  line-height: 1.4;
}


h1 {
  padding-top: 0px;  
}

.wrapper212 {
  margin: 0;
  padding: 0;
}



/* MAIN CONTIANER */
.main-container21 {
  padding: 0px;
  margin-left: 0px;
  margin-right: 50px;
}

.box21 {
  display: grid;
  grid-gap: 20px;
  grid-template-columns: repeat(6, minmax(100px, 1fr));
}

.box21 a {
  transition: transform .3s;  
}

.box21 a:hover {
  transition: transform .3s;
  -ms-transform: scale(1.4);
  -webkit-transform: scale(1.4);  
  transform: scale(1.4);
}

.box21 img {
  border-radius: 2px;
}


/* MEDIA QUERIES */

@media(max-width: 900px) {

  .box21 {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(4, minmax(100px, 1fr));
  }

}

@media(max-width: 700px) {


  .box21 {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(3, minmax(100px, 1fr));
  }


   
}

@media(max-width: 500px) {

  .wrapper212 {
    font-size: 15px;
  }


  h1 {
    text-align: center;
    font-size: 18px;
  }

 

  .box21 {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(1, 1fr);
    text-align: center;    
  }

  .box21 a:hover {
    transition: transform .3s;
    -ms-transform: scale(1);
    -webkit-transform: scale(1);  
    transform: scale(1.2);
  }


  
    .indent {
    margin-left: 250px;
    margin-right: 270px;
} 
  
   
}

        

</style>


  <div class="wrapper212" style=background-color:#141414>
    
    <!-- MAIN CONTAINER -->
    <section class="main-container21" style=padding-top:15px>
      <div class="location" id="home">
   <!-- START -->
      <div class="container" style=background-color:#645e50;text-align:center;width:300px;border-radius:12px >
 <div id="container" >
     <p><p>
         <div class="form-wrap">
            <h2 style="text-align:center;color:white">&nbsp &nbsp Logged out</h2>
            <form>
               <p style=color:lightgrey>
                 <br>
                  &nbsp &nbsp &nbsp &nbsp You have been logged out.  <br> 
                  <br>
               </p>
                <br>
            </form>
         </div>
      </div> 
      </div> 
      <!-- END -->
      </div>
    </section>
      
      <!-- spaces -->
      <br> <br> <br>

  </div>
    
        


     <style>
.link {
  padding: 50px;
}
.sub-links ul {
  list-style: none;
  padding: 0;
  display: grid;
  grid-gap: 20px;
  grid-template-columns: repeat(4, 1fr);
}

.sub-links a {
  color: var(--dark);
  text-decoration: none;
}

.sub-links a:hover {
  color: var(--dark);
  text-decoration: underline;
}

.logos a{
  padding: 10px;
}

.logo {
  color: var(--dark);
}
</style>           
<script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script> 
<style>
	.footer1 .footer-cols1 {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	grid-gap: 0.5rem;
		grid-template-columns: repeat(4, 1fr);

	}
</style>
<section style=background-color:#1b1b1b>  
		<div class="footer1" oncontextmenu="return false;" style=margin-left:50px;margin-right:50px>
			<p style=color:grey;margin-left:39px;>Questions? Email <strong>info@prototype.com</strong>. Call <strong>NUMBER</strong>.</p>
			<div class="footer-cols1">
        <ul>
          <a style=font-size:17px;color:lightgrey><strong>Follow us</strong></a>
          <li style="list-style-type: none;"><a class="text-muted" href="#">Youtube</a></li>
          <li style="list-style-type: none;"><a class="text-muted" href="#">Facebook</a></li>
          <li style="list-style-type: none;"><a class="text-muted" href="#">Instagram</a></li>
        </ul>
				<ul>
           <a style=font-size:17px;color:lightgrey><strong>Links</strong></a>
	      <li style="list-style-type: none;"><a class="text-muted" href="library.php">Library</a></li>
          <li style="list-style-type: none;"><a class="text-muted" href="news.php">News</a></li>
				</ul>
				<ul>
           <a style=font-size:17px;color:lightgrey><strong>About us</strong></a>
	      <li style="list-style-type: none;"><a class="text-muted" href="about_us.php">About us</a></li>
          <li style="list-style-type: none;"><a class="text-muted" href="policy.php">Privacy Policy</a></li>
				</ul>
				<ul>
           <a style=font-size:17px;color:lightgrey><strong>Contact</strong></a>
	      <li style="list-style-type: none;"><a class="text-muted">info@prototype.com</a></li>
          <li style="list-style-type: none;"><a class="text-muted">NUMBER</a></li>
				</ul>
			</div>
</div>
    
      <!-- div class="logos" style=margin-left:35px>
        <a href="#"><i class="fab fa-facebook-square fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-instagram fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-twitter fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-youtube fa-2x logo"></i></a>
      </div -->
  
    <!-- END OF LINKS -->

    <!-- FOOTER -->
    <footer style=text-align:center>
<a id="logo" href="https://companywebsite.com"><img src="img/logo_1_org_white.png" alt="Logo Image" width="200"></a>
      <p><a href="https://companywebsite.com" style=color:grey>&copy 2021 COMPANY™</a></p>
    </footer>
</section>

 

   <script src="js/java.js"></script>  
      
       <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="js/owl/jquery.min.js"></script>
    <script src="js/owl/owl.carousel.min.js"></script>
    <script src="js/owl/setup.js"></script>
    </body>

</html>
