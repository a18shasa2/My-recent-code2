<?php
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
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="style/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="style/owl/owl.theme.default.min.css">


  <meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
                .button{background:transparent;border:1px solid rgba(0,0,0,.25);border-radius:4px;box-sizing:border-box;color:rgba(0,0,0,.6)!important;display:block;font-size:13px;font-weight:600;line-height:40px;padding:0 2em;text-align:center;text-transform:uppercase}p .button{margin:5px 0}.button:not(.button--cta):not(.button--more):hover{border-color:rgba(0,0,0,.35)}.-inverse .button:not(.button--cta):not(.button--more),.button:not(.button--cta):not(.button--more).-inverse{background:transparent;border-color:#fff;color:#fff!important}.-inverse .button:not(.button--cta):not(.button--more):hover,.button:not(.button--cta):not(.button--more).-inverse:hover{border-color:#f0f0f0;color:#f0f0f0!important}.button svg{fill:rgba(0,0,0,.3);display:inline;margin:-3px 4px 0 0;vertical-align:middle}.button--cta{background-color:#63cc98;border-color:transparent;color:#fff!important}.button--cta:disabled{color:hsla(0,0%,100%,.5)!important}.button--cta:hover{background-color:#37a08e}.button--more{background-color:#7db9d8;border-color:transparent;color:#fff!important;display:inline-block;text-transform:none}.button--more:hover{background-color:#75b5d6}.button--menu{line-height:32px;padding:0 0.5em}.button--alternative{background-color:#2e4b64;border-color:transparent;color:#fff!important;display:inline-block;text-transform:none}.button--block{display:block;width:100%}@media screen and (min-width:960px){.button:not(.button--block){display:inline-block;margin-right:10px}}
    .button--menu123{line-height:32px;padding:0 0.2em}
    .button--menu123:hover{background-color:gainsboro}
        
        
    .indent {
    margin-left: 250px;
    max-width: 700px;
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
                      
    @media (max-width: 800px){
   .indent {
       		margin-left: 10px;
       margin-right: 0px;
         }
        
    .container {
       		margin-left: 0px;
         }
    
         }  
      </style>
  </head>
  
  <!-- NEW STYLE -->
<style>

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

  
  
  
  
  <body>
<nav class="navbar navbar-dark bg-dark fixed-top"> <!-- inicio navegação-->

        <button type="button" class="navbar-toggler d-lg-none">
            <img src="../en/img/menu.png" alt="Menu"> </button>


        <a href="https://website.com" class="navbar-brand sidebar-open flex-grow-1">
        <img src="img/logo_1_org_white.png" alt="Logo" class="my-1 mx-2">
        </a>


           <ul class="nav text-white d-none d-lg-flex">
                <li class="nav-item">
              <a href="en.php
                    " class="nav-link text-reset  d-xl-flex " onMouseOver="this.style.color='#FFF'" onMouseOut="this.style.color='#999898'" style="font-size: 1.6rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px;" >Home</a>
                </li>
                  <li class="nav-item">
              <a href="library.php
                    " class="nav-link text-reset  d-xl-flex " onMouseOver="this.style.color='#FFF'" onMouseOut="this.style.color='#999898'" style="font-size: 1.6rem; font-weight: 700; margin-right: .9rem !important; margin-left: .9rem !important; padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 0px; padding-top: 0px; ">Library</a>
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


    <link rel="stylesheet" href="../en/dropdown.css" type="text/css">
  
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
    <main role="main">

<!-- BEGINNING OF HLS-PLAYLIST -->
<link href='https://fonts.googleapis.com/css?family=Jaldi:400,700' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/octicons/2.1.2/octicons.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css'><link rel="stylesheet" href="../video_test/resolution1/playlist11/playlist_style.css">
  <link rel='stylesheet prefetch' href='http://rawgit.com/mkhazov/videojs-resolution-switcher/master/lib/videojs-resolution-switcher.css'>
<link rel='stylesheet prefetch' href='http://vjs.zencdn.net/5.10.7/video-js.css'>

<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<style>
/* ==========================================================================
   $Flexible Media
   ========================================================================== */
.flex-media {
  height: 0;
  overflow: hidden;
  padding-bottom: 56.25%;
  position: relative;
}
.flex-media iframe,
.flex-media object {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  height: 100%;
  width: 100%;
}

/* ==========================================================================
   $Media Object
   ========================================================================== */
.media,
.media-body {
  overflow: hidden;
}

.media-left .media-img {
  float: left;
  margin-right: 1.277em;
}

.media-right .media-img {
  float: right;
  margin-left: 1.277em;
}

.media-img img {
  display: block;
}

/* ==========================================================================
   $Magnific Popup (lightbox)
   ========================================================================== */
.popup {
  background-color: #fff;
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.6);
  color: #1a1b1b;
  max-width: 976px;
  margin: auto;
  overflow: hidden;
  position: relative;
  width: 85%;
}

.mfp-close {
  color: #DEDFDF;
  position: absolute;
  top: 0;
  right: 0;
}

/* $Interactive Stuff
   ========================================================================== */
.mfp-active.mfp-bg {
  opacity: 0;
  transition: opacity 0.2s cubic-bezier(0.6, -0.28, 0.735, 0.045);
}
.mfp-active .mfp-content {
  transition: all 0.24s;
  transform: translateY(15%);
  opacity: 0;
}

.mfp-ready.mfp-bg {
  opacity: 0.85;
}
.mfp-ready .mfp-content {
  opacity: 1;
  transform: translateY(0);
}

.mfp-removing.mfp-bg {
  opacity: 0;
}
.mfp-removing .mfp-content {
  opacity: 0;
  transform: translateY(15%);
  transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

/* ==========================================================================
   $Gallery
   ========================================================================== */
.gallery-items {
  padding: 0 0.31em;
}

.gallery-title {
  border-top: 1px solid #DEDFDF;
  border-bottom: 1px solid #DEDFDF;
  font-weight: 700;
  overflow: hidden;
  padding: 0.62em 1.277em;
}

.gallery-item {
  padding: 0.31em 0 0.62em;
  transition: background 0.25s;
}
.gallery-item:active, .gallery-item:focus, .gallery-item:hover {
  background-color: tint(#DEDFDF, 12%);
}

.gallery-item + .gallery-item {
  border-top: 1px solid #DEDFDF;
}

.gallery-item-desc {
  font-size: 77%;
  transition: color 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.gallery-item-desc:after {
  content: "Playing";
  display: block;
  font-size: 80%;
  letter-spacing: 1px;
  speak: none;
  opacity: 0;
  text-transform: uppercase;
  transform: translateY(100%);
  transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.active .gallery-item-desc {
  color: #04A777;
  transition-timing-function: cubic-bezier(0.6, -0.28, 0.735, 0.045);
}
.active .gallery-item-desc:after {
  opacity: 1;
  transform: translateY(0);
  transition-timing-function: cubic-bezier(0.6, -0.28, 0.735, 0.045);
  speak: normal;
}

@media (min-width: 925px) {
  .gallery-main {
    float: left;
    width: 65%;
  }

  .gallery-items {
    margin-top: 2.55em;
    overflow-x: hidden;
    overflow-y: scroll;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 35%;
  }
}
      </style>
      
		<div id="vid-gallery" class="popup gallery ">
			<ul class="gallery-items">
				<li class="gallery-item"><a href="javascript:myFunctionep1()" class="gallery-item-link" id="ep1">Episode 1 XXXXXXx</a></li>
				<li class="gallery-item"><a href="javascript:myFunctionep2()" class="gallery-item-link" id="ep2">Episode 2 XXXXXXXX </a></li>
				<li class="gallery-item"><a href="v=ep3" class="gallery-item-link" id="ep3">Unleash cross-media information</a></li>
				<li class="gallery-item"><a href="v=ep4" class="gallery-item-link" id="ep4">Convergence without revolutionary ROI</a></li>
			</ul>
		</div>

<script src='http://vjs.zencdn.net/5.10.7/video.js'></script>
<script src='http://rawgit.com/mkhazov/videojs-resolution-switcher/master/lib/videojs-resolution-switcher.js'></script>

</main>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<!--script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.9/jquery.magnific-popup.min.js'></script><script  src="../video_test/resolution1/playlist1/playlist_script.js"></script-->

<script>
/**
 * Project: Youtube Gallery
 * Description: Creates a gallery w/ playlist for youtube videos.
 * Author: James Mejia
 */
;(function($) {

	var pluginName	= 'vidGallery',
		dataKey 	= 'plugin_' + pluginName,
		defaults	= {
			galleryMainClass:	'gallery-main',
			galleryItemsClass:	'gallery-items',
			galleryItemClass:	'gallery-item',
			galleryTitleText: 	'Episodes',
			// Valid sizes: default (default), medium (mqdefault),
			// high (hqdefault), standard (sqdefault), max (maxresdefault)
			thumbSize: 			'default'
		};

	function Plugin (element, options) {

		this.element 	= element;
		this.$element 	= $(element);
		this.options 	= $.extend({}, defaults, options);

		this._defaults = defaults;
		this._name = pluginName;

		this.init(options);

	}

	Plugin.prototype = {

		init: function () {

			this._getVideos();
			this._getMainVid();
			this._getEvents();

			return this;

		},
		_getVideos: function () {

			var self			= this,
				thumbSize 		= self.options.thumbSize;

			videoList = [];

			switch ( thumbSize ) {

				case 'default':
					thumbSize = 'default.jpg';
					break;
				case 'mqdefault':
				case 'medium':
					thumbSize = 'mqdefault.jpg';
					break;
				case 'hqdefault':
				case 'high':
					thumbSize = 'hqdefault.jpg';
					break;
				case 'sddefault':
				case 'standard':
					thumbSize = 'sddefault.jpg';
					break;
				case 'maxresdefault':
				case 'max':
					thumbSize = 'maxresdefault.jpg';
					break;
				default:
					throw new Error( '`' + self.options.thumbSize + '`' + ' is not a valid thumbnail size. Valid sizes: default (default), medium (mqdefault), high (hqdefault), standard (sqdefault), max (maxresdefault)');

			}

		 	$('.' + self.options.galleryItemClass).each(function (index) {

		 		var $vidLink = $(this).find('a'),
					listItem = [];

			 	videoList.push({
					reference: this,
                    //!!! Change href and c= below
					videoId: $vidLink.attr('href').split('javascript:myFunction')[1],
					vidDesc: $vidLink.text()
				});

				$vidLink.html('');

				listItem 	+= '<div class=\"media media-left\">';
				listItem 	+= 		'<div class=\"media-img gallery-item-thumb\">';
				listItem 	+=			'<img width=100px src=\"little_lulu_' + videoList[index].videoId + '.jpg' + '\"/>';
				listItem	+= 		'</div>';
				listItem	+= 		'<div class=\"media-body gallery-item-desc\">';
				listItem	+= 			videoList[index].vidDesc;
				listItem	+= 		'</div>';
				listItem	+= 	'</div>';
				
			 	console.log(listItem);

				$vidLink.append(listItem);

			});

		},
		_getMainVid: function () {

			var self 		= this,
				mainVid		= [];

				mainVid 	+= '<div class=\"' + self.options.galleryMainClass + '\">';
				mainVid 	+= 		'<div class=\"flex-media\">';
				//mainVid 	+= 			'<iframe src=\"https://www.youtube.com/embed/' + videoList[0].videoId + '?rel=0' + '\" seamless>';
				mainVid 	+= 			'<video id="player" class="video-js vjs-default-skin vjs-big-play-centered" height="355" controls controlsList="nodownload" oncontextmenu="return false;" autoplay poster="casper.png" src="ep<?php echo $id ?>().mp4" type="video/mp4">';
				//mainVid		+= 		'<source src="ep<?php echo $id ?>().mp4" type="video/mp4">';
                mainVid		+= 		'<track label="English" kind="subtitles" srclang="en" src="../captions/english.vtt">';
                mainVid		+= 		'</video>';
				mainVid		+= 		'</div>';
				mainVid 	+= '</div>';

				$('.gallery').prepend(mainVid);
				$('<div class=\"gallery-title\">' + self.options.galleryTitleText + '</div>').insertBefore('.gallery-items');
                //eq(0) is the first episode that is seen when page is opened. Connect with PHP´s id=3, depending on the page, for STARTING PAGE and VIDEO PLAY AND EPISODE NUMBER.
				$('.' + self.options.galleryItemClass).eq(<?php echo $id_check ?>).addClass('active');

		},
		_getEvents: function () {

			var self = this;

			$('.' + self.options.galleryItemClass).on('click', function (e) {

				e.preventDefault();

				var $iframe			= $('.' + self.options.galleryMainClass).find('video'),
					currentIndex	= $(this).index(),
					newSrc 			= '' + videoList[currentIndex].videoId + '.mp4';


				if ( !$(this).hasClass('active') ) {

					$(this).siblings().removeClass('active');
					$(this).addClass('active');
					$iframe.attr('src', newSrc);

				}

			});

		}
	};

	$.fn[pluginName] = function (options) {

		var plugin = this.data(dataKey);

		if ( plugin instanceof Plugin ) {
			if (typeof options !== 'undefined') {
				plugin.init(options);
			}
		} else{
			plugin = new Plugin(this, options);
			this.data(dataKey, plugin);
		}

		return plugin;

	};

})(jQuery);


$(function() {
		
	$('.gallery').vidGallery();

	$('.vid-popup').magnificPopup({
		type: 'inline',
		preloader: false,
		showCloseBtn: true,
		mainClass: 'mfp-active',
		removalDelay: 300
	});
	
});    
    
    
    </script>

<script>
      var video = document.getElementById("player");
        
      var videoSrc = "bunny1.m3u8";
  
        
        
      if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource(videoSrc);
        hls.attachMedia(video);
      }
      // hls.js is not supported on platforms that do not have Media Source
      // Extensions (MSE) enabled.
      //
      // When the browser has built-in HLS support (check using `canPlayType`),
      // we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video
      // element through the `src` property. This is using the built-in support
      // of the plain video element, without using hls.js.
      //
      // Note: it would be more normal to wait on the 'canplay' event below however
      // on Safari (where you are most likely to find built-in HLS support) the
      // video.src URL must be on the user-driven white-list before a 'canplay'
      // event will be emitted; the last video event that can be reliably
      // listened-for when the URL is not on the white-list is 'loadedmetadata'.
      else if (video.canPlayType("application/vnd.apple.mpegurl")) {
        video.src = videoSrc;
      }
    </script>
    

    <script>
    function myFunctionep1() {
    
      var video = document.getElementById("player");
        
      var videoSrc = "clock.m3u8";
        
      if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource(videoSrc);
        hls.attachMedia(video);
      }
      // hls.js is not supported on platforms that do not have Media Source
      // Extensions (MSE) enabled.
      //
      // When the browser has built-in HLS support (check using `canPlayType`),
      // we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video
      // element through the `src` property. This is using the built-in support
      // of the plain video element, without using hls.js.
      //
      // Note: it would be more normal to wait on the 'canplay' event below however
      // on Safari (where you are most likely to find built-in HLS support) the
      // video.src URL must be on the user-driven white-list before a 'canplay'
      // event will be emitted; the last video event that can be reliably
      // listened-for when the URL is not on the white-list is 'loadedmetadata'.
      else if (video.canPlayType("application/vnd.apple.mpegurl")) {
        video.src = videoSrc;
      }
    
    
}
    
    
    
    function myFunctionep2() {
    
      var video = document.getElementById("player");
        
      var videoSrc = "hdaa.m3u8";
        
      if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource(videoSrc);
        hls.attachMedia(video);
      }
      // hls.js is not supported on platforms that do not have Media Source
      // Extensions (MSE) enabled.
      //
      // When the browser has built-in HLS support (check using `canPlayType`),
      // we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video
      // element through the `src` property. This is using the built-in support
      // of the plain video element, without using hls.js.
      //
      // Note: it would be more normal to wait on the 'canplay' event below however
      // on Safari (where you are most likely to find built-in HLS support) the
      // video.src URL must be on the user-driven white-list before a 'canplay'
      // event will be emitted; the last video event that can be reliably
      // listened-for when the URL is not on the white-list is 'loadedmetadata'.
      else if (video.canPlayType("application/vnd.apple.mpegurl")) {
        video.src = videoSrc;
      }
    
    
}
        
</script>

<!-- END OF HLS-PLAYLIST -->

<p><p>
<h2 class="indent">
About us
</h2> 
<!-- Beg. of newsarticle -->


        <p class="indent">
            WEBSITE is a  company with a focus on family entertainment for those young and young at art through a variety of film.
<br><br>
We contain great knowledge versioning and takes great care in the choice of titles, through a mix of old and young, which is important to preserve for coming generations.
  </p>    
<!-- End of news article -->
       
        
        
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