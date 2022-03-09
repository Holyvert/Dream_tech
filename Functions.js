

if(document.readyState=='loading')
{
    document.addEventListener('DOMContentLoaded',ready)
}
else{
    ready()
}
function ready()
{
    document.getElementById("amount").value = localStorage.getItem("savedQuantity")
    var productPagePrice = parseFloat(document.getElementById('price').innerText.replace('$',''))
    var productPageQuantity = document.getElementById("amount").value
    document.getElementById('price1').innerText = Math.round(productPageQuantity * productPagePrice * 100)/100 + " $"
}   

function updateQuantitiy()
{
    
    var productPagePrice = parseFloat(document.getElementById('price').innerText.replace('$',''))
    var productPageQuantity = document.getElementById("amount").value
    localStorage.setItem("savedQuantity",productPageQuantity)
    console.log(localStorage.getItem("savedQuantity"))
    document.getElementById('price1').innerText = Math.round(productPageQuantity * productPagePrice * 100)/100 + " $"
    
}

function setQuantity(upordown){
    var amount = document.getElementById("amount");
    if (amount.value > 1) 
        {
        if (upordown == 'up')
        {
            ++document.getElementById("amount").value;
            updateQuantitiy();
        }
        else if (upordown == 'down')
        {--document.getElementById("amount").value;
        updateQuantitiy();}
    }
    else if (amount.value == 1) 
    {
        if (upordown == 'up')
        {++document.getElementById("amount").value;
        updateQuantitiy();}
    }
    else
        {document.getElementById("amount").value=1;;
        updateQuantitiy();}
}

