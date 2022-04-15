const cartItems = document.querySelector(".shop-items");

if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", ready);
} else {
  ready();
}
function ready() {
  myCounter = localStorage.getItem(document.URL);

  if (myCounter == null) myCounter = 0;

  myCounter = parseInt(myCounter) + 1;

  localStorage.setItem(document.URL, myCounter);

  if (parseInt(myCounter) > 1) {
    if (localStorage.getItem(document.URL + "savedQuantity") != null)
      document.getElementById("amount").value = localStorage.getItem(
        document.URL + "savedQuantity"
      );

    if (localStorage.getItem(document.URL + "savedCartQuantities") != null)
      document.getElementsByName("quantity").value = localStorage.getItem(
        document.URL + "savedCartQuantities"
      );
  }
  deleteButton();

  if (document.getElementById("price").innerText != null) {
    var productPagePrice = parseFloat(
      document.getElementById("price").innerText.replace("$", "")
    );
    var productPageQuantity = document.getElementById("amount").value;
    document.getElementById("price1").innerText =
      Math.round(productPageQuantity * productPagePrice * 100) / 100 + " $";
  }

  var addToCartbutton = document.getElementsByClassName("AddCartButton");
  for (var i = 0; i < addToCartbutton.length; i++) {
    var button = addToCartbutton[i];
    button.addEventListener("click", addToCartClicked);
  }
  updateQuantitiy();
}

function addToCartClicked(event) {
  event.preventDefault();
  var button = event.target;
  var shopItem = button.parentElement.parentElement;
  var title = shopItem.getElementsByClassName("porduct_name")[0].innerText;
  var price = shopItem.getElementsByClassName("price_each")[0].innerText;
  var picture = document
    .getElementsByClassName("imgDescription")[0]
    .getElementsByTagName("img")[0];
  var src = picture.getAttribute("src");
  var quantity = document
    .getElementsByClassName("Productquantity buttons_added")[0]
    .getElementsByTagName("input")[2];
  var qty = localStorage.getItem(document.URL + "savedQuantity");
  console.log(title, price, src, qty);
  addItemToCart(title, price, src, qty);
}

function replaceItemQuantity(titlename, amount) {
  var findingelement = document.getElementsByClassName("CartProd");
  for (var i = 0; i < findingelement.length; i++) {
    if (findingelement[i].innerHTML == titlename) {
      var shopItem = findingelement[i].parentElement;
      var title = shopItem.getElementsByClassName("CartProd")[0].innerHTML;
      var price = shopItem.getElementsByTagName("div")[2].innerHTML;
      var picture = shopItem.getElementsByTagName("img")[0];
      var src = picture.getAttribute("src");
      //var qty = shopItem.getElementsByClassName("input-text qty text").value
      var qty = amount;
      console.log(title, price, src, qty);
      replaceItemArray(title, price, src, qty);
    }
  }

  /*
    var amount = document.getElementById("amount");
   var shopItem = amount.parentElement.parentElement.parentElement
   var title = shopItem.getElementsByClassName("CartProd")[0].innerText
   var price = shopItem.getElementsByTagName("div")[2].innerHTML
   var picture= shopItem.getElementsByTagName("img")[0]
   var src= picture.getAttribute('src')
   var qty = shopItem.getElementsByClassName("input-text qty text").value
   console.log(title, price, src, qty)
   replaceItemArray()*/
}
function replaceItemArray(title, price, src, qty) {
  var cartRowContents = ` 
      
            <td>
                <img class="images" src="${src}"></a>
                </td>
                <td class="CartProd">${title}</td>
                <td >Quantity
                     <div class="Productquantity buttons_added" style="background-color: rgb(148, 202, 137);" >
                     <input id="down" type="button"  value="-" class="minus" onclick="setCartQuantity(this,'down');"><input 
                        id="amount" type="number" step="1" min="1" max="" name="quantity" value="${qty}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input 
                        type="button" onclick="setCartQuantity(this,'up');" id="up" value="+" class="plus" >
                    </div>
                </td>
                <td>
                        <div class="Productquantity buttons_added" style="background-color: rgb(255, 0, 0);">
                        <input name="delete" type="button" value="delete" class="minus" style="border-radius: 10px;" >
                        </div>
                        </td>
                <td>
                <div name ="cartPrice" id="price">${price}</div></td>
    
    
`;
  var array = JSON.parse(localStorage.getItem("savedAddToCartItem"));
  for (var i = 0; i < array.length; i++) {
    if (array[i].substring(0, array[i].length - 1).includes(title)) {
      array.splice(i, 1, cartRowContents);
      localStorage.setItem("savedAddToCartItem", JSON.stringify(array));
    }
  }
}

