
var total = 0.0;
 function updatePage(){
    if(sessionStorage.getItem("p")!=''){
    product = JSON.parse(sessionStorage.getItem('p'));
    console.log(product);
    total=0.0;
    for(i=1;i<=product.length;i++){
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
    para5.setAttribute("src",product[i-1].src);
    para4.appendChild(para5)

    var para6 = document.createElement("div");
    para6.setAttribute("class","cart-item-info");
    para3.appendChild(para6);

    
    var para7 = document.createElement("h3");
    var para8 = document.createElement("a");
    para8.setAttribute("src","#");
    var node = document.createTextNode(product[i-1].title);
    para8.appendChild(node);
    var para9 = document.createElement("span");
    var node = document.createTextNode("Model No: 100"+i);
    para9.appendChild(node);
    para7.appendChild(para8);
    para7.appendChild(para9);
    para6.appendChild(para7);



    var para10 = document.createElement("p");
    para10.setAttribute("style","margin-top:10px");
    var node = document.createTextNode("Price: "+product[i-1].price + " $");
    para10.appendChild(node);
    para6.appendChild(para10);

    var para11 = document.createElement("div");
    para11.setAttribute("class","clearfix");
    para3.appendChild(para11);


    var element = document.getElementById("here");
    element.appendChild(para);
        total=total + Number(product[i-1].price);
    }
    document.getElementById("bag").innerHTML = "My shopping bag ("+product.length+")";
    document.getElementById("fprice").innerHTML = total + " $";
    if(product.length>0)
        total= total + 25.0;    
    document.getElementById("lprice").innerHTML = total + " $";
 }
}