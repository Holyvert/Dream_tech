

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
    if(document.getElementById('price')!=null)
    {
    var productPagePrice = parseFloat(document.getElementById('price').innerText.replace('$',''))
    var productPageQuantity = document.getElementById("amount").value
    document.getElementById('price1').innerText = Math.round(productPageQuantity * productPagePrice * 100)/100 + " $"
    }
    deleteButton()
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

function deleteButton()
{
    var removeCartItemButtons = document.getElementsByName("delete")
    console.log(removeCartItemButtons)
    for(var i = 0;i<removeCartItemButtons.length;i++)
    {
        var button = removeCartItemButtons[i]
        button.addEventListener('click',function(event){
            var buttonClicked = event.target
            buttonClicked.parentElement.parentElement.parentElement.remove()
            updateCartTotal()
        })
        
    }

}
function setCartQuantity(element,upordown)
{
    var amount = element.parentElement.children[1].value
    if (amount > 1) 
        {
        if (upordown == 'up')
        {
            ++element.parentElement.children[1].value
            updateCartTotal()
            
        }
        else if (upordown == 'down')
        {
            --element.parentElement.children[1].value
            updateCartTotal()
        }
    }
    else if (amount == 1) 
    {
        if (upordown == 'up')
        {
            ++element.parentElement.children[1].value
            updateCartTotal()
        }
    }
    else
        {
            element.parentElement.children[1].value=1
            updateCartTotal()
        }
    
}
function updateCartTotal()
{
   cartQuantitiy = document.getElementsByName('quantity')
   cartPrice = document.getElementsByName('cartPrice')
   
    var total = 0
   for(var i = 0;i<cartQuantitiy.length;i++)
   {
    
      total = total + cartQuantitiy[i].value * parseFloat(cartPrice[i].innerText.replace('$',''))
    
   }

   var totall = Math.round( total* 100)/100
   var tps = Math.round( total * .05 * 100)/100
   var tvq = Math.round(total * .09975 * 100)/100
   var subTotal = Math.round((total + tps + tvq) * 100)/100
   document.getElementsByName('priceB4Taxes')[0].innerText = totall + " $"
   document.getElementById('tps').innerText =  tps + " $"
   document.getElementById('tvq').innerText =  tvq + '$'
   document.getElementById('subTotal').innerText = subTotal + '$'
}