function addItemToCart(title, price, src, qty) {
  var cartRowContents = ` 
      
            <td>
                <img class="images" src="${src}"></a>
                </td>
                <td class="CartProd">${title}</td>
                <td >Quantity
                     <div class="Productquantity buttons_added" style="background-color: rgb(148, 202, 137);" >
                     <input id="down" type="button"  value="-" class="minus" onclick="setCartQuantity(this,'down');"><input 
                        id="amount" type="number" step="1" min="1" max="" name="quantity" value="${qty}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input 
                        type="button" onclick="setCartQuantity(this,'up');" id="up" value="+" class="plus" >
                    </div>
                </td>
                <td>
                        <div class="Productquantity buttons_added" style="background-color: rgb(255, 0, 0);">
                        <input name="delete" type="button" value="delete" class="minus" style="border-radius: 10px;" >
                        </div>
                        </td>
                <td>
                <div name ="cartPrice" id="price">${price}</div></td>
    
    
`;

  if (
    /*localStorage.getItem("savedAddToCartItem").length == 0 ||*/ localStorage.getItem(
      "savedAddToCartItem"
    ) === null
  ) {
    var arrayofitems = [];
    arrayofitems.push(cartRowContents);
  } else {
    var arrayofitems = JSON.parse(localStorage.getItem("savedAddToCartItem"));
    var same = true;
    for (let i = 0; i < arrayofitems.length; i++) {
      if (
        arrayofitems[i].substring(0, 250) == cartRowContents.substring(0, 250)
      ) {
        same = false;
        alert("Item is already in cart");
      }
    }
    if (same) arrayofitems.push(cartRowContents);
  }
  localStorage.setItem("savedAddToCartItem", JSON.stringify(arrayofitems));
  console.log(JSON.parse(localStorage.getItem("savedAddToCartItem")));
  if (same) {
    alert("Item has been successfully added to cart");
  }
  printToCart();
}
function printToCart() {
  var cartarray = JSON.parse(localStorage.getItem("savedAddToCartItem"));
  for (let i = 0; i < cartarray.length; i++) {
    var cartRow = document.createElement("tr");
    var cartItems = document.getElementsByClassName("add")[0];
    var retrieveditem = JSON.parse(localStorage.getItem("savedAddToCartItem"))[
      i
    ];

    cartRow.innerHTML = retrieveditem;
    cartItems.append(cartRow);
  }

  updateCartTotal();
  event.preventDefault();
}

function updateQuantitiy() {
  var productPagePrice = parseFloat(
    document.getElementById("price").innerText.replace("$", "")
  );
  var productPageQuantity = document.getElementById("amount").value;
  localStorage.setItem(document.URL + "savedQuantity", productPageQuantity);
  console.log(localStorage.getItem(document.URL + "savedQuantity"));

  document.getElementById("price1").innerText =
    Math.round(productPageQuantity * productPagePrice * 100) / 100 + " $";
}

function updateCartQuantities() {
  var shoppingCartQuantities = [];
  shoppingCartQuantities = document.getElementsByName("quantity").value;
  localStorage.setItem(
    "savedCartQuantities",
    JSON.stringify(shoppingCartQuantities)
  );
  console.log(JSON.parse(localStorage.getItem("savedCartQuantities")));
}

function updateCartQuantitiy() {
  var cartHolderArray = getElementsByName("quantity");
  for (var i = 0; i < cartHolderArray.length; i++) {
    if (localStorage.getItem(i) != null)
      cartHolderArray[i].value = localStorage.getItem(i + 1);
  }
}

function setQuantity(upordown) {
  var amount = document.getElementById("amount");

  if (amount.value > 1) {
    if (upordown == "up") {
      ++document.getElementById("amount").value;
      updateQuantitiy();
      replaceItemQuantity(titlename, amount);
      //add replaceItemQuantity here
      // updateCartQuantities();
    } else if (upordown == "down") {
      --document.getElementById("amount").value;
      updateQuantitiy();
      replaceItemQuantity(titlename, amount);
      //updateCartQuantities();
    }
  } else if (amount.value == 1) {
    if (upordown == "up") {
      ++document.getElementById("amount").value;
      updateQuantitiy();
      replaceItemQuantity(titlename, amount);
      // updateCartQuantities();
    }
  } else {
    document.getElementById("amount").value = 1;
    updateQuantitiy();
    replaceItemQuantity(titlename, amount);
    // updateCartQuantities()
  }
}

