<?php

function getProducts()
{
 return  json_decode(file_get_contents('ProductsDB.json' ), true) ;

}
function getProductById($Id)
{
  $products = getProducts();

  foreach( $products as $product)
  {
    if($product['Id'] == $Id)
      return $product;
  }

  return null;
}

function createProduct($data)
{

}

function editProduct($data,$Id)
{
  $products = getProducts();

 

  foreach( $products as $i => $product)
  {
    if($product['Id'] == $Id)
      {
    
       // $products[$i] = array_merge($product,$data);
       $products[$i]['Name']=$data['porduct_name'];
       $products[$i]['Ailse']=$data['Category'];
       $products[$i]['company']=$data['company'];
       $products[$i]['Quantity']=$data['s_perU'];
       $products[$i]['price_each']=$data['price_each'];
       $products[$i]['price_perQ']=$data['price_perQ'];
       $products[$i]['More_Description']=$data['More_Description'];
       $products[$i]['image']=$data['images'];
       $products[$i]['color']=$data['color'];
       $products[$i]['Quantity_inStock']=$data['Quantity'];


      }
  }

  
  file_put_contents('ProductsDB.json',json_encode($products));
}


function deleteProduct($Id)
{
  $products = getProducts();

  foreach( $products as $i => $product)
  {
    if($product['Id'] == $Id)
      {
          array_splice($products,$i,1);
       


      }
  }

  file_put_contents('ProductsDB.json',json_encode($products));
}

function categoryBeverages($category)
{
  if($category == "Beverages")
    echo "selected";
}

function categoryFv($category)
{
  if($category == "Fruits and Vegetables")
    echo "selected";
}
function categoryFc($category)
{
  if($category == "Frozen and Canned")
    echo "selected";
}
function categoryDairy($category)
{
  if($category == "Dairy")
    echo "selected";
}
function categoryMeatAndFish($category)
{
  if($category == "MeatAndFish")
    echo "selected";
}
function categorySnacks($category)
{
  if($category == "Snacks")
    echo "selected";
}

?>