function draw(f,f1,f2) { 
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
  var x;
  with(Math) 
  { 
    ctx.strokeStyle = "red";
    ctx.lineWidth=2;
    ctx.beginPath();
    x=0
    
	var u=eval(f)
    ctx.moveTo(-W, H-u*sc)
    for(x=-W/(2*sc); x<=W/(2*sc); x+=1/sc) 
	{
      u=eval(f)
      ctx.lineTo((W/2)+x*sc, H-u*sc)
    }
    
	var u1=eval(f1)
    ctx.moveTo(-200, H-u1*sc)
    for(x=-W/(2*sc); x<=W/(2*sc); x+=1/sc) 
	{
     u1=eval(f1)
     ctx.lineTo(200+x*sc, H-u1*sc)
    }
	
	var u2=eval(f2)
    ctx.moveTo(-200, H-u2*sc)
    for(x=-W/(2*sc); x<=W/(2*sc); x+=1/sc) 
	{
     u2=eval(f2)
     ctx.lineTo(200+x*sc, H-u2*sc)
    }
  }
  //ctx.closePath();
  ctx.stroke();
}


function tracer()
{
	var b = document.forms[0].formule.value;
	if (b !="") {var f = "7+" + b}else {var f = "0"}

	var c = document.forms[0].formule1.value;
	if (c !=""){var f1 = "7+" + c}else {var f1 = "0"};
	
	var d = document.forms[0].formule2.value;
	if (d !="") {var f2 = "7+" + d}else {var f2 = "0"};
	
	draw(f,f1,f2);
}

window.onload = function(){ 
 tracer();
}

