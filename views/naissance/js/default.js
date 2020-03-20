function carrex(ctx,x,y,l,c,color) {
	for (var i = 0; i < (20*l); i+=20) {        
	carres(ctx,x,y+i,c,color);	
	}
}
function carres(ctx,x,y,c,color) {
    ctx.fillStyle = color;
    for (var iter = x; iter < x+(c*14.5); iter+=14.5) {	
	ctx.fillRect(iter,y,14,16);	
    }
}

function txt(ctx,t,x,y) {
ctx.fillStyle = "black";ctx.textAlign = "left";ctx.font = "10px Arial";
ctx.fillText(t,x,y);
}

function horaire(ctx,x,y) {
ctx.beginPath();
for (var i = x; i < x+(14.5*24); i+=14.5) {	
ctx.fillStyle = "black";ctx.textAlign = "center";ctx.font = "10px Arial";
ctx.fillText(Math.round(i/14.5),i,y);
}
ctx.fill();
}

function indicateur(ctx,y,ind,color) {
ctx.strokeStyle = color;ctx.fillStyle = color;ctx.lineWidth=3;
ctx.beginPath();
for (var i = 0; i < DHE.length-1; i++) {	
ctx.moveTo(DHE[i]+1,ind[i]+y);ctx.lineTo(DHE[i+1]+1,ind[i+1]+y);
}
ctx.closePath();
ctx.stroke();ctx.lineWidth=1;
for (var i = 0; i < DHE.length; i++) {	
ctx.beginPath();ctx.arc(DHE[i]+1, ind[i]+y, 5, 0, Math.PI * 2);ctx.fill();ctx.closePath();
}
}

function ta(ctx,color) {
ctx.fillStyle = color;ctx.lineWidth=3;
for (var i = 0; i < DHE.length; i++) {	
ctx.beginPath();ctx.arc(DHE[i]+1, TAS[i], 2, 0, Math.PI * 2);ctx.fill();ctx.closePath();
}

for (var i = 0; i < DHE.length; i++) {	
ctx.beginPath();ctx.arc(DHE[i]+1, TAD[i], 2, 0, Math.PI * 2);ctx.fill();ctx.closePath();
}

ctx.beginPath();ctx.strokeStyle = "black";
ctx.lineWidth=5;
for (var i = 0; i < DHE.length; i++) {	
ctx.moveTo(DHE[i]+1,TAS[i]);ctx.lineTo(DHE[i]+1,TAD[i]);//
}
ctx.stroke();
ctx.lineWidth=1;ctxm.closePath();
}

function line(ctx,x1,y1,x2,y2,color) {
ctx.beginPath();
ctx.lineWidth=3;ctx.strokeStyle = "#DC143C";
ctx.moveTo(x1,y1);ctx.lineTo(x2,y2);
ctx.stroke();
ctx.lineWidth=1;
ctx.closePath();
}






