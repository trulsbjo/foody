function getAllComments(parentPost){
    var XMLfile="../comments/"+parentPost+".xml";

    if (window.XMLHttpRequest)
    {
        xhttp=new XMLHttpRequest();
    }
    else // code for IE5 and IE6
    {
        xhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.open("GET",XMLfile,false);
    xhttp.send();
    xmlDoc=xhttp.responseXML; 

    x = xmlDoc.getElementsByTagName("post");

    for(i=0;i<x.length;i++){
        t1=x[i];
        var name = t1.getElementsByTagName("name")[0].childNodes[0].nodeValue;
        var date = t1.getElementsByTagName("date")[0].childNodes[0].nodeValue;
        var comment = t1.getElementsByTagName("comment")[0].childNodes[0].nodeValue;
        document.write("<p class=\"comment\">");
        document.write("Forfatter: "+name+"<br />");
        document.write("Postet: <small>"+date+"</small><br />");
        document.write("Kommentar:<br />"+comment+"</p>");
    }
}
