<?php
/**
 * Created by PhpStorm.
 * User: JOACHIM
 * Date: 11/06/2017
 * Time: 01:58
 */
 ?>
 
	<div class="wrap">
	<?php 
		for($i=0;$i<count($donneesVue);$i++)
		{ ?>
			<div>
				<label for="<?= str_replace(' ','',$donneesVue[$i]); ?>"><?= $donneesVue[$i]; ?></label>
				<input type="text" id="<?= str_replace(' ','',$donneesVue[$i]); ?>" class="cool" />
			</div>
		<?php } ?>
	</div>
	<div class="button" onclick="createUser(<?php for($i=0;$i<count($donneesVue);$i++)
	 if($i==0) echo str_replace(' ','',$donneesVue[$i]).'.value';
	 else echo ','.str_replace(' ','',$donneesVue[$i]).'.value';
    ?>)"><p>S'enregistrer</p></div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
	<!--<script src="assets/js/CrazyNoteAjax.js"></script>-->
	<?php for($i=0;$i<count($evenementsVue);$i++)
			echo '<script src="'.$evenementsVue[$i].'"></script>';
	?>
	<script>
		$(document).ready(function(){
		window.createUser=function(<?php for($i=0;$i<count($donneesVue);$i++)
	 if($i==0) echo str_replace(' ','',$donneesVue[$i]);
	 else echo ','.str_replace(' ','',$donneesVue[$i]);
    ?>)
		{
			var account={
				'operation':<?= "\"".$operation."\""; ?>,
				<?php for($i=0;$i<count($donneesVue);$i++)
					 if($i==(count($donneesVue)-1)) echo "\"".str_replace(' ','',$donneesVue[$i])."\" : ".str_replace(' ','',$donneesVue[$i])."\n";
					 else echo "\"".str_replace(' ','',$donneesVue[$i])."\" : ".str_replace(' ','',$donneesVue[$i]).", \n";
					?>
			};
			$.ajax({
			   url : <?= "\"".$nomCont."\""; ?>, // La ressource ciblée
			   type : 'POST', // Le type de la requête HTTP.
			   dataType:'json',
			   data : account
			}).done(function(data){
				/*if(data['success'])
					location.href="http://localhost/evernotelike/Controller/AuthController.php?page=Login";*/
			});
		}
		});
	</script>
</body>
</html>