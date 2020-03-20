/*poo1*/
// var  personne = {
  // nom: 'ggggggggggggtihhhhba',
  // prenom: 'rehhhhdha',
  // age:'46'
// }
// var mimi = Object.create (personne) ;
//alert ( mimi.nom ) ;
//alert ( personne.nom ) ;
//alert("Hello! I am an alert box!!");


/*poo2*/
// var  voiture  = function  (nom,prenom,age) {
// function voiture (nom,prenom,age) {
// this.nm=nom;
// this.pr=prenom;
// this.ag=age;
// }
// var mavoiture = new voiture ('tiba','redha','55');
//alert ( "hhhhhhh :"+mavoiture.nm ) ;
//alert ( "hhhhhhh :"+mavoiture.ag ) ;

//document.write(mavoiture.nm);
/*fin------------poo-----------*/

/*zoom image */
function changeTaille(dl) {
document.getElementById('image').style.width  = Math.max(parseInt(document.getElementById('image').style.width)+dl,20)+'px';
document.getElementById('image').style.height = Math.max(parseInt(document.getElementById('image').style.height)+dl,20)+'px';
}


var ROOT ="framework";

//*****SCORE D apgar///
var apgar1 = 0; 
var apgar2 = 0; 
var apgar3 = 0;
var apgar4 = 0; 
var apgar5 = 0;       
function apgar() 
{  
var num = apgar1+apgar2+apgar3+apgar4+apgar5;  
document.form1.apgarscor.value = num ;  
}
//*****SCORE De silverman///
var num111 = 0; 
var num222 = 0; 
var num333 = 0;
var num444 = 0; 
var num555 = 0;       
function calculll() 
{ 
num = num111+num222+num333+num444+num555;  
document.form1.ress.value = num ;  
}

//*****SCORE De BISHOP///
var bish0 = 0; 
var bish1 = 0; 
var bish2 = 0; 
var bish3 = 0; 
var bish4 = 0;      
function bishop() 
{ 
num = bish0+bish1+bish2+bish3+bish4;  
document.form1.res.value = num ;  
}

//*****SCORE Glasgow///
var Glasgow1 = 0; 
var Glasgow2 = 0; 
var Glasgow3 = 0;      
function Glasgow() 
{  
var Glasgowa = Glasgow1+Glasgow2+Glasgow3;  
document.form1.Glasgowscor.value = Glasgowa ;  
}


function datep(jour) {
	/* fonction  correct */
	/*
	28 sa 7*28         =196
	37 sa 7*37         =259
	40.5 sa 7*40+ 7/2  =283.5
	42 sa 7*42         =294
	*/
	
	//var jour= 196;//date des dernierre regle 37*7 = 14 +259 = 273  //  266 à 273 de la conception  soit 38SG a 39SG  ou 40SA  a 42SA  
	var DDR= document.getElementById("DDR").value;
    var parts = DDR.split('-');
    var us_date = parts[2]+'-'+parts[1]+'-'+parts[0];
	var redha = addDays(us_date, jour);
	var formatted = redha.getFullYear() + '-' + (redha.getMonth() + 1) + '-' + redha.getDate();
	var today = new Date(formatted);
	var dd = today.getDate();
	var mm = today.getMonth()+1; 
	var yyyy = today.getFullYear();
	if(dd<10) 
	{
		dd='0'+dd;
	} 

	if(mm<10) 
	{
		mm='0'+mm;
	} 
	today = dd+'-'+mm+'-'+yyyy;
	document.getElementById("DPA").value= today; 
	
	var Date1 = new Date(parts[2],parts[1],parts[0]);
	var Date2 = new Date(2018,9,1);
	var sa = diffdate(Date1,Date2)/7; 
	var saa=parseFloat(sa).toFixed(2);
	document.getElementById("SA").value= saa; 
	if (saa >= 37) {
	 $("#SA").css("background-color","green");
	} else {
	  $("#SA").css("background-color","red");
	}
	
	//$("#SA").css("background-color","red");
	//document.getElementById("CIM1").focus();
	//alert("Hello! I am an alert box!");

// Déclaration de grossesse	Avant le Mer 14/11/2018
// 12 SA= 1e échographie	Entre le Mer 17/10/2018 et le Mar 6/11/2018
// Consultation 4ème mois	Entre le Jeu 15/11/2018 et le Ven 14/12/2018
// 22 SA= 2e échographie	Entre le Mer 19/12/2018 et le Mer 16/1/2019
// Consultation 5ème mois	Entre le Sam 15/12/2018 et le Lun 14/1/2019
// Consultation 6ème mois	Entre le Mar 15/1/2019 et le Jeu 14/2/2019
// Consultation 7ème mois	Entre le Ven 15/2/2019 et le Jeu 14/3/2019
// 32 SA= 3e echographie	Entre le Mer 27/2/2019 et le Mer 20/3/2019
// Consultation 8ème mois	Entre le Ven 15/3/2019 et le Ven 29/3/2019
// Consultation 9ème mois	Entre le Lun 15/4/2019 et le Lun 29/4/2019
// 15 SA=Marqueurs sériques	Entre le Mer 14/11/2018 et le Mer 5/12/2018
// Consultation d'anesthésie	Entre le Ven 15/3/2019 et le Lun 29/4/2019
// Préparation à la naissance	A partir du : Mar 15/1/2019
}

