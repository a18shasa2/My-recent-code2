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
    <link rel="icon" href="../cartoon_play_logo112345_favicon.png">
  </head>

      <!--Beginning of cookie consent script--> 
<script src="load_en.js"></script>
      <!--End of cookie consent script--> 

<style>
      a:hover {
color: white;
}

/* Global Styles */
:root {
	--primary-color: #13ae4b;
	--dark-color: #141414;
	--light-color: #f4f4f4;
}

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

body {
	font-family: 'Arial', sans-serif;
	-webkit-font-smoothing: antialiased;
	background: #000;
	color: #999;
    oncontextmenu="return false;"
}

ul {
	list-style: none;
}

h1,
h2,
h3,
h4 {
	color: #fff;
}

a {
	color: #fff;
	text-decoration: none;
}

a:hover {
	color: #fff;
	text-decoration: underline;

}

p {
	margin: 0.5rem 0;
}

img {
	max-width: 100%;
    pointer-events: none;
    user-select: none;
    oncontextmenu="return false;"
}

.showcase {
	width: 100%;
	height: 93vh;
	position: relative;
	background: url('disney_poster.jpg') no-repeat center center/cover;
}

.showcase::after {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 1;
	background: rgba(0, 0, 0, 0.6);
	box-shadow: inset 120px 100px 250px #000000, inset -120px -100px 250px #000000;
}

.showcase-top {
	position: relative;
	z-index: 2;
	height: 90px;
}

.showcase-top img {
	width: 170px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	margin-left: 0;
}

.showcase-top a {
	position: absolute;
	top: 50%;
	right: 0;
	transform: translate(-50%, -50%);
}

.showcase-content {
	position: relative;
	z-index: 2;
	width: 65%;
	margin: auto;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	text-align: center;
	margin-top: 7rem;
}

.showcase-content h1 {
	font-weight: 700;
	font-size: 5.2rem;
	line-height: 1.1;
	margin: 0 0 2rem;
}

.showcase-content p {
	text-transform: uppercase;
	color: #fff;
	font-weight: 400;
	font-size: 1.9rem;
	line-height: 1.25;
	margin: 0 0 2rem;
}

/* Tabs */
.tabs {
	background: var(--dark-color);
	padding-top: 1rem;
	border-bottom: 3px solid #3d3d3d;
	border-right: none;
}

.tabs .container {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	grid-gap: 1rem;
	align-items: center;
	justify-content: center;
	text-align: center;
}

.tabs p {
	font-size: 1.2rem;
	padding-top: 0.5rem;
}

.tabs .container > div {
	padding: 1.5rem 0;
}

.tabs .container > div:hover {
	color: #fff;
	cursor: pointer;
}

.tab-border {
	border-bottom: var(--primary-color) 4px solid;
}

/* Tab Content */
.tab-content {
	padding: 3rem 0;
	background: #000;
	color: #fff;
}

/* Hide initial content */
#tab-1-content,
#tab-2-content,
#tab-3-content {
	display: none;
	opacity: 0;
}

.show {
	display: block !important;
	opacity: 1 !important;
	transition: all 1000 ease-in;
}

#tab-1-content .tab-1-content-inner {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	grid-gap: 2rem;
	align-items: center;
	justify-content: center;
}

#tab-2-content .tab-2-content-top {
	display: grid;
	grid-template-columns: 2fr 1fr;
	grid-gap: 1rem;
	justify-content: center;
	align-items: center;
}

#tab-2-content .tab-2-content-bottom {
	margin-top: 2rem;
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	grid-gap: 2rem;
	text-align: center;
}

.table {
	width: 100%;
	margin-top: 2rem;
	border-collapse: collapse;
	border-spacing: 0;
}

.table thead th {
	text-transform: uppercase;
	padding: 0.8rem;
}

.table tbody {
	display: table-row-group;
	vertical-align: middle;
	border-color: inherit;
}

.table tbody tr td {
	color: #999;
	padding: 0.8rem 1.2rem;
	text-align: center;
}

.table tbody tr td:first-child {
	text-align: left;
}

.table tbody tr:nth-child(odd) {
	background: #222;
}

.footer {
	max-width: 70%;
	margin: 1rem auto;
	overflow: auto;
}

.footer,
.footer a {
	color: #999;
	font-size: 0.9rem;
}

.footer p {
	margin-bottom: 1.5rem;
}

.footer .footer-cols {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	grid-gap: 2rem;
}

.footer li {
	line-height: 1.9;
}

.footer .lang-select {
	margin-top: 2rem;
	color: #999;
	background-color: #000;
	background-image: none;
	border: 1px solid #333;
	padding: 1rem 1.2rem;
	border-radius: 5px;
}

/* Container */
.container {
	max-width: 70%;
	margin: auto;
	overflow: hidden;
	padding: 0 2rem;
}

