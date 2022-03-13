
const cartItems = document.querySelector(".shop-items");


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
    updateCartTotal()//change
    setQuantity(upordown)
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
            updateCartTotal();
        }
        else if (upordown == 'down')
        {--document.getElementById("amount").value;
        updateQuantitiy();
        updateCartTotal();}
    }
    else if (amount.value == 1) 
    {
        if (upordown == 'up')
        {++document.getElementById("amount").value;
        updateQuantitiy();
        updateCartTotal();}
    }
    else
        {document.getElementById("amount").value=1;;
        updateQuantitiy();
        updateCartTotal();}
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
            updateQuantitiy()
            
        }
        else if (upordown == 'down')
        {
            --element.parentElement.children[1].value
            updateCartTotal()
            updateQuantitiy()
        }
    }
    else if (amount == 1) 
    {
        if (upordown == 'up')
        {
            ++element.parentElement.children[1].value
            updateCartTotal()
            updateQuantitiy()
        }
    }
    else
        {
            element.parentElement.children[1].value=1
            updateCartTotal()
            updateQuantitiy()
        }
    
}
function updateCartTotal()
{
   cartQuantitiy = document.getElementsByName('quantity')
   cartPrice = document.getElementsByName('cartPrice')
    
    var totalitems = parseInt(0) 
    var total = 0
   for(var i = 0;i<cartQuantitiy.length;i++)
   {
        
      total = total + cartQuantitiy[i].value * parseFloat(cartPrice[i].innerText.replace('$',''))
      totalitems = Number(totalitems) + Number(cartQuantitiy[i].value)
       totalitems2 = totalitems
   }
   var totall = Math.round( total* 100)/100
   var tps = Math.round( total * .05 * 100)/100
   var tvq = Math.round(total * .09975 * 100)/100
   var subTotal = Math.round((total + tps + tvq) * 100)/100
   var subTotal2=subTotal
   document.getElementsByName('priceB4Taxes')[0].innerText = totall + " $"
   document.getElementById('tps').innerText =  tps + " $"
   document.getElementById('tvq').innerText =  tvq + '$'
   document.getElementById('subTotal').innerText = subTotal + '$'
   document.getElementById('itemstotal').innerText= totalitems
   document.getElementById('itemstotal2').innerText= totalitems 
   const div = document.querySelector('.subTotal2');
   div.innerHTML =subTotal + '$';
   
}

/*
function updateItemPrice(){
    CartItems = document.getElementsByName("cartPrice")
    for(var i = 0; i<CartItems.length;i++){
        var y = parseFloat(cartPrice[i].innerText.replace('$','')); 
        var x =  document.getElementsByName("quantity")[i].value;
         document.getElementsByClassName('price1')[i].innerText = x*y + " $"
        
    }
}*/


/*
let cart=[];
function addToCart(id){
     if (cart.some((found) => found.id === id)) 
         alert("Already in cart");
    else{
const found = products.find((obj) => obj.id === id);
cart.push(found);
console.log(cart);}
updateCart();
}


function updateCart(){
    renderCartItems();
}
function renderCartItems(){
    cart.forEach((found) => {
        cartItems.innerHTML += `
        <div class="shop-item">
                    <span class="shop-item-title">${found.name}</span>
                    <img class="shop-item-image" src="${found.imgSrc}" alt="${found.name}" width=50px; height=50px;>
                    <div class="Productquantity buttons_added"  >
                  <input id="down" type="button"  value="-" class="minus" onclick="setQuantity('down');"><input id="amount" type="number" step="1"
                   min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input 
                   type="button" onclick="setQuantity('up');" id="up" value="+" class="plus" >
                </div>
                    <div class="shop-item-details">
                        <span class="shop-item-price">${found.price}</span>
                       <input type="button" value="delete" class="minus" style="border-radius: 10px;" >
                    </div>
                </div>
        `;
    });
}*/ //for adding product to page, tryout
