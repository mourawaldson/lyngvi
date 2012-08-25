function exibeNoticia(a){
	document.getElementById("noticiaExibida").style.visibility = "visible";
	document.getElementById("noticiaExibida").innerHTML = "<img src='./imgs/ajax-loader.gif' /> carregando...";
	setTimeout("document.getElementById(\"noticiaExibida\").innerHTML =\""+a+"\"",1000);
}