/* Text Styles */
.text-xl {
	font-size: 2rem;
}

.text-lg {
	font-size: 1.8rem;
	margin-bottom: 1rem;
}

.text-md {
	margin-bottom: 1.5rem;
	font-size: 1.2rem;
}

.text-center {
	text-align: center;
}

.text-dark {
	color: #999;
}

/* Buttons */
.btn {
	display: inline-block;
	background: var(--primary-color);
	color: #fff;
	padding: 0.4rem 1.1rem;
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

.btn:hover {
	opacity: 0.9;
}

.btn-rounded {
	border-radius: 5px;
}

.btn-xl {
	font-size: 2rem;
	padding: 0.5rem 2.1rem; /* original 1.5 left */
	text-transform: uppercase;
	text-align: center;
    align-content: center;
}

.btn-lg {
	font-size: 1rem;
	padding: 0.8rem 1.3rem;
	text-transform: uppercase;
}

.btn-icon {
	margin-left: 1rem;
}

@media (max-width: 960px) {

		.showcase {
		height: 70vh;
	}

	.showcase-top img {
		top: 30%;
		left: 5%;
		transform: translate(0);
	}

	.showcase-content h1 {
		font-size: 3.7rem;
		line-height: 1;
	}

	.showcase-content p {
		font-size: 1.5rem;
	}

	.footer .footer-cols {
		grid-template-columns: repeat(2, 1fr);
	}

	.btn-xl {
		font-size: 1.5rem;
		padding: 1.4rem 2rem;
		text-transform: uppercase;
	}

	.text-xl {
		font-size: 1.5rem;
	}

	.text-lg {
		font-size: 1.3rem;
		margin-bottom: 1rem;
	}

	.text-md {
		margin-bottom: 1rem;
		font-size: 1.2rem;
	}
}

@media (max-width: 700px) {
	.showcase::after {
		background: rgba(0, 0, 0, 0.6);
		box-shadow: inset 80px 80px 150px #000000, inset -80px -80px 150px #000000;
	}

	.showcase-content h1 {
		font-size: 2.5rem;
		line-height: 1;
	}

	.showcase-content p {
		font-size: 1rem;
	}

	#tab-1-content .tab-1-content-inner {
		grid-template-columns: 1fr;
		text-align: center;
	}

	#tab-2-content .tab-2-content-top {
		display: block;
		text-align: center;
	}

	#tab-2-content .tab-2-content-bottom {
		margin-top: 2rem;
		display: grid;
		grid-template-columns: 1fr;
		grid-gap: 2rem;
		text-align: center;
	}

	.btn-xl {
		font-size: 1rem;
		padding: 1.2rem 1.6rem;
		text-transform: uppercase;
	}
}

@media(max-height: 600px) {
  .showcase-content {
	margin-top: 3rem;
}
}

@media (max-width: 360px) {

	.hide-sm {
		display: none;
	}
	}

</style>

