function quantitychange(){
    let amountElement = document.getElementById('amount');
    let amount = amountElement.value;

    $('.btn-plus').on("click", function(){
        amount++; 
        amountElement.value=amount;
    })

    $('.btn-minus').on("click", function(){
        if(amount >1){
            amount--;
            amountElement.value=amount;
        }
    })

    amountElement.addEventListener("input", function(){
        amount = amountElement.value;
    })
}




quantitychange();