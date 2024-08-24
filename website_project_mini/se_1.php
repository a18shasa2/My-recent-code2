<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>COMPANY</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
  <link rel="stylesheet" href="style_landing_page_splash1.css">
  
<style>
header .video-container {
  z-index: -1;
  position: absolute;
  top: 0;
  left: 0;
  height: 100vh;
  width: 100vw;
}
header .video-container video {
  height: 100%;
  width: 100%;
  object-fit: cover;
}
header .video-container::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: transparent;
}
</style>

<style>
.center1 {
  margin-left: 40px;
}

.center2 {
  margin-left: 100px;
}

@media (max-width: 700px) {
.center1 {
  margin-left: -5px;
}

.center2 {
  margin-left: -20px;
}
}
  </style>

</head>
<body>
<!-- partial:index.partial.html -->
<header>

        <div class="container">
            <nav class="navbar">
                <!--a href="#" class="logo">Logo</a>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Contact</a></li>
                    <button>Sign In</button>
                    <button>Sign Up</button>
                </ul>
                <i class="fas fa-bars fa-2x" id="burger"></i--->
            </nav>
            <section class="showcase">
			<img src=coveli_logo-removebg-preview.png alt=logo_bild>
                <h1>Come for the room, stay for the community. </h1>
                <p class="center1"><b>Vad innebär det att bo i ett nytt hus?</b></p>
                <!--p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet vitae perspiciatis blanditiis perferendis tenetur aut tempora eaque, officiis hic nostrum?
                </p-->
				<a href="annonser.php" class="center1"><button style=background-color:#4B0082><b>Upptäck ditt framtida hem</b></button></a>
				<a href="las_mer.html" class="center2"><button><b>Läs mer</b></button></a
            </section>
        </div>

        <div class="video-container" >
            <video src="bakgrund_video.mp4" autoplay loop muted></video>
        </div>

    </header>
<!-- partial -->
  <script  src="style_landinage_page_splash1.js.js"></script>

</body>
</html>
