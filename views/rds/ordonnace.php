<div class="sheader1l"><p id="dashboard">Ordonnance</p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l"><P><?php echo "Femme gestante : ".$this->user[0]['NOM2'];?> <?php echo $this->user[0]['PRENOM2'];?><?php //echo $this->user[0]['id'];?></P><?php $ctrl='rds';?></div>
<div class="sheader2r">MSPRH<?php?></div>
<?php
echo '<div class="listl">';
echo'<form  action="'.URL.$ctrl.'/ajouterArticle/" method="post">';
echo '<label  id="idordonnace">Produit DCI </label>';html::medicament("ord","ordonnace","libelleProduit","","Choisir un produit");echo "</br>";
echo '<label  id="iddoseparprise">Dose / presentation </label>';          echo '<input  class ="ord"  id="doseparprise"      type="text" name="doseparprise"       value="1"/>';
echo '<label  id="idnbrdrfoisparjours">Nbr/jours</label>';                echo '<input  class ="ord"  id="nbrdrfoisparjours" type="text" name="nbrdrfoisparjours"  value="1"/>';
echo '<label  id="idnbrdejours">NBR de Jours</label>';                    echo '<input  class ="ord"  id="nbrdejours"        type="text" name="nbrdejours"         value="10"/>';
echo '<label  id="idqteProduit">NBR de boites </label>';                  echo '<input  class ="ord"  id="qteProduit"        type="text" name="qteProduit"         value="1"/>';
echo '<label  id="idprix">Prix/boite</label>';                            echo '<input  class ="ord"  id="prix"              type="text" name="prixProduit"        value="1"/>';
echo '<label  id="iddate">Date préscription</label>';                     echo '<input  class ="ord"  id="date"              type="text" name="DATE"               value="'.date('d-m-Y').'"/>';
echo '<label  id="idfn">Inclusion Fiche navette</label>';                 echo '<input  class ="ord"  id="fn"                type="checkbox" name="fn"             value="1"/>';
echo '<input  class ="ord"  id="id"                type="hidden" name="id"                 value="'.$this->user[0]['id'].'"/>';
echo '<input  type="hidden" name="STR"             value="'.Session::get('structure').'"/>';
echo '<input  class ="ord"  id="submitord"  type="submit" />';
echo'</form>';
$x=450;
$y=270;
echo "<div  style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
echo"<table width='97%' border='1' cellpadding='5' cellspacing='1' align='left'>";
echo"<tr><th colspan=\"7\">Votre Ordonnance (max 07 medicaments) </th></th>";echo"<tr>";
echo"<tr>";
echo"<th colspan=\"7\">".$this->user[0]['NOM2']."_".$this->user[0]['PRENOM2']." </th>";

echo"<tr>";
echo"<th style=\"width:700px;\"    id=\"tiba\" >Libellé</th>";
echo"<th>Dose</th>";
echo"<th>Nbr/jours</th>";
echo"<th>jours</th>";
echo"<th>Quantite </th>";
echo"<th>Prix</th>";
echo"<th>Action</th>";
echo"</tr>";
echo"</tr>";
	if ( rds::creationPanier()  )
	{
	   $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
	   if ($nbArticles <= 0)
	   {
	   echo '<tr bgcolor="#F0FFF0" ><td align="center" colspan="7" >Votre Ordonnance est vide </ td></tr>';
	   }
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo '<tr  bgcolor="#F0FFF0" >';
	         echo "<td>".View::nbrtostring('pharmacie','id',$_SESSION['ordonnace']['libelleProduit'][$i],'dci').'  '.View::nbrtostring('pharmacie','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre')."</ td>";
	         echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['doseparprise'][$i])."</ td>";
	         echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['nbrdrfoisparjours'][$i])."</ td>";
	         echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['nbrdejours'][$i])."</ td>";
	         echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['qteProduit'][$i])."</ td>";	          
			 echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['prixProduit'][$i])."</ td>";	          
			 echo "<td align=\"center\" ><div id=\"smenux\"><a href=\"".URL."rds/supprimerArticle/".$_SESSION['ordonnace']['libelleProduit'][$i]."/".$this->user[0]['id']."\">X</a></div></td>";  
			 echo "</tr>";
	      }
	      echo '<tr bgcolor="#98F5FF" ><td colspan="7">'; 
		  echo "Nombre total de medicament : ".rds::compterArticles();
		  echo "</td>";	     
		  echo "</tr>";
		  echo '<tr bgcolor="#98F5FF"     ><td colspan="3">Montant total'; 
		  $ttc=rds::MontantGlobal()*1;
		  echo "</td>";
	      echo "<td colspan=\"4\">";
	      echo "Total TTC: ".$ttc." DA ";
	      echo "</td>";
		  echo "</tr>";
		echo '<tr  bgcolor="#F0F8FF" >';//
		     
			  echo "<td align=\"center\"   colspan=\"3\">";
			  echo '<div id="smenux">';
			  echo '&nbsp;'; echo '<a href="'.URL.'rds/supprimePanier/'.$this->user[0]['id'].'">Annuler</a>';echo '&nbsp;'; 
			  echo "</div>";
			  echo "</td>";
			  echo "<td  align=\"center\" colspan=\"4\">";
			  echo '<div id="smenux">';
			  echo '<a href="'.URL.'tcpdf/rds/ord.php?uc='.$this->user[0]['id'].'">Imprimer</a>';echo '&nbsp;'; 
			  echo "</div>";
			  echo "</td>";
			  
		echo "</tr>";	  
	   }
	   echo"<tr><th colspan=\"7\">Votre Ordonnance (max 07 medicaments) </th></th>";
	}
echo"</table>"	;
echo "</div>";


echo "</div>";
?>


<div class="scontentl2"><?php echo "Femme gestante  ";?> </div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		