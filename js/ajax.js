try{
    xmlhttp = new XMLHttpRequest();
}catch(ee){
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(E){
            xmlhttp = false;
        }
    }
}

atual=0
function carrega(n){

    //Exibe o texto carregando no div conteúdo
    var conteudo=document.getElementById("noticiaExibida")
    conteudo.innerHTML='<img src="./imgs/ajax-loader.gif" /> carregando...'

    //Guarda a página escolhida na variável atual
    atual=n

    //Abre a url
    xmlhttp.open("GET", "../Lyngvi/index.php?acao=mostrarNoticia?n="+n,true);

    //Executada quando o navegador obtiver o código
    xmlhttp.onreadystatechange=function() {

        if (xmlhttp.readyState==4){

            //Lê o texto
            var texto=xmlhttp.responseText

            //Desfaz o urlencode
            texto=texto.replace(/\+/g," ")
            texto=unescape(texto)

            //Exibe o texto no div conteúdo
            var conteudo=document.getElementById("noticiaExibida")
            conteudo.innerHTML=texto

     /*       //Obtém os links do menu
            var menu=document.getElementById("menu")
            var links=menu.getElementsByTagName("a")

            //Limpa as classes do menu
            for(var i=0;i<links.length;i++)
                links[i].className=""

            //Marca o selecionado
            links[atual-1].className="selected" */
        }
    }
    xmlhttp.send(null)
}

function menuclick(e){

    //Correção para eventos quebrados da Microsoft
    if(typeof(e)=='undefined')var e=window.event
    source=e.target?e.target:e.srcElement
    //Correção para o bug do Konqueror/Safari
    if(source.nodeType==3)source=source.parentNode

    //Obtém o número quebrando a url
    n=source.getAttribute("href").replace(/.*=/,"")

    //Chama o carrega
    carrega(parseInt(n))

    //Cancela o click (evita a navegação)
    return false
}
