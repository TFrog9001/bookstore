function quantitychange(){

    let amountElement = $('#amount');
    let amount = amountElement.value();

    $('#btn-plus').on("click", function(){
        amount++; 
        amountElement.value=amount;
    })

    $('#btn-minus').on("click", function(){
        if(amount >1){
            amount--;
            amountElement.value()=amount;
        }
    })

    amountElement.on("input", function(){
        amount = amountElement.value;
    })
}
quantitychange();