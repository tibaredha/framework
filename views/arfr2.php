<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script>
window.onload = function(){
    
	document.getElementById("firstname").onkeydown = function myFunction(e){
            
			var keyCode = window.event ? window.event.keyCode : e.which; 
			
			switch (keyCode) {
			  case 65:
			  this.value += "ض";return false;break;
			  case 90:
			  this.value += "ص";return false;break;
			  case 69:
			  this.value += "ث";return false;break;
				case 82:
			  this.value += "ق";return false;break;
				case 84:
			  this.value += "ف";return false;break;
				case 89:
			  this.value += "غ";return false;break;
				case 85:
			  this.value += "ع";return false;break;
				case 73:
			  this.value += "ه";return false;break;
				case 79:
			  this.value += "خ";return false;break;
				case 80:
			  this.value += "ح";return false;break;
				case 221:
			  this.value += "ج";return false;break;
				case 186:
			  this.value += "د";return false;break;
				case 81:
			  this.value += "ش";return false;break;
				case 83:
			  this.value += "س";return false;break;
				case 68:
			  this.value += "ي";return false;break;
				case 70:
			  this.value += "ب";return false;break;
				
				
				case 71:
			  this.value += "ل";return false;break;
				case 72:
			  this.value += "ا";return false;break;
				case 74:
			  this.value += "ت";return false;break;
				case 75:
			  this.value += "ن";return false;break;
				case 76:
			  this.value += "م";return false;break;
				case 77:
			  this.value += "ك";return false;break;
				case 192:
			  this.value += "ط";return false;break;
				case 220:
			  this.value += "ذ";return false;break;
				
				case 87:
			  this.value += "ئ";return false;break;
				case 88:
			  this.value += "ء";return false;break;
				case 67:
			  this.value += "ؤ";return false;break;
				case 86:
			  this.value += "ر";return false;break;
				case 66:
			  this.value += "لا";return false;break;
				case 78:
			  this.value += "ى";return false;break;
				case 188:
			  this.value += "ة";return false;break;
				case 190:
			  this.value += "و";return false;break;
				case 191:
			  this.value += "ز";return false;break;
				case 223:
			  this.value += "ظ";return false;break;
			}
    }
}
</script>
</head>


<body>


<FORM action="" method="post">
    <P>
              <INPUT type="text" style="direction:RTL;" id="firstname" onkeydown="myFunction()"><BR>

    </P>
 </FORM>

</body>
</html>