function addDays(date, days) {
  var result = new Date(date);
  result.setDate(result.getDate() + days);
  return result;
}
function diffdate(d1,d2) {
var WNbJours = d2.getTime() - d1.getTime();
return Math.ceil(WNbJours/(1000*60*60*24));
}

function stringToDate(_date,_format,_delimiter)
{
            var formatLowerCase=_format.toLowerCase();
            var formatItems=formatLowerCase.split(_delimiter);
            var dateItems=_date.split(_delimiter);
            var monthIndex=formatItems.indexOf("mm");
            var dayIndex=formatItems.indexOf("dd");
            var yearIndex=formatItems.indexOf("yyyy");
            var month=parseInt(dateItems[monthIndex]);
            month-=1;
            var formatedDate = new Date(dateItems[yearIndex],month,dateItems[dayIndex]);
            return formatedDate;
}

// stringToDate("17/9/2014","dd/MM/yyyy","/");
// stringToDate("9/17/2014","mm/dd/yyyy","/")
// stringToDate("9-17-2014","mm-dd-yyyy","-")

// function datePlus($dateDo,$nbrJours)
	// {
	// $timeStamp = strtotime($dateDo); 
	// $timeStamp += 24 * 60 * 60 * $nbrJours;
	// $newDate = date("Y-m-d", $timeStamp);
	// return  $newDate;
	// }

function myFunction() {
	 //tabSwitch('tab_2', 'content_2');
	 //document.getElementById("CIM1").autofocus;
     //document.getElementById("CIM1").focus();
	 // alert("Hello! I am an alert box!");
	 //document.getElementById('content_2').style.display = 'active';  
	 //var x = document.getElementById("MEDECINHOSPIT");
     //x.value = x.value.toUpperCase();
}
function myFunction1() { 
	// tabSwitch('tab_3', 'content_3');
	//document.getElementById("CIM1").autofocus;
    //document.getElementById("CIM1").focus();
	// alert("Hello! I am an alert box!");
	//document.getElementById('content_2').style.display = 'active';  
	//var x = document.getElementById("MEDECINHOSPIT");
    //x.value = x.value.toUpperCase();
}

// show_popup : show the popup
function show_popup(id) {
	// show the popup
	$('#'+id).show();
}

// close_popup : close the popup
function close_popup(id) {
	// hide the popup
	$('#'+id).hide();
}
// show_popup : show the popup fin 

$(function() {    
    $('.delete').click(function(e) {
        var c = confirm(" Vous êtes sure de supprimer l'enregistrement ? \n  Si oui, confirmer la suppression ");
        if (c == false) return false;   
    });   
});
/*service lit*/
$(document).ready(function()
{
		$("#SERVI").change(function()
		{
			var id=$(this).val();var ST=$("#STR").val();var dataString = 'id='+ id + '&id1='+ST; var urlx = "/"+ROOT+"/public/js/ajaxlit.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$("#NLIT").html(html);}});	
		});
});

$(document).ready(function()
{
		$(".WILAYALF").change(function()
		{
			var id=$(this).val();var dataString = 'id='+ id;var urlx = "/"+ROOT+"/public/js/ajaxwc.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$(".COMMUNELF").html(html);}});	
		});
});


/*deces*/

