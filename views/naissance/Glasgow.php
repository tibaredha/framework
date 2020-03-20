<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">
<P><?php echo "le score de Glasgow  de : ".$this->user[0]['NOM2'];?> <?php echo $this->user[0]['PRENOM2'];?><?php //echo $this->user[0]['id'];?></P>
</div>
<div class="sheader2r">MSPRH</div>
<div class="listl">
	
	<form  name="form1" action="<?php echo URL."naissance/*/".$this->user[0]['id'];?>"  method="POST"> 
	<center>
   <table>
   <tbody>
   <tr>
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Ouverture des   yeux</label></b></span></td>
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Réponse   verbale</label></b></span></td>  
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Meilleure  réponse motrice</label></b></span></td>	
    </tr>
    <tr class="tdsg1"  >
         <td> 
            <input class="scorradio" type="radio" name="yeux" value="4" onclick="Glasgow1=4, Glasgow()">Spontanée (4)<br><br>
            <input class="scorradio" type="radio" name="yeux" value="3" onclick="Glasgow1=3, Glasgow()">A la demande (3)<br><br>
            <input class="scorradio" type="radio" name="yeux" value="2" onclick="Glasgow1=2, Glasgow()">A la douleur (2)<br><br>
            <input class="scorradio" type="radio" name="yeux" value="1" onclick="Glasgow1=1, Glasgow()">Aucune (1)<br><br> 
		</td>
        <td>  
            <input class="scorradio" type="radio" name="repver" value="5" onclick="Glasgow2=5, Glasgow()">Orientée (5)<br><br>
            <input class="scorradio" type="radio" name="repver" value="4" onclick="Glasgow2=4, Glasgow()">Confuse (4)<br><br>
            <input class="scorradio" type="radio" name="repver" value="3" onclick="Glasgow2=3, Glasgow()">Inappropriée (3)<br><br>
            <input class="scorradio" type="radio" name="repver" value="2" onclick="Glasgow2=2, Glasgow()">Incompréhensible (2)<br><br>
            <input class="scorradio" type="radio" name="repver" value="1" onclick="Glasgow2=1, Glasgow()">Aucune (1)
		</td>
		<td>  
            <input class="scorradio" type="radio" name="repmo" value="6" onclick="Glasgow3=6, Glasgow()">Obéit à la demande verbale (6)<br><br>
            <input class="scorradio" type="radio" name="repmo" value="5" onclick="Glasgow3=5, Glasgow()">Orientée à la douleur (5)<br><br>
            <input class="scorradio" type="radio" name="repmo" value="4" onclick="Glasgow3=4, Glasgow()">Evitement non adapté (4)<br><br> 
            <input class="scorradio" type="radio" name="repmo" value="3" onclick="Glasgow3=3, Glasgow()">Décortication (flexion à la douleur)(3)<br><br>
            <input class="scorradio" type="radio" name="repmo" value="2" onclick="Glasgow3=2, Glasgow()">Décérébration (extension à la douleur) (2)<br><br> 
            <input class="scorradio" type="radio" name="repmo" value="1" onclick="Glasgow3=1, Glasgow()">Aucune (1)<br>   
		</td>
      </tr>
      <tr>
         <td  colspan="5" class="tdsg"   >
            <b>Score Glasgow = </b> 
            <input  id="score" type="text" align="center"  name="Glasgowscor"  value="" size="32">  
            <input  id="submitr" type="submit" value="Envoyer" />  
			</td>
      </tr>
     
   </tbody>
   </table>
   </center>
 
	</form> 
</div>	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	