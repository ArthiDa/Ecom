let item = 0;
const cbadge = document.getElementById('fchartquan');
const fchart = document.getElementById('fchart');
const chartbody = document.getElementById('chartitem');
let selectedProduct = JSON.parse(localStorage.getItem('chart')) || [];
item = selectedProduct.length;
cbadge.innerHTML=item;

function showItem(){
    document.getElementById('chart').classList.toggle('slidechart');
    chartbody.innerHTML="";
    for(el of selectedProduct){
        chartbody.innerHTML+=`<tr>
        <th scope="row"><a href="#"><img src="http://localhost/Ecom/img/${el.img}" alt="" height="50px"></a></th>
        <td>${el.name}</td>
        <td>${el.price}</td>
        <td>${el.quan}</td>
        
    </tr>`
    }
}
fchart.addEventListener('click',()=>{
    
    showItem();
    
})
function addItem(id,name,img,price){
    const found = selectedProduct.some(el=>el.id===id)
    if(found){
        selectedProduct.map(el=>{
            if(el.id===id){
                el.quan+=1;
            }
        })
    }else{
        selectedProduct.push({id:id,quan:1,img:img,price:price,name:name});
        item+=1;
    }
    console.log(selectedProduct)
    localStorage.setItem('chart',JSON.stringify(selectedProduct));
    cbadge.innerHTML=item;
}
function clearChart(){
    selectedProduct=[];
    localStorage.setItem('chart',JSON.stringify(selectedProduct));
    cbadge.innerHTML=0;
    item=0;
    showItem();
}