<?php

?> 

<!doctype html>
<html lang="sv">
  <head>
    <meta charset="utf-8">
    <title>COMPANY</title>
    <link rel="stylesheet" href="dropdown.css" type="text/css">
    <link rel="stylesheet" href="skapa_konto_layout.css" type="text/css">
	
    <!-- Bootstrap core CSS -->
	<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<style>
        /* beg login button*/
               .button{background:transparent;border:1px solid rgba(0,0,0,.25);border-radius:4px;box-sizing:border-box;color:rgba(0,0,0,.6)!important;display:block;font-size:13px;font-weight:600;line-height:40px;padding:0 2em;text-align:center;text-transform:uppercase}p .button{margin:5px 0}.button:not(.button--cta):not(.button--more):hover{border-color:rgba(0,0,0,.35)}.-inverse .button:not(.button--cta):not(.button--more),.button:not(.button--cta):not(.button--more).-inverse{background:transparent;border-color:#fff;color:#fff!important}.-inverse .button:not(.button--cta):not(.button--more):hover,.button:not(.button--cta):not(.button--more).-inverse:hover{border-color:#f0f0f0;color:#f0f0f0!important}.button svg{fill:rgba(0,0,0,.3);display:inline;margin:-3px 4px 0 0;vertical-align:middle}.button--cta{background-color:#63cc98;border-color:transparent;color:#fff!important}.button--cta:disabled{color:hsla(0,0%,100%,.5)!important}.button--cta:hover{background-color:#37a08e}.button--more{background-color:#7db9d8;border-color:transparent;color:#fff!important;display:inline-block;text-transform:none}.button--more:hover{background-color:#75b5d6}.button--menu{line-height:32px;padding:0 0.5em}.button--alternative{background-color:#2e4b64;border-color:transparent;color:#fff!important;display:inline-block;text-transform:none}.button--block{display:block;width:100%}@media screen and (min-width:960px){.button:not(.button--block){display:inline-block;margin-right:10px}}
    .button--menu123{line-height:32px;padding:0 0.2em}
    .button--menu123:hover{background-color:gainsboro}
        
    .button--menu1234{line-height:32px;padding:0 1.4em;margin:2px;background-color:#63cc98;color:#fff!important;width: 160px;}
    .button--menu1234:hover{background-color:#37a08e}
        /*end of login button settings*/
        
        /*drop down button settings*/
        .dropbtn {
background:transparent;border:1px solid rgba(0,0,0,.25);border-radius:4px;box-sizing:border-box;color:rgba(0,0,0,.6)!important;display:block;font-size:12.2px;font-weight:600;line-height:40px;padding:0 2em;text-align:center;margin:0px 20px 0 0;line-height:32px;padding:0 0.5em;
}
        
.dropbtn:hover, .dropbtn:focus {
background-color:gainsboro
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
    margin-left: 330px;
    margin-right: 270px;
}    
   
           
      .indent01 {
    margin-left: 315px;
    max-width: 1115px;       
      
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
    
    @media (max-width: 800px){
   .indent {
       		margin-left: 10px;
       margin-right: 0px;
         }
    
        .indent01 {
       		margin-left: 0px;
             max-width: 1015px; 
         }
     
    .container {
       		margin-left: 0px;
         }
    
         }    
    </style>
      
      <!--Beginning of cookie consent script--> 
<script>
(function() {
	if (!localStorage.getItem('cookieconsent')) {
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var data = JSON.parse(request.responseText);
				var eu_country_codes = ['AL','AD','AM','AT','BY','BE','BA','BG','CH','CY','CZ','DE','DK','EE','ES','FO','FI','FR','GB','GE','GI','GR','HU','HR','IE','IS','IT','LT','LU','LV','MC','MK','MT','NO','NL','PO','PT','RO','RU','SE','SI','SK','SM','TR','UA','VA'];
				if (eu_country_codes.indexOf(data.countryCode) != -1) {
					document.body.innerphp += '\
					<div class="cookieconsent" style="position:fixed;padding:5px;left:0;bottom:0;background-color:#000;color:#FFF;text-align:center;width:100%;z-index:99999;">\
						COMPANY använder sig av cookies, för att du ska få bästa funktionalitet på sajten. <br>Genom att fortsätta använda webbsidan, godkänner du till detta.\
						<a href="#" style="color:#blue;"> Jag samtycker</a>\
					</div>\
					';
					document.querySelector('.cookieconsent a').onclick = function(e) {
						e.preventDefault();
						document.querySelector('.cookieconsent').style.display = 'none';
						localStorage.setItem('cookieconsent', true);
					};
				}
			}
		};
		request.open('GET', 'http://ip-api.com/json', true);
		request.send();
	}
})();
</script>
      <!--End of cookie consent script--> 
      
  </head>
  <body>      
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
      <a class="navbar-brand" href="se.php"><img src="logo.png" height="48" width="140" style="margin-right:-160px;"></a>

        <!--Beginning of dropdown toggle bar-->     
          <div class="dropdown">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation" style="margin-right:100px;"><img class="mb-2" src="toggle_bar.png" alt=""></button>
  <div class="dropdown-content">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="se.php">Hem<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="om_oss.php">Om oss </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="streamingtjanst.php">Streamingtjänst</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="katalog.php">Katalog</a>
          </li>
        <li class="nav-item ">
            <a class="nav-link" href="kontakt.php">Kontakt</a>
          </li>
        </ul>
  </div>
</div>     
      <!--End of dropdown toggle bar-->  
	  
<div class="collapse navbar-collapse" id="navbarsExample08">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a style=color:transparent href="https://website.com/">HemHemm</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="se.php">Hem<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="om_oss.php">Om oss </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="streamingtjanst.php">Streamingtjänst</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="katalog.php">Katalog</a>
          </li>
        <li class="nav-item active">
            <a class="nav-link" href="kontakt.php">Kontakt</a>
          </li>
            <div class="dropdown">
  <button class="dropbtn" ><img class="mb-2" src="lang.png" alt=""></button>
  <div class="dropdown-content">
    <a href="se.php"><img class="mb-2" src="lang_no.png" alt="">Svenska</a>
    <a href="english.php"><img class="mb-2" src="lang_engelska1.png" alt="">Engelska</a>
    <a href="no.php"><img class="mb-2" src="lang_norska1.png" alt="">Norska</a>
  </div>
</div>       
            </li>
      <!--end drop down menu--->
        </ul>
      </div>
    <!--end of login buttons--->
    
    </nav>
    <main role="main">

<p><p>
<h2 class="indent">
Kontakt
</h2> 
<!-- Beg. of newsarticle -->


        <p class="indent">
            Skicka meddelandet med formuläret nedan.
</p>      
        <div  class=indent01 class=container>
            <div class="col-md-6 col-md-offset-3" align="center">
                <input id="name" placeholder="Namn" class="form-control">
                <p></p>
                <input id="email" placeholder="Email" class="form-control">
                <p></p>
                <input id="subject" placeholder="Ämne" class="form-control">
                <p></p>
                <textarea class="form-control" id="body" placeholder="Skriv en text" cols="30" rows="5"></textarea>
                <p></p>
                <input type="button" onclick="sendEmail()" value="Skicka meddelande" class="btn btn-primary">
            </div>
        </div>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                    window.location.href = "skickat_meddelande.php";
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
<!-- End of news article -->
       
        
        
    </main>
<div class="container">
  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row" >
      <div class="col-12 col-md">
        <img class="mb-2" src="logo.png" alt="" height="60" width="195"><br>© COMPANY™ 2021
      </div>
      <div class="col-6 col-md">
        <h5>Om oss</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="om_oss.php">Om oss</a></li>
        </ul>
      </div>
     <div class="col-6 col-md">
        <h5>Följ oss</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="om_oss.php">Youtube</a></li>
          <li><a class="text-muted" href="sekretess.php">Facebook</a></li>
          <li><a class="text-muted" href="sekretess.php">Instagram</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Kontakt</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="mailto:info@website.com">info@website.com</a></li>
		  <li><div class="text-muted">NUMBER</div></li>
        </ul>
      </div>
    </div>
  </footer>
</div>
</body>
</html>
