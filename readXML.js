function getAllComments(parentPost){
    var XMLfile="../comments/"+parentPost+".xml?rand=" + Math.random();

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

    var commentParagraph=document.getElementById("comments-cnt");
    for(i=0;i<x.length;i++){
        t1=x[i];
        var name = t1.getElementsByTagName("name")[0].childNodes[0].nodeValue;
        var date = t1.getElementsByTagName("date")[0].childNodes[0].nodeValue;
        var comment = t1.getElementsByTagName("comment")[0].childNodes[0].nodeValue;
        var para = document.createElement("p");
        para.setAttribute("class", "comment");
        var forfatter_span = document.createElement("span");
        var postet_span = document.createElement("span");
        var comment_span = document.createElement("span");

        forfatter_span.appendChild(document.createTextNode("Forfatter: "+name));
        forfatter_span.appendChild(document.createElement("br"));

        var small=document.createElement("small");
        small.appendChild(document.createTextNode(date));
        postet_span.appendChild(document.createTextNode("Postet: "));
        postet_span.appendChild(small);
        postet_span.appendChild(document.createElement("br"));

        comment_span.appendChild(document.createTextNode("Kommentar:"));
        comment_span.appendChild(document.createElement("br"));
        comment_span.appendChild(document.createTextNode(comment));

        para.appendChild(forfatter_span);
        para.appendChild(postet_span);
        para.appendChild(comment_span);
        commentParagraph.appendChild(para);
    }
}
