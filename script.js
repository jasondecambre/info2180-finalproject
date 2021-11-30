"use strict";

window.onload = function()
{
    console.log("Window loaded");
    var contentbox = document.getElementById("content")
    var navigation = document.getElementById("left-sidebar");
    //console.log(navigation);
    var anchorlist = navigation.getElementsByTagName("a");
    console.log(anchorlist);
    Array.from(anchorlist).forEach(function (anchor)
    {
        anchor.addEventListener("click", function(event)
        {
            event.preventDefault();
            //var link_source = event.target.href; // Produces absolute path
            var link_source = event.target.getAttribute("href"); // Produces relative path
            console.log(link_source);
            if (link_source=="home.php")
            {
                fetch("home.php")
                    .then(console.log("Fetching"))
                    .then(response => response.text())
                    .then(data => 
                    {
                        contentbox.innerHTML = data;
                        //console.log(contentbox);
                        var button_issue = contentbox.getElementsByTagName("div")[0].getElementsByTagName("button")[0];
                        //console.log(button_issue);
                        button_issue.addEventListener("click", function()
                        {
                            var link_issue = document.getElementById('issue');
                            link_issue.click();
                        });
                        var description_links = contentbox.getElementsByTagName("a");
                        Array.from(description_links).forEach(function (description_link)
                        {
                            description_link.addEventListener("click", function(event)
                            {
                                fetch("description.php")
                                    .then(console.log("Fetching"))
                                    .then(response => response.text())
                                    .then(data => contentbox.innerHTML = data)
                                    .catch(error => 
                                    {
                                        console.log("There was an error");
                                        console.log(error);
                                    });
                                var description_buttons = contentbox.getElementsByTagName("button");
                                var markedClosed = description_buttons[0];
                                var markedInProgress = description_buttons[1];
                                markedClosed.addEventListener("click", function()
                                {
                                    const date = new Date();
                                //date.toDateString();
                                // Update issue in database
                                    console.log("Marked as close");
                                });
                                markedInProgress.addEventListener("click", function()
                                {
                                    const date = new Date();
                                //date.toDateString();
                                //Update issue in database
                                    console.log("Marked as in progress");
                                });
                                event.preventDefault();
                            });
                        });
                        var filterdiv = document.getElementById("filterBy");
                        var filteropt = filterdiv.getElementsByTagName("button");
                        Array.from(filteropt).forEach(function (filter)
                        {
                            filter.addEventListener("click", function(event)
                            {
                                //Fetch the homepage or the table data file based on each filterwill need to check source
                                // Is status in the table a button of coloured cell
                                console.log(event.target.id);
                                fetch(`filename.php?filter=${event.target.id}`)
                                    .then(console.log("Fetching"))
                                    .then(response => response.text())
                                    .then(data => contentbox.innerHTML = data)
                                    .catch(error => 
                                    {
                                        console.log("There was an error");
                                        console.log(error);
                                    });
                                
                                event.preventDefault();
                                //code for filter of table issues
                            });
                        });
                    })
                    .then(console.log("Fetch complete"))
                    .catch(error => 
                    {
                        console.log("There was an error");
                        console.log(error);
                    });
                navigation.classList.remove("hidden");
                console.log("Navigation shown");
                console.log("Home page loaded");
            }
            else if(link_source=="user.php")
            {
                //how do I check if user is the administrator
                //diable link if not the administrator
                // Will be done via PHP/MySQL
                fetch("user.php")
                    .then(console.log("Fetching"))
                    .then(response => response.text())
                    .then(data => contentbox.innerHTML = data)
                    .then(console.log("Fetch complete"))
                    .catch(error => 
                    {
                        console.log("There was an error");
                        console.log(error);
                    });
                var form = contentbox.getElementById("new-user-form");
                form.addEventListener('submit', function (element) 
                {
                    var firstname = form.getElementById("fname").value.trim();
                    var lastname = form.getElementById("lname").value.trim();
                    var password = form.getElementById("password").value.trim();
                    var email = form.getElementById("email").value.trim();
                    if (isEmpty(firstname) || isEmpty(lastname) || isEmpty(password) || isEmpty(email))
                    {
                        myform.getElementById("mew-user-message").innertext = "Please complete the form before submitting.";
                        element.preventDefault();
                    }
                    else
                    {
                        if(checkLogin(email, password))
                        {
                            console.log("User information added.");
                        }
                        else
                        {
                            element.preventDefault();
                        }
                    }                    
                });
                console.log("Add User page loaded");
            }
            else if (link_source=="create.php")
            {
                fetch("create.php")
                    .then(console.log("Fetching"))
                    .then(response => response.text())
                    .then(data => 
                    {
                        contentbox.innerHTML = data;
                        var form = contentbox.getElementsByTagName("form")[0];
                        form.addEventListener('submit', function (element) 
                        {
                            //How do we update AssignedTo with list of all current users
                            var title = form.getElementById("title").value.trim();
                            var description = form.getElementById("description").value.trim();
                            var assignedTo = form.getElementById("").value
                            var type = form.getElementById("assigned").value;
                            var priority = form.getElementById("priority").value;
                            if (isEmpty(title) || isEmpty(description) || isEmpty(assignedTo) || isEmpty(type) || isEmpty(priority))
                            {
                                myform.getElementById("create-issue-message").innertext = "Please complete the form before submitting.";
                                event.preventDefault();
                            }
                            else
                            {
                                console.log("New Issue Added");
                            }        
                        });
                    })
                    .then(console.log("Fetch complete"))
                    .catch(error => 
                    {
                        console.log("There was an error");
                        console.log(error);
                    });
                console.log("Create Issue page loaded");
            }
            else if (link_source=="logout.php")
            {
                fetch("logout.php")
                    .then(console.log("Fetching"))
                    .then(response => response.text())
                    //.then(data => contentbox.innerHTML = data)
                    .then(data => document.getElementsByTagName("body")[0].innerHTML = data)
                    .then(console.log("Fetch complete"))
                    .catch(error => 
                    {
                        console.log("There was an error");
                        console.log(error);
                    });
                console.log("Session terminated.");
                console.log("Login page loaded");
                // How do I aallow repeated login and out.
            }
            event.preventDefault();
        });
    });
    var link_home = document.getElementById("home"); 
    var loginbutton = document.getElementById("login-submit");
    loginbutton.addEventListener("click", function()
    {
        event.preventDefault();
        var email = document.getElementById("email").value.trim();
        var password = document.getElementById("password").value.trim();
        if(checkLogin(email, password))
        {
            // How does php check if this is a valid user?
            console.log("User login valid.");
            link_home.click();
        }
        else
        {
            console.log("User login not valid.");
            let message=document.getElementById("login-form-message");
            message.innerText="Invalid Login."
            event.preventDefault();
        }
    });
}
function checkLogin(email, password)
{
    var emailexpression = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var passwordexpression = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
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