<header class="showcase" class=row oncontextmenu="return false;">
			<div class="showcase-top">
				<img src="logo_1_org_white.png" alt="" />
				<a href="<?php echo $link ?>" class="btn btn-rounded"><strong><?php echo $target ?></strong></a>
			</div>
			<div class="showcase-content">
              <a href="library.php"><img src="../cartoon_play_logo112345.png" alt="" width="450" ></a> <!-- "Cartoon WorldPlay" text or width=630 or 530 -->           <p style=color:lightgrey>Streaming for cartoons</p>
				<!-- a class=hide-sm style=padding:3px>STREAMING FOR CARTOONS</a -->
				<a href="library.php" class="btn btn-xl"
					>See movies <i class="fas fa-chevron-right btn-icon"></i
				></a>
			</div>
		</header>
		
		<section class="tabs" oncontextmenu="return false;">
		
			<div class="container">
				<div id="tab-1" class="tab-item tab-border">
					<i class="fas fa-door-open fa-3x"></i>
					<p class="hide-sm">Cancel at any time</p>
				</div>
				<div id="tab-2" class="tab-item">
					<i class="fas fa-tablet-alt fa-3x"></i>
					<p class="hide-sm">Watch anywhere</p>
				</div>
				<div id="tab-3" class="tab-item">
					<i class="fas fa-tags fa-3x"></i>
					<p class="hide-sm">Subscribe</p>
				</div>
			</div>
		</section>

		<section class="tab-content" oncontextmenu="return false;">
			<div class="container">
				<!-- Tab Content 1 -->
				<div id="tab-1-content" class="tab-content-item show">
					<div class="tab-1-content-inner">
						<div>
							<p class="text-lg">
								Cancel online anytime - no commitment.
							</p>
							<a href="library.php" class="btn btn-lg">Watch 26 episodes for FREE</a>
						</div>
						<img src="tab-content-1-1.png" alt="" />
					</div>
				</div>

				<!-- Tab Content 2 -->
				<div id="tab-2-content" class="tab-content-item">
					<div class="tab-2-content-top">
						<p class="text-lg">
							Watch TV shows and movies. Anytime, anywhere.
						</p>
						<a href="library.php" class="btn btn-lg">Watch 26 episodes for FREE</a>
					</div>
					<div class="tab-2-content-bottom">
						<div>
							<img src="tab-content-2-1-1.png" alt="" />
							<p class="text-md">
								Watch on your TV
							</p>
							<p class="text-dark">
								Watch on any platform or web browser.
							</p>
						</div>
						<div>
							<img src="tab-content-2-2-1.png" alt="" />
							<p class="text-md">
								Watch instantly or later
							</p>
							<p class="text-dark">
								Available on phone and tablet, wherever you go.
							</p>
						</div>
						<div>
							<img src="tab-content-2-3-1.png" alt="" />
							<p class="text-md">
								Use any computer
							</p>
							<p class="text-dark">
								Watch right now on <strong>www.website.com</strong>.
							</p>
						</div>
					</div>
				</div>

				<!-- Tab Content 3 -->
				<div id="tab-3-content" class="tab-content-item">
					<div class="text-center">
						<p class="text-lg">
							Subscribe and watch everything on WEBSITE.
						</p>
						<a href="library.php" class="btn btn-lg">Watch 26 episodes for FREE</a>
					</div>

					<table class="table">
						<thead>
							<tr>
								<th></th>
                                <th>Subscription</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Monthly price</td>
								<td>$6.49</td>
							</tr>
							<tr>
								<td>HD Available</td>
								<td><i class="fas fa-check"></i>Yes</td>
							</tr>
							<tr>
								<td>Ultra HD Available</td>
								<td><i class="fas fa-check"></i>Yes</td>
							</tr>
							<tr>
								<td>Screens you can watch on at the same time</td>
								<td>4</td>
							</tr>
							<tr>
								<td>Watch on your laptop, TV, phone and tablet</td>
								<td><i class="fas fa-check"></i>Yes</td>
							</tr>
							<tr>
								<td>Unlimited movies and TV shows</td>
								<td><i class="fas fa-check"></i>Yes</td>
							</tr>
							<tr>
								<td>Cancel anytime</td>
								<td><i class="fas fa-check"></i>Yes</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
		</section>
		
		<script>
const tabItems = document.querySelectorAll('.tab-item');
const tabContentItems = document.querySelectorAll('.tab-content-item');

// Select tab content item
function selectItem(e) {
	// Remove all show and border classes
	removeBorder();
	removeShow();
	// Add border to current tab item
	this.classList.add('tab-border');
	// Grab content item from DOM
	const tabContentItem = document.querySelector(`#${this.id}-content`);
	// Add show class
	tabContentItem.classList.add('show');
}

// Remove bottom borders from all tab items
function removeBorder() {
	tabItems.forEach(item => {
		item.classList.remove('tab-border');
	});
}

// Remove show class from all content items
function removeShow() {
	tabContentItems.forEach(item => {
		item.classList.remove('show');
	});
}

// Listen for tab item click
tabItems.forEach(item => {
	item.addEventListener('click', selectItem);
});

</script>
  
  
		<footer class="footer" oncontextmenu="return false;">
			<p>Questions? Email <strong>info@prototype.com</strong>. Call <strong>NUMBER</strong></p>
			<div class="footer-cols">
        <ul>
          <a style=font-size:17px><strong>Follow us</strong></a>
          <li><a class="text-muted" href="#">Youtube</a></li>
          <li><a class="text-muted" href="#">Facebook</a></li>
          <li><a class="text-muted" href="#">Instagram</a></li>
        </ul>
				<ul>
           <a style=font-size:17px><strong>Links</strong></a>
	      <li><a class="text-muted" href="library.php">Library</a></li>
          <li><a class="text-muted" href="news.php">News</a></li>
				</ul>
				<ul>
           <a style=font-size:17px><strong>About us</strong></a>
	      <li><a class="text-muted" href="about_us.php">About us</a></li>
          <li><a class="text-muted" href="policy.php">Privacy Policy</a></li>
				</ul>
				<ul>
           <a style=font-size:17px><strong>Contact</strong></a>
	      <li><a class="text-muted">info@prototype.com</a></li>
          <li><a class="text-muted">NUMBER</a></li>
				</ul>
			</div>

    <!-- FOOTER -->
    <div style=text-align:center img=width:10% oncontextmenu="return false;">
<br>
<a id="logo" href="https://companywebsite.com"><img src="img/logo_1_org_white.png" alt="Logo Image" width="200"></a>
      <p><a href="https://companywebsite.com" style=color:grey>&copy 2021 COMPANY™</a></p>
    </div>

		</footer>
</html>