$(document).ready(function()
{
		$(".WILAYAD").change(function()
		{
			var id=$(this).val();var dataString = 'id='+ id;var urlx = "/"+ROOT+"/public/js/ajaxwc.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$(".COMMUNED").html(html);}});
		});

		$(".WILAYAN").change(function()
		{
			var id=$(this).val();var dataString = 'id='+ id;var urlx = "/"+ROOT+"/public/js/ajaxwc.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$(".COMMUNEN").html(html);}});
			
		});
		
	    $(".WILAYAR").change(function()
		{
			var id=$(this).val();var dataString = 'id='+ id;var urlx = "/"+ROOT+"/public/js/ajaxwc.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$(".COMMUNER").html(html);}});
		});

       $(".cim1").change(function()
		{
			var id=$(this).val();var dataString = 'id='+ id;var urlx = "/"+ROOT+"/public/js/ajaxcim.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$(".cim2").html(html);}});
		});
		
});

/*naissance*/
$(document).ready(function()
{
		$(".WILAYA1").change(function()
		{
			var id=$(this).val();var dataString = 'id='+ id;var urlx = "/"+ROOT+"/public/js/ajaxwc.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$(".COMMUNE1").html(html);}});
		});

		$(".WILAYA2").change(function()
		{
			var id=$(this).val();var dataString = 'id='+ id;var urlx = "/"+ROOT+"/public/js/ajaxwc.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$(".COMMUNE2").html(html);}});
		});
		
		$(".WILAYA3").change(function()
		{
			var id=$(this).val();var dataString = 'id='+ id;var urlx = "/"+ROOT+"/public/js/ajaxwc.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$(".COMMUNE3").html(html);}});
		});
		
		$(".WILAYA4").change(function()
		{
			var id=$(this).val();var dataString = 'id='+ id;var urlx = "/"+ROOT+"/public/js/ajaxwc.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$(".COMMUNE4").html(html);}});
		});
		
});

$(document).ready(function()
{
		$(".wilaya").change(function()
		{
			var id=$(this).val();var dataString = 'id='+ id;var urlx = "/"+ROOT+"/public/js/ajaxws.PHP";
			$.ajax({type: "POST",url: urlx ,data: dataString,cache: false,success: function(html){$(".structure").html(html);}});
		});
});



/*Activates the Tabs*/
function tabSwitch(new_tab, new_content) {    
    document.getElementById('content_1').style.display = 'none';  
    document.getElementById('content_2').style.display = 'none';  
    document.getElementById('content_3').style.display = 'none';  
	document.getElementById('content_4').style.display = 'none';  
	
	/*document.getElementById('content_3').style.display = 'none';*/ 
	document.getElementById(new_content).style.display = 'block';     
    document.getElementById('tab_1').className = '';  
    document.getElementById('tab_2').className = '';  
    document.getElementById('tab_3').className = '';  
	document.getElementById('tab_4').className = '';  
	
	/*document.getElementById('tab_3').className = ''; */        
    document.getElementById(new_tab).className = 'active';        
}

function tabSwitchx(new_tab, new_content) {    
    document.getElementById('content_1x').style.display = 'none';  
    document.getElementById('content_2x').style.display = 'none';  
    document.getElementById('content_3x').style.display = 'none';  
	document.getElementById('content_4x').style.display = 'none';  
	
	/*document.getElementById('content_3').style.display = 'none';*/ 
	document.getElementById(new_content).style.display = 'block';     
    document.getElementById('tab_1x').className = '';  
    document.getElementById('tab_2x').className = '';  
    document.getElementById('tab_3x').className = '';  
	document.getElementById('tab_4x').className = '';  
	
	/*document.getElementById('tab_3').className = ''; */        
    document.getElementById(new_tab).className = 'active';        
}

function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}
//generation de code 
 function genererCodeP()
   {
	//var dt_dec= Date('Y');
	var DINS= document.getElementById("DINS").value;
	var DATENS= document.getElementById("DATENS").value;
	var cod_wil= document.getElementById("WILAYAN").value;
	var cod_com= document.getElementById("COMMUNEN").value;
	//var n_acte= document.getElementById("acte").value;
	//var res1 = dt_nais.substring(8, 10);
	//var res2 = dt_dec.substring(13, 15);
	//var codePati= res1+cod_wil+cod_com3+n_acte+res2;
	// if(dt_dec != '' && dt_nais != '' && cod_wil != '' && cod_com3 != '' && n_acte != ''){
	// document.getElementById("show_codeP").style.display="";
	//  document.getElementById("code_patient").value= codePati;           
	//} 
	var val1 = DINS.substring(6, 10);
	var val2 = DATENS.substring(6, 10);
	var val3 = cod_wil.substring(-1);
	var val4 = cod_com.substring(-1);

	var codePati= val2+":"+val3;
	document.getElementById("show_codeP").style.display="";
	document.getElementById("code_patient").value= codePati; 
	}