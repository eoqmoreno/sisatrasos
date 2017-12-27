
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
    
                document.getElementById("txtHint").innerHTML = this.responseText;
            
        }
        xmlhttp.open("post", "cadastro.php");
        xmlhttp.send();

