let item = 0;
const cbadge = document.getElementById('fchartquan');
const fchart = document.getElementById('fchart');
const selectedProduct =[];
fchart.addEventListener('click',()=>{
    document.getElementById('chart').classList.toggle('slidechart');
    
})
function addItem(id){
    const found = selectedProduct.some(el=>el.id===id)
    if(found){
        selectedProduct.map(el=>{
            if(el.id===id){
                el.quan+=1;
            }
        })
    }else{
        selectedProduct.push({id:id,quan:1});
       
    }
    item+=1;
    cbadge.innerHTML=item;
}