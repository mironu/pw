function yyyymmdd() {
    var now = new Date();
    var y = now.getFullYear();
    var m = now.getMonth() + 1;
    var d = now.getDate();
    var mm = m < 10 ? '0' + m : m;
    var dd = d < 10 ? '0' + d : d;
    return '' + y + mm + dd;
}

function order(){
	var d = yyyymmdd();
	if(sessionStorage.getItem("p")!=''){

    					$.ajax({
						type: "POST",
						url: "order.php",
						data: {prod:JSON.stringify(JSON.parse(sessionStorage.getItem('p'))),date:d},
						success: function (data) {
							console.log(data);
							if(data==1){
								//document.getElementById("ord").setAttribute("class","simpleCart_empty")
								sessionStorage.setItem('p','');
								alert("Your order have been registerd");
    							window.location.href = "index.html";
							}
							else if (data==0){
								alert("error");
							}
							else if(data==-1){
								
								document.getElementById("errs").innerHTML = "You must be logged in to place an order";
							}
						},
						error: function (data) {
							alert('An error occurred.');
						},
					});
				}
				else{
					document.getElementById("errs").innerHTML = "You cart is empty";
				}

   

}