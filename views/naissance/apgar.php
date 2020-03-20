<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">
<P><?php echo "le score d'APGAR  de : ".$this->user[0]['NOM3'];?> <?php echo $this->user[0]['PRENOM5'];?><?php //echo $this->user[0]['id'];?></P>
</div>
<div class="sheader2r">MSPRH</div>
<div class="listl">
	
	<form  name="form1" action="<?php echo URL."naissance/*/".$this->user[0]['id'];?>"  method="POST"> 
	<center>
   <table>
   <tbody>
   <tr>
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Batements cardiaques</label></b></span></td>
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Mouvements respiratoires</label></b></span></td>  
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Tonus musculaire</label></b></span></td>
		 <td class="tdss" ><span class="noir12"><b><label class="lbele">Réactivité à la stimulation</label></b></span></td> 
		 <td class="tdss" ><span class="noir12"><b><label class="lbele">Coloration</label></b></span></td>   
    </tr>
    <tr class="tdsg1"  >
         <td>
           
            <input class="scorradio" type="radio" name="y1" value="0" onclick="apgar1=0, apgar()">Absents  (0)<br><br>
            <input class="scorradio" type="radio" name="y1" value="1" onclick="apgar1=1, apgar()">INF 100 / minutes  (1)<br><br>
            <input class="scorradio" type="radio" name="y1" value="2" onclick="apgar1=2, apgar()">SUP 100 / minutes  (2)<br><br>
           
		</td>
        <td>
           
            <input class="scorradio" type="radio" name="y2" value="0" onclick="apgar2=0, apgar()">Absents  (0)<br><br>
            <input class="scorradio" type="radio" name="y2" value="1" onclick="apgar2=1, apgar()">Lents, irréguliers  (1)<br><br>
            <input class="scorradio" type="radio" name="y2" value="2" onclick="apgar2=2, apgar()">Réguliers, vigoureux, avec cri  (2)<br><br>
            
		</td>
		<td  >
            
            <input class="scorradio" type="radio" name="y3" value="0" onclick="apgar3=0, apgar()">Nul, flasque   (0)<br><br>
            <input class="scorradio" type="radio" name="y3" value="1" onclick="apgar3=1, apgar()">Faible : lègére flexion des extrémités  (1)<br><br>
            <input class="scorradio" type="radio" name="y3" value="2" onclick="apgar3=2, apgar()">Fotrt : quadri-flexion, mvts actifs   (2)<br><br>
           
		</td>
		<td>
            
            <input class="scorradio" type="radio" name="y4" value="0" onclick="apgar4=0, apgar()">Nulle   (0)<br><br>
            <input class="scorradio" type="radio" name="y4" value="1" onclick="apgar4=1, apgar()">Faible : léger mvt, grimace  (1)<br><br>
            <input class="scorradio" type="radio" name="y4" value="2" onclick="apgar4=2, apgar()">Vive : cri, toux   (2)<br><br>
           
		</td>
		<td  >
            
            <input class="scorradio" type="radio" name="y5" value="0" onclick="apgar5=0, apgar()">Globalement bleue ou pâle   (0)<br><br>
            <input class="scorradio" type="radio" name="y5" value="1" onclick="apgar5=1, apgar()">Corps rose, extrémités bleues  (1)<br><br>
            <input class="scorradio" type="radio" name="y5" value="2" onclick="apgar5=2, apgar()">Totalement rose   (2)<br><br>
            
		</td>
      </tr>
      <tr>
            <td  colspan="5" class="tdsg"   >
            <b>Score d'APGAR = </b> 
            <input  id="score" type="text" align="center"  name="apgarscor"  value="" size="32">  
            <input  id="submitr" type="submit" value="Envoyer" />  
			Normal >= 07 
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