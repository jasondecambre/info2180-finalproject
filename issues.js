window.onload = function(){
            var allbtn = document.getElementById("all-button");
            allbtn.addEventListener("click", function (event) {
                event.preventDefault();
                console.log("ALL BUTTON CLICKED");
                var request = new XMLHttpRequest();
                var url = "allissues.php";
                request.onreadystatechange = function () {
                    if (request.readyState == XMLHttpRequest.DONE) {
                        if (request.status == 200) {
                            var issue = request.responseText;
                            console.log("response text");
                            
                            var result = document.getElementsByTagName("table")[0];
                            console.log(issue);
                            result.innerHTML = issue;
                        } else {
                            alert("Error Detected");
                        }
                    }
                };

                request.open("GET", url, true);
                request.send();
            });

            allbtn.classList.add('defaultAll');

            var mybtn = document.getElementById("my-button");
            mybtn.addEventListener("click", function (event) {
                event.preventDefault();
                allbtn.classList.remove('defaultAll');
                console.log("MY BUTTON CLICKED");
                var request = new XMLHttpRequest();
                var url = "myissues.php";
                request.onreadystatechange = function () {
                    if (request.readyState == XMLHttpRequest.DONE) {
                        if (request.status == 200) {
                            var issue = request.responseText;
                            console.log("response text");
                            
                            var result = document.getElementsByTagName("table")[0];
                            console.log(issue);
                            result.innerHTML = issue;
                        } else {
                            alert("Error Detected");
                        }
                    }
                };

                request.open("GET", url, true);
                request.send();
            });

            var openbtn = document.getElementById("open-button");
            openbtn.addEventListener("click", function (event) {
                event.preventDefault();
                allbtn.classList.remove("defaultAll");
                console.log("OPEN BUTTON CLICKED");
                var request = new XMLHttpRequest();
                var url = "openissues.php";
                request.onreadystatechange = function () {
                    if (request.readyState == XMLHttpRequest.DONE) {
                        if (request.status == 200) {
                            var issue = request.responseText;
                            console.log("response text");
                            
                            var result = document.getElementsByTagName("table")[0];
                            console.log(issue);
                            result.innerHTML = issue;
                        } else {
                            alert("Error Detected");
                        }
                    }
                };

                request.open("GET", url, true);
                request.send();
            });

            

            
}