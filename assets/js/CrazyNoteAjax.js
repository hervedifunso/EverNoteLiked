$(document).ready(function(){
window.createUser=function(mail,mdp,nom)
{
	var account={
		'operation':'ajouterUtilisateur',
		'mail':mail,
		'pass':mdp,
		'name':nom
	};
	$.ajax({
       url : 'CrazyNoteControlleur.php', // La ressource ciblée
       type : 'POST', // Le type de la requête HTTP.
       data : account
    });
}
});