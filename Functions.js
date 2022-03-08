
    function setQuantity(upordown){
    var amount = document.getElementById("amount");
    if (amount.value > 1) 
        {
        if (upordown == 'up')
        {
            ++document.getElementById("amount").value;
            console.log(document.getElementById("amount").value);
        }
        else if (upordown == 'down')
        {--document.getElementById("amount").value;
        console.log(document.getElementById("amount").value);}
    }
    else if (amount.value == 1) 
    {
        if (upordown == 'up')
        {++document.getElementById("amount").value;
        console.log(document.getElementById("amount").value);}
    }
    else
        {document.getElementById("amount").value=1;;
        console.log(document.getElementById("amount").value);}
}

