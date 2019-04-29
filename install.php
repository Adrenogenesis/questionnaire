<!DOCTYPE html>
<html lang="fr" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
  <title>Identifiants Mysql</title>
    <meta name="keywords" content="simulateur, barbe, simulateur de barbe, webcam, direct webmaster, webmaster, développeur, développeur web, aformac">
    <meta name="author" content="Brodar Frédéric">
    <meta name="publisher" content="Brodar Frédéric">
    <meta name="language" content="fr" >
    <meta name="distribution" content="global" >
    <meta name="expires" content="never">
    <meta name="Robots" content="index, follow">
    <link rel="author" href="dcl.fredb@18pixel.fr">
    <meta name="copyright" content="BRODAR-2019">
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:title" content="Simulateur de barbe"/>
    <meta property="og:description" content="Simulateur de barbe"/>
    <meta property="og:url" content="https://info.exonet3i.com/directweb/">
    <meta property="og:site_name" content="dcl.pfcv.18pixel" />
    <meta property="article:publisher" content="Brodar Frédéric" />
    <meta property="og:image" content="https://dcl.pfcv.18pixel.fr/dcl.fredb/img/brodar.jpg">
    <meta name="twitter:image:src" content="http://www.exonet3i.com/images/exonet3i.jpg">
    <meta name="twitter:domain" content="http://www.exonet3i.com/">
    <meta name="twitter:creator" content="@exonet3i">
    <meta name="twitter:image" content="http://exonet3i.com/images/exonet3i.jpg">
    <meta name="twitter:url" content="https://twitter.com/exonet3i">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      
 </head>

<body>
<div class="logo">
<img src="img/logo.jpg" alt="logo">
</div>
<div class="container">
<div class="quest">
 <h1>Questionnaire</h1>   
<h3>Configuration de la base de donnée.</h3>
<span class="warn">

<!--------------- Introduction des informations de connexion BDD ( Base de donnee mysql ) ---------------------------------------------->
  <form id="test" action="#" method="post">
    <div class="form-group">
        <label for="servername">hostname</label>
        <input class="form-control" type="text" name="servername" id="servername" placeholder="localhost" required/>
    </div>
    
    <div class="form-group">
        <label for="username">Utilisateur</label>
        <input class="form-control" type="text" name="username" id="username" required/>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input class="form-control" type="password" name="password" id="password" required/>
    </div>
    <div class="form-group">
        <label for="dbname">Base de donnée</label>
        <input class="form-control" type="text" name="dbname" id="dbname" placeholder="quest" required/>
    </div>
    <p>
        <input type="submit" value="Envoyer" class="btn btn-primary btn-block" />
    </p>
</form>	
<pre id="output"></pre>
  <!--------------- Encodage des informations saisies en format json ---------------------------------------------->
</div>
    <script>
    (function() {
	function toJSONString( form ) {
		var obj = {};
		var elements = form.querySelectorAll( "input, select, textarea" );
		for( var i = 0; i < elements.length; ++i ) {
			var element = elements[i];
			var name = element.name;
			var value = element.value;

			if( name ) {
				obj[ name ] = value;
			}
		}
		return JSON.stringify( obj );
	}

	document.addEventListener( "DOMContentLoaded", function() {
		var form = document.getElementById( "test" );
		var output = document.getElementById( "output" );
		form.addEventListener( "submit", function( e ) {
			e.preventDefault();
			var json = toJSONString( this );
			output.innerHTML = json;
            console.log (json);
            window.location.href = "php/dbx.php?json=" + json; // Redirection en mode "POST" pour transmettre les donnees json.
			
		}, false);

	});

})();
  </script>
</div>
    <footer>
      	<span class="lien" href="#">Copyright © 2019 </span> -•- <a class="lien" href="conditions-utilisation.html">Conditions d'utilisation</a>
           </footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>