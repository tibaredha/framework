
<?php include('entete.php'); ?>

	<form method="post" action="creer_config.php" id="form"  >
    	<br />
    	<table align="center" width="750">
        	
			<tr>
            	<td class="titre_form" align="center" colspan="2">Etape 0 => You must accept the EULA to continue!</td>
            </tr>
			<tr>
            	<td colspan="2" align="center">
                <br />
				<textarea class="info" style="height: 230px; width: 100%;"><?php $eula = file_get_contents("eula.txt");echo $eula; ?></textarea>
				<br/>
				</td>
            </tr>
			
			<tr>
            	<td colspan="2" align="center">
                I accept the EULA
                <input type="checkbox" id="EULA" name="EULA" value="1" >
			    </td>
            </tr>
			
			<tr>
            	<td class="titre_form" align="center" colspan="2">Etape 1 => Création de la connexion mysql</td>
            </tr>
            
			<tr>
            	<td colspan="2" align="center">
                <br />
                Si vous avez les droits SQL requis, vous n'avez pas besoin de cr&eacute;er la base de donn&eacute;es,<br />l'installation le fera pour vous.<br />
                Sinon, Pensez &agrave; cr&eacute;er votre base de donn&eacute;es avant de commencer l'installation.<br /><br />
			    </td>
            </tr>
			
			
            <tr>
            	<td class="titre_form" align="center" colspan="2">Remplir le formulaire</td>
            </tr>
            <tr>
            	<td align="right"><br />Nom du Site : </td>
                <td><br /><input type="text" name="Nom_Site" value="framework"  size="50" /></td>
            </tr>
            <tr>
            	<td align="right">Email du Site : </td>
                <td><input type="text" name="Email_Site" value="framework@yahoo.fr"size="50" /></td>
            </tr>
            <tr>
            	<td align="right">Url de l'espace membre sans '/' a la fin : </td>
                <td><input type="text" name="Url_Site" value="http://localhost/framework" size="50" /></td>
            </tr>
            <tr>
            	<td align="right">Url Serveur Mysql : </td>
                <td><input type="text" name="Url_Serveur" value="localhost" size="50" /></td>
            </tr>
            <tr>
            	<td align="right">Login admin Mysql : </td>
                <td><input type="text" name="Admin" value="root"  size="50" /></td>
            </tr>
            <tr>
            	<td align="right">Pass Mysql : </td>
                <td><input type="text" name="Passe" value=""   size="50" /></td>
            </tr>
            <tr>
            	<td align="right">Nom de la base de données : </td>
                <td><input type="text" name="Base" value="tibaredha"   size="50" /></td>
            </tr>
            <tr>
            	<td colspan="2" align="center">
				<br />
				<input type="submit" name="creer_base" value="Créer la page de connexion" class="input" /><br /><br />
				</td>
            </tr>
        </table>
    </form>

	
	
	
	

<?php include('pied.php');?>