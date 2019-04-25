<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link href="style/style.css" rel="stylesheet" media="all" type="text/css"> 
		<script type="text/javascript" src="js\jquery-3.4.0.js"></script>
		<script type="text/javascript" src="js\jquery.validate.min.js"></script>
		<script>
		$(document).ready(function() {
			
			var $nbrCR = $('#nbrCR') ,
				$nbrRC = $('#nbrRC') , 
				$mainForm = $('#mainForm'),
				$result = $('#result'); 
			
			$mainForm.submit(function(e){
								
				e.preventDefault();// annulation de la fonction par défaut du btn
				
				$nbrCR.click(function (e) {$('#nbrRC').val(''),$('#result').val('')});
				$nbrRC.click(function (e) {$('#nbrCR').val(''),$('#result').val('')});

				$.ajax({
					type:'POST',
					url:'fonctions/convertisseur.php',
					data: 'nbrCR=' + $nbrCR.val() +'&nbrRC=' + $nbrRC.val(),
					dataType : 'html',
					success:function(data){
						$("#result").val(data);
					}
				})
			});
		});
		</script>
		<title>Kata'Rom</title>
	</head>
	<body>
		<header>
			Bienvenue sur le Forum, que souhaites-tu faire?
		</header>
		<div class="corps">
			<form method="post" id="mainForm">
				Nombre : 
				<input type="text" name="nbrCR" id="nbrCR" value="" />&nbsp;
				<input type="submit" id="convert1" value="Vers les chiffres Romains" />
				<br /><br />
				Romain : 
				<input type="text" name="nbrRC" id="nbrRC" onkeyup='this.value=this.value.toUpperCase()' value="" />&nbsp;
				<input type="submit" id="convert2" value="Vers les chiffres Arabes" />
			</form>
			<br />
			Resultat : <input type="text" name="result" id="result" />
		</div>
	</body>
</html>