let item = 0;
const cbadge = document.getElementById('fchart');
function addItem(){
    console.log("click");
    item+=1;
    cbadge.innerHTML=item;
}