	$( document ).ready(function() {
		$.ajax({
			type: 'GET',
			url: 'checklogin.php',
			success: function (data) {
				if(data!=0){
					if(data=='admin')
					{
						document.getElementById("hide1").style.display="none";
                    	document.getElementById("hide2").style.display="none";
						document.getElementById("hide3").style.display="initial";
						var add = document.getElementById("add");
						add.innerHTML="add new product";
						add.setAttribute("href","addprod.html");
						document.getElementById("hello").innerHTML="Hello,"+data;
					}
					else
					{
                    	document.getElementById("hide1").style.display="none";
                    	document.getElementById("hide2").style.display="none";
						document.getElementById("hide3").style.display="initial";
						document.getElementById("hide4").style.display="initial";
						document.getElementById("hello").innerHTML="Hello,"+data;
					}
				}

				else{
					
					//.getElementById("err").innerHTML = "Wrong username or password";
				}
			},
			error: function (data) {
				alert('An error occurred.');
			},
		});
	});
