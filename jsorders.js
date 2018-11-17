function display(){

    					$.ajax({
						type: "POST",
						url: "displayorder.php",
						data: {check:""},
						success: function (data) {
                            

							if(data==-1){
							   alert("error");
							}
							else if(data!=0) {
                                
                                var res = JSON.parse(data);
                                console.log(res); 
                                //console.log(data);
                                document.getElementById("noord").style.display="none";

                                for(i=0;i<res.length;i++){
                                    var para = document.createElement("div");
                                    para.setAttribute("class","col-md-12 cart-total");  
                                    //para.setAttribute("style","margin-bottom:30px");
                                    para.setAttribute("style","text-align:center; margin-bottom:30px");
                                    var para2 = document.createElement("h1");
                                    para2.innerHTML = "Order " + (i+1);
                                    
                                    var para3 = document.createElement("h4");
                                    para3.innerHTML = "Ordered on: " + res[i].date;

                                    var para4 = document.createElement("h4");
                                    para4.innerHTML = "Total: " + res[i].total + "$";
                                    para.appendChild(para2);
                                    para.appendChild(para3);
                                    para.appendChild(para4);
                                    document.getElementById("cc").appendChild(para);
                                    
                                    var para5 = document.createElement("div");
                                    para5.setAttribute("class","clearfix");  
                                    document.getElementById("cc").appendChild(para);
                                    var p = JSON.stringify(res[i].prod);
                                    //console.log(p);
                                    var prods = JSON.parse(p);
                                    
                                    for(j=1;j<=prods.length;j++){
                                        var para = document.createElement("div");
                                        para.setAttribute("class","cart-header"+i);
                                    
                                        var para2 = document.createElement("div");
                                        para2.setAttribute("class","close"+i);
                                        //para.appendChild(para2);
                                    
                                        var para3 = document.createElement("div");
                                        para3.setAttribute("class","cart-sec simpleCart_shelfItem");
                                        para.appendChild(para3);
                                    
                                        var para4 = document.createElement("div");
                                        para4.setAttribute("class","cart-item cyc");
                                        para3.appendChild(para4);
                                    
                                        var para5 = document.createElement("img");
                                        para5.setAttribute("class","img-responsive");
                                        para5.setAttribute("src",prods[j-1].src);
                                        para4.appendChild(para5)
                                    
                                        var para6 = document.createElement("div");
                                        para6.setAttribute("class","cart-item-info");
                                        para3.appendChild(para6);
                                    
                                        
                                        var para7 = document.createElement("h3");
                                        var para8 = document.createElement("a");
                                        para8.setAttribute("src","#");
                                        var node = document.createTextNode(prods[j-1].name);
                                        para8.appendChild(node);
                                        var para9 = document.createElement("span");
                                        var node = document.createTextNode("Model No: 100"+j);
                                        para9.appendChild(node);
                                        para7.appendChild(para8);
                                        para7.appendChild(para9);
                                        para6.appendChild(para7);
                                    
                                    
                                    
                                        var para10 = document.createElement("p");
                                        para10.setAttribute("style","margin-top:10px");
                                        var node = document.createTextNode("Price: "+prods[j-1].price + " $");
                                        para10.appendChild(node);
                                        para6.appendChild(para10);
                                    
                                        var para11 = document.createElement("div");
                                        para11.setAttribute("class","clearfix");
                                        para3.appendChild(para11);
                                    
                                    
                                        var element = document.getElementById("cc");
                                        element.appendChild(para);

                                        }
                                    

                                }
                                var para = document.createElement("div");
                                para.setAttribute("class","clearfix");  
                                document.getElementById("cc").appendChild(para);
                                
                                
                            }
                        
						},
						error: function (data) {
							alert('An error occurred.');
                        },
                    
					});
                }