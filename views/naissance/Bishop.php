<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">
<P><?php echo "le score de BISHOP de : ".$this->user[0]['NOM2'];?> <?php echo $this->user[0]['PRENOM2'];?><?php //echo $this->user[0]['id'];?></P>
</div>
<div class="sheader2r">MSPRH</div>
<div class="listl">
	
	<form  name="form1" action="<?php echo URL."naissance/*/".$this->user[0]['id'];?>"  method="POST"> 
	<center>
   <table>
   <tbody>
   <tr>
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Dilatation col utérin</label></b></span></td>
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Effacement col utérin</label></b></span></td>  
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Consistance col utérin</label></b></span></td>
		 <td class="tdss" ><span class="noir12"><b><label class="lbele">Position col utérin</label></b></span></td> 
		 <td class="tdss" ><span class="noir12"><b><label class="lbele">Position présentation </label></b></span></td>   
    </tr>
    <tr class="tdsg1"  >
         <td>
           
            <input class="scorradio" type="radio" name="y1" value="0" onclick="bish0=0, bishop()">fermé (0)<br><br>
            <input class="scorradio" type="radio" name="y1" value="1" onclick="bish0=1, bishop()">1 - 2 cm (1)<br><br>
            <input class="scorradio" type="radio" name="y1" value="2" onclick="bish0=2, bishop()">3 - 4 cm (2)<br><br>
            <input class="scorradio" type="radio" name="y1" value="3" onclick="bish0=3, bishop()"> > 5 cm (3)<br><br>
		</td>
        <td>
           
            <input class="scorradio" type="radio" name="y2" value="0" onclick="bish1=0, bishop()">00 - 30% (0)<br><br>
            <input class="scorradio" type="radio" name="y2" value="1" onclick="bish1=1, bishop()">40 - 50% (1)<br><br>
            <input class="scorradio" type="radio" name="y2" value="2" onclick="bish1=2, bishop()">60 - 70% (2)<br><br>
			<input class="scorradio" type="radio" name="y2" value="3" onclick="bish1=3, bishop()"> >80 % (3)<br><br>
            
		</td>
		<td  >
            
            <input class="scorradio" type="radio" name="y3" value="0" onclick="bish2=0, bishop()">ferme (0)<br><br>
            <input class="scorradio" type="radio" name="y3" value="1" onclick="bish2=1, bishop()">moyenne (1)<br><br>
            <input class="scorradio" type="radio" name="y3" value="2" onclick="bish2=2, bishop()">molle (2)<br><br>
           
		</td>
		<td>
            
            <input class="scorradio" type="radio" name="y4" value="0" onclick="bish3=0, bishop()">postérieure (0)<br><br>
            <input class="scorradio" type="radio" name="y4" value="1" onclick="bish3=1, bishop()">centrale (1)<br><br>
            <input class="scorradio" type="radio" name="y4" value="2" onclick="bish3=2, bishop()">antérieure (2)<br><br>
           
		</td>
		<td  >
            
            <input class="scorradio" type="radio" name="y5" value="0" onclick="bish4=0, bishop()">mobile (0)<br><br>
            <input class="scorradio" type="radio" name="y5" value="1" onclick="bish4=1, bishop()">amorcée (1)<br><br>
            <input class="scorradio" type="radio" name="y5" value="2" onclick="bish4=2, bishop()">fixée (2)<br><br>
            <input class="scorradio" type="radio" name="y5" value="3" onclick="bish4=3, bishop()">engagée (3)<br><br>
			
		</td>
      </tr>
      <tr>
         <td  colspan="5" class="tdsg"   >
            <b>Score BISHOP = </b> 
            <input  id="score" type="text" align="center"  name="res"  value="" size="32">  
            <input  id="submitr" type="submit" value="Envoyer" /> 
			<b> * Score BISHOP normal => 7 </b> 
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