/*function deleteButton()
{
    var removeCartItemButtons = document.getElementsByName("delete")
    console.log(removeCartItemButtons)
    
    for(var i = 0; i<removeCartItemButtons.length; i++)
    {
       // var index = indexOf(removeCartItemButtons[i])
        var button = removeCartItemButtons[i]
        
        button.addEventListener('click',function(event, i){
            var buttonClicked = event.target
            var array= JSON.parse(localStorage.getItem("savedAddToCartItem"))
            array.splice(i,1)
            localStorage.setItem("savedAddToCartItem",JSON.stringify(array))
            buttonClicked.parentElement.parentElement.parentElement.remove()
            updateCartTotal()
        })
        
    }
}*/

function deleteButton() {
  var removeCartItemButtons = document.getElementsByName("delete");
  console.log(removeCartItemButtons);

  for (var i = 0; i < removeCartItemButtons.length; i++) {
    // var index = indexOf(removeCartItemButtons[i])
    var button = removeCartItemButtons[i];

    button.addEventListener("click", function (event, i) {
      var buttonClicked = event.target;
      //var array= JSON.parse(localStorage.getItem("savedAddToCartItem"))
      // array.splice(i,1)
      // localStorage.setItem("savedAddToCartItem",JSON.stringify(array))
      var title =
        buttonClicked.parentElement.parentElement.parentElement.children[1]
          .innerHTML;
      console.log(title);

      var array = JSON.parse(localStorage.getItem("savedAddToCartItem"));
      for (var x = 0; x < array.length; x++) {
        if (array[x].substring(0, array[x].length - 1).includes(title)) {
          array.splice(x, 1);
          localStorage.setItem("savedAddToCartItem", JSON.stringify(array));
        }
      }
      buttonClicked.parentElement.parentElement.parentElement.remove();
      updateCartTotal();
    });
  }
}

/*
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

}*/

function setCartQuantity(element, upordown) {
  var amount = element.parentElement.children[1].value;
  var titlename =
    element.parentElement.parentElement.parentElement.children[1].innerHTML;

  if (amount > 1) {
    if (upordown == "up") {
      ++element.parentElement.children[1].value;
      ++amount;
      updateCartTotal();
      console.log(titlename);
      replaceItemQuantity(titlename, amount);
      //updateCartQuantities()
    } else if (upordown == "down") {
      --element.parentElement.children[1].value;
      --amount;
      updateCartTotal();
      console.log(titlename, amount);
      replaceItemQuantity(titlename, amount);
      //updateCartQuantities()
    }
  } else if (amount == 1) {
    if (upordown == "up") {
      ++element.parentElement.children[1].value;
      ++amount;
      updateCartTotal();
      console.log(titlename);
      replaceItemQuantity(titlename, amount);
      //updateCartQuantities()
    }
  } else {
    amount = 1;
    element.parentElement.children[1].value = 1;
    updateCartTotal();
    console.log(titlename);
    replaceItemQuantity(titlename, amount);
    //updateCartQuantities()
  }

  var cartHolderArray =
    element.parentElement.parentElement.parentElement.parentElement.children;
  for (var i = 0; i < cartHolderArray.length; i++) {
    if (
      element.parentElement.parentElement.parentElement == cartHolderArray[i]
    ) {
      localStorage.setItem(i, amount);
      console.log(localStorage.getItem(i));
    }
  }
}
function updateCartTotal() {
  cartQuantitiy = document.getElementsByName("quantity");
  cartPrice = document.getElementsByName("cartPrice");

  var totalitems = parseInt(0);
  var total = 0;
  for (var i = 0; i < cartQuantitiy.length; i++) {
    total =
      total +
      cartQuantitiy[i].value *
        parseFloat(cartPrice[i].innerText.replace("$", ""));
    totalitems = Number(totalitems) + Number(cartQuantitiy[i].value);
    totalitems2 = totalitems;
  }
  var totall = Math.round(total * 100) / 100;
  var tps = Math.round(total * 0.05 * 100) / 100;
  var tvq = Math.round(total * 0.09975 * 100) / 100;
  var subTotal = Math.round((total + tps + tvq) * 100) / 100;
  var subTotal2 = subTotal;
  document.getElementsByName("priceB4Taxes")[0].innerText = totall + " $";
  document.getElementById("tps").innerText = tps + " $";
  document.getElementById("tvq").innerText = tvq + "$";
  document.getElementById("subTotal").innerText = subTotal + "$";
  document.getElementById("itemstotal").innerText = totalitems;
  document.getElementById("itemstotal2").innerText = totalitems;
  const div = document.querySelector(".subTotal2");
  div.innerHTML = subTotal + "$";
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

