"use strict";

window.onload = function()
{
    console.log("Window loaded");
    var contentbox = document.getElementById("content");
    var anchorlist = document.getElementsByTagName("a");
    console.log(anchorlist);
    Array.from(anchorlist).forEach(function (anchor)
    {
        anchor.addEventListener("click", function(event)
        {
            event.preventDefault;
            var source = event.target.href;
            console.log(source);
            if (source=="home.php")
            {
                fetch("home.php")
                .then(console.log("Fetching"))
                .then(response => response.text())
                .then(data => contentbox.innerHTML = data)
                .catch(error => 
                {
                    console.log("There was an error");
                    console.log(error);
                });
                var button1 = contentbox.getElementById("");
                button1.addEventListener("click", createIssueButtonClick)
            }
            else if(source=="user.php")
            {
                fetch("user.php")
                .then(console.log("Fetching"))
                .then(response => response.text())
                .then(data => contentbox.innerHTML = data)
                .catch(error => 
                {
                    console.log("There was an error");
                    console.log(error);
                });
                var form = contentbox.getElementById("");
                form.addEventListener('submit', function (element) 
                {
                    var firstname = form.getElementById("").value.trim();
                    var lastname = form.getElementById("").value.trim();
                    var password = form.getElementById("").value.trim();
                    var email = form.getElementById("").value.trim();
                    if (isEmpty(firstname) || isEmpty(lastname) || isEmpty(password) || isEmpty(email))
                    {
                        myform.getElementById("message").innertext = "Please complete the form before submitting.";
                        element.preventDefault();
                    }
                    if(!loginUser(email, password))
                    {
                        element.preventDefault();
                    }
                });
            }
            else if (source=="create.php")
            {
                fetch("create.php")
                    .then(console.log("Fetching"))
                    .then(response => response.text())
                    .then(data => contentbox.innerHTML = data)
                    .catch(error => 
                    {
                        console.log("There was an error");
                        console.log(error);
                    });
                var form = contentbox.getElementById("")
                form.addEventListener('submit', function (element) 
                {
                    var title = form.getElementById("").value.trim();
                    var description = form.getElementById("").value.trim();
                    var assignedTo = form.getElementById("").value
                    var type = form.getElementById("").value;
                    var priority = form.getElementById("").value;
                    if (isEmpty(title) || isEmpty(description) || isEmpty(assignedTo) || isEmpty(type) || isEmpty(priority))
                    {
                        myform.getElementById("message").innertext = "Please complete the form before submitting.";
                        element.preventDefault();
                    }
                });
            }
            else (source==id3)
            {
                source = "logout";
            }
        });
    });
    var homebutton = contentbox.getElementById("");
    homebutton.addEventListener("click", createIssueButtonClick)
    // should be similar to home.php fetch button event

    function createIssueButtonClick()
    {
        // Could I just trigger the navigation link here
        fetch("create.php")
            .then(console.log("Fetching"))
            .then(response => response.text())
            .then(data => contentbox.innerHTML = data)
            .catch(error => 
            {
                console.log("There was an error");
                console.log(error);
            });
        var form = contentbox.getElementById("")
        form.addEventListener('submit', function (element) 
        {
            var title = form.getElementById("").value.trim();
            var description = form.getElementById("").value.trim();
            var assignedTo = form.getElementById("").value
            var type = form.getElementById("").value;
            var priority = form.getElementById("").value;
            if (isEmpty(title) || isEmpty(description) || isEmpty(assignedTo) || isEmpty(type) || isEmpty(priority))
            {
                myform.getElementById("message").innertext = "Please complete the form before submitting.";
                element.preventDefault();
            }
        });
    
    }

    

}
function loginUser(email, password)
{
    var passwordexpression = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/;
    var emailexpression = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    //Double check regex
    if (emailexpression.test(email))
    {
        console.log("Valid email");
        if (passwordexpression.test(password) && password.length >=8)
        {
            console.log("Valid password");
            return true;
        }
        else
        {
            console.log("Invalid password");
            return false;
        }        
    }
    else
    {
        console.log("Invalid email");
        return false;
    }    
}

