"use strict";

window.onload = function()
{
    console.log("Window loaded");
    var lookupresult = document.getElementById("result");
    var anchorlist = document.getElementsByTagName("a");
    console.log(anchorlist);
    Array.from(anchorlist).forEach(function (anchor)
    {
        
        anchor.addEventListener("click", function(event)
        {
            event.preventDefault;
            var filename = "";
            var source = event.target.id;
            console.log(source);
            if (source==id1)
            {
                source = "Homepage";
            }
            else if(source==id2)
            {
                source = "adduserpage";
            }
            else if (source==id3)
            {
                source = "newissuepage";
            }
            else (source==id3)
            {
                source = "logout";
            }
            fetch(`${source}`)
                .then(console.log("Fetching"))
                .then(response => response.text())
                .then(data => lookupresult.innerHTML = data)
                //add button listners here
                .catch(error => 
                {
                    console.log("There was an error");
                    console.log(error);
                });
        });
    });
};

function login(event)
{
    event.preventDefault();
    clearErrors();
    var emailexpression = "expression";
    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value.trim();
    if (emailexpression.test(email))
    {

    }
    else
    {
        alert("Email entered incorrectly")
    }
}
