<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">
<P><?php echo "le Score de SILVERMAN de : ".$this->user[0]['NOM3'];?> <?php echo $this->user[0]['PRENOM5'];?><?php //echo $this->user[0]['id'];?></P>
</div>
<div class="sheader2r">MSPRH</div>
<div class="listl">
	
	<form  name="form1" action="<?php echo URL."naissance/*/".$this->user[0]['id'];?>"  method="POST"> 
	  <center>
   <table  align="center" cellpadding="2" cellspacing="0" bgcolor="#fff7ed" style="border:1px solid  #CCC;">
   <tbody>
   <tr>
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Balancement thoraco-abdominal</label></b></span></td>
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Tirage</label></b></span></td>  
         <td class="tdss" ><span class="noir12"><b><label class="lbele">Entonnoir xyphoidien</label></b></span></td>
		 <td class="tdss" ><span class="noir12"><b><label class="lbele">Batement des ailes du nez</label></b></span></td> 
		 <td class="tdss" ><span class="noir12"><b><label class="lbele">Geignement expiratoire</label></b></span></td>   
    </tr>
    <tr class="tdsg1"   >
         <td class="ligne2" >
           
            <input class="scorradio" type="radio" name="y1" value="4" onclick="num111=0, calculll()">Absents  (0)<br><br>
            <input class="scorradio" type="radio" name="y1" value="3" onclick="num111=1, calculll()">Thorax immobile  (1)<br><br>
            <input class="scorradio" type="radio" name="y1" value="2" onclick="num111=2, calculll()">Respiration paradoxale (2)<br><br>

            
		</td>
        <td class="ligne2" >
           
            <input class="scorradio" type="radio" name="y2" value="4" onclick="num222=0, calculll()">Absents  (0)<br><br>
            <input class="scorradio" type="radio" name="y2" value="3" onclick="num222=1, calculll()">intercostal discret  (1)<br><br>
            <input class="scorradio" type="radio" name="y2" value="2" onclick="num222=2, calculll()">intercostal + sus et sous sternal  (2)<br><br>
           
		</td>
		<td class="ligne2" >
           
            <input class="scorradio" type="radio" name="y3" value="4" onclick="num333=0, calculll()">Absents   (0)<br><br>
            <input class="scorradio" type="radio" name="y3" value="3" onclick="num333=1, calculll()">modéré  (1)<br><br>
            <input class="scorradio" type="radio" name="y3" value="2" onclick="num333=2, calculll()">intense   (2)<br><br>
           
		</td>
		<td class="ligne2" >
           
            <input class="scorradio" type="radio" name="y4" value="4" onclick="num444=0, calculll()">Absents   (0)<br><br>
            <input class="scorradio" type="radio" name="y4" value="3" onclick="num444=1, calculll()">modéré  (1)<br><br>
            <input class="scorradio" type="radio" name="y4" value="2" onclick="num444=2, calculll()">intense   (2)<br><br>
            
		</td>
		<td class="ligne2" >
          
            <input class="scorradio" type="radio" name="y5" value="4" onclick="num555=0, calculll()">Absents  (0)<br><br>
            <input class="scorradio" type="radio" name="y5" value="3" onclick="num555=1, calculll()">perçu au sthétoscope  (1)<br><br>
            <input class="scorradio" type="radio" name="y5" value="2" onclick="num555=2, calculll()">audible continu   (2)<br><br>
           
		</td>
      </tr>
     
       <tr>
         <td  colspan="5" class="tdsg"   >
            <b> Score de SILVERMAN = </b> 
            <input  id="score" type="text" align="center"  name="ress"  value="" size="32">  
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