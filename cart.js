product=[];
function add(i){
  var x={};
  var a = document.getElementById("price"+i).innerText.split("$");
  x.title=document.getElementById("title"+i).innerText;
  x.price=a[1];
  x.src = document.getElementById("img"+i).src;
  product.push(x);
  console.log(product); 
  sessionStorage.setItem("p",JSON.stringify(product));
 }
