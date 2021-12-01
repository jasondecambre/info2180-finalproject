window.onload = function () {
	var idissue = document.getElementById("issue#").getAttribute("value");
	var closebtn = document.getElementById("closed");
	var progressbtn = document.getElementById("inprogress");
	closebtn.addEventListener("click", function (event) {
        event.preventDefault();
        console.log("CLOSE ISSUE");
		var request = new XMLHttpRequest();
		var url = "issuesupdate.php?id=" + idissue + "&update=Closed";
		request.onreadystatechange = function () {
			if (request.readyState == XMLHttpRequest.DONE) {
				if (request.status == 200) {
					if (request.responseText == "Updated") {
						location.reload();
					}
				} else {
					alert("Error Detected");
				}
			}
		};

		request.open("GET", url, true);
		request.send();
	});
	progressbtn.addEventListener("click", function (event) {
        event.preventDefault();
        console.log("IN PROGRESS ISSUE");
		var request = new XMLHttpRequest();
		var url = "issuesupdate.php?id=" + idissue + "&update=In-Progress";
		request.onreadystatechange = function () {
			if (request.readyState == XMLHttpRequest.DONE) {
				if (request.status == 200) {
					if (request.responseText == "Updated") {
						location.reload();
					}
				} else {
					alert("Error Detected");
				}
			}
		};

		request.open("GET", url, true);
		request.send();
	});
};
