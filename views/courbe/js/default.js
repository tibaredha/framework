
// let tiba ={
	// nom:"tiba",
	// prenom:"redha",
	// changeTaille : function(f,f1,f2){console.log("J'habite a " +f);},
	// draw : function(f,f1,f2){console.log("J'habite a " +f1);},
	// age:"2000"
	
// };


// try {
// tiba.changeTaille ("ffsgdsdfsdfff","","");
// tiba.draw ("","ffsgdsdfsdfff","");
// alert (tiba.age);
// }
// catch(err){
// alert(err);
// }


function draw(f,f1,f2,fun_selector) { 
	// Largeur et hauteur en pixels
	var W=400, H=300
	var canvas = document.getElementById("graphe");
	canvas.width=W; 
	canvas.height=H;
	var ctx = canvas.getContext("2d");
   
	
    // nb de pixels pour une unité
	var sc=20;
    //axe des x 
	ctx.strokeStyle = "black";
	ctx.moveTo(0,160);ctx.lineTo(420,160);
	//numerotation x
	for(var xg=0;xg<W;xg+=sc)
	{
	  ctx.moveTo(xg,155);ctx.lineTo(xg,160);
	  ctx.fillText(xg.toString()/sc-10,xg-2,175);
	}
	ctx.stroke();
	
	//axe des y 
	ctx.moveTo(200,0);ctx.lineTo(200,300);
	ctx.stroke();
	//numerotation y
	for(var xg=0;xg<W;xg+=sc)
	{
	  ctx.moveTo(200,xg);ctx.lineTo(205,xg);
	  ctx.fillText((xg.toString()/sc-10)*-1,185,xg-38);
	}
	ctx.stroke();

	// tracé du quadrillage
    ctx.strokeStyle = "silver";
    ctx.beginPath();
    ctx.lineWidth=0.2;
    // lignes horizontales
    for(var i=0; i<=H/sc; i++) {ctx.moveTo(0, H-sc*i);ctx.lineTo(W, H-sc*i)}
    // lignes verticales
    for(var i=0; i<=W/sc; i++) {ctx.moveTo(sc*i,H-0);ctx.lineTo(sc*i, H-H)}
    ctx.stroke();
  
  
  // tracé de la fonction
  
  with(Math) 
  { 
    var x=0;
	var a=document.forms[0].rangea.value;
    var b=document.forms[0].rangeb.value;
    var c=document.forms[0].rangec.value;
   
    
	//document.write("x : "+x);document.write('<br>');
	//document.write("f : "+f);document.write('<br>');
	//document.write("u : "+u);document.write('<br>');
	//document.write("-w : "+-W);document.write('<br>');
	//document.write("h : "+H);document.write('<br>');
	//document.write("sc : "+sc);document.write('<br>');
	//document.write("H-u*sc : "+(H-(u*sc)));document.write('<br>');
    
    //ctx.fillText("/*****************/",-10,160);
    //document.write("x1 : "+roundToTwo(x1));document.write('<br>');
	//document.write("y1 : "+roundToTwo(y1));document.write('<br>'); 
	
	//*****************************************//
	if(f!=0){
	ctx.strokeStyle = "red";
    ctx.lineWidth=2;
    ctx.beginPath();
	var u=eval(f)
	ctx.moveTo(-W, H-u*sc);
	
    for(x=-W/(2*sc); x<=W/(2*sc); x+=1/sc) 
	{ 
	  x1 = (W/2)+x*sc;
	  y1 = H-(eval(f))*sc;
      ctx.lineTo( x1,y1); 
	}
	ctx.stroke();
    ctx.closePath();
	}
    //*****************************************//
	if(f!=0){
	ctx.strokeStyle = "green";
    ctx.lineWidth=2;
    ctx.beginPath();
	var u1=eval(f1)
    ctx.moveTo(-200, H-u1*sc)
    for(x=-W/(2*sc); x<=W/(2*sc); x+=1/sc) 
	{
     u1=eval(f1)
     ctx.lineTo(200+x*sc, H-u1*sc)
    }
	ctx.stroke();
    ctx.closePath();
	}
    //*****************************************//
	if(f2!=0){
	ctx.strokeStyle = "blue";
    ctx.lineWidth=2;
    ctx.beginPath();
	var u2=eval(f2)
    ctx.moveTo(-200, H-u2*sc)
    for(x=-W/(2*sc); x<=W/(2*sc); x+=1/sc) 
	{
     u2=eval(f2)
     ctx.lineTo(200+x*sc, H-u2*sc)
    }
    ctx.stroke();
    ctx.closePath();
	}
    //*****************************************//
    
	if(fun_selector!=0){
	//add rectangle plein
	// ctx.beginPath();
	// ctx.rect(20, 20, 140, 100);
	// var my_gradient = ctx.createLinearGradient(0, 0, 0, 170);
	// my_gradient.addColorStop(0, "black");
	// my_gradient.addColorStop(1, "white");
	// ctx.fillStyle = my_gradient;
	// ctx.fill();
	// ctx.closePath();
	
	// ctx.beginPath();
	// ctx.lineWidth="2";
	// ctx.arc(200, 160, 80, 0, 2 * Math.PI);
	// ctx.stroke();
	
    //ctx.fillStyle="Cyan";
	ctx.strokeStyle = "black";
	ctx.lineWidth=2;
    ctx.beginPath();
	var u3=eval(fun_selector)
    ctx.font = "15px Georgia";
	ctx.fillText(document.forms[0].fun_selector.value,20,20);
	ctx.moveTo(-200, H-u3*sc)
    for(x=-W/(2*sc); x<=W/(2*sc); x+=1/sc) 
	{
	 u3=eval(fun_selector)
     ctx.lineTo(200+x*sc, H-u3*sc)
    }
    ctx.stroke();
    //ctx.fill();
	ctx.closePath();	
	
	
	}
	
  }
  
}


function roundToTwo(num) {    
    return +(Math.round(num + "e+3")  + "e-3");
}

function tracer()
{
	var v0 = document.forms[0].f.value;
	if (v0 !="") {var f = "7+" + v0}else {var f = "0"}

	var v1 = document.forms[0].f1.value;
	if (v1 !=""){var f1 = "7+" + v1}else {var f1 = "0"};
	
	var v2 = document.forms[0].f2.value;
	if (v2 !="") {var f2 = "7+" + v2}else {var f2 = "0"};
	
	var v3 = document.forms[0].fun_selector.value;
	if (v3 !="") {var fun_selector = "7+" + v3}else {var fun_selector = "0"};
		
	draw(f,f1,f2,fun_selector);
}

window.onload = function(){ 
 tracer();
 startTime();
}

