<?php
error_reporting(E_ALL ^ E_WARNING);
include('../LoginAndRegistration/AdminAuthentication.php');



function getOrders()
{
  return  json_decode(file_get_contents('ordersDB.json'), true);
}
function getOrders2()
{
  return  json_decode(file_get_contents('Backstore/ordersDB.json'), true);
}
function getNewId()
{
  $orders = getOrders();

  return  intval($orders[count($orders) - 1]["Id"] + 1);
}
function getOrderById($Id)
{
  $orders = getOrders();

  foreach ($orders as $order) {
    if ($order['Id'] == $Id)
      return $order;
  }

  return null;
}

function createOrder($data)
{
  $orders = getOrders();

  $array = array(
    "Id" => $data['Id'],
    "Name" => $data['porduct_name'],
    "Ailse" => $data['Category'],
    "company" => $data['company'],
    "Quantity" => $data['s_perU'],
    "price_each" => $data['price_each'],
    "price_perQ" => $data['price_perQ'],
    "More_Description" => $data['More_Description'],
    "image" => $data['images'],
    "color" => $data['color'],
    "Quantity_inStock" => $data['Quantity'],
  );

  array_push($orders, $array);

  file_put_contents('ordersDB.json', json_encode($orders));


}
function deleteProduct($index,$Id)
{
   $order = getOrderById($Id);

   array_splice($order['Products'], $index, 1);


}
function editOrder($data, $Id)
{
  $orders = getOrders();



  foreach ($orders as $i => $order) {
    if ($order['Id'] == $Id) {

      // $orders[$i] = array_merge($order,$data);
      $orders[$i]['Name'] = $data['porduct_name'];
      $orders[$i]['Ailse'] = $data['Category'];
      $orders[$i]['company'] = $data['company'];
      $orders[$i]['Quantity'] = $data['s_perU'];
      $orders[$i]['price_each'] = $data['price_each'];
      $orders[$i]['price_perQ'] = $data['price_perQ'];
      $orders[$i]['More_Description'] = $data['More_Description'];
      $orders[$i]['image'] = $data['images'];
      $orders[$i]['color'] = $data['color'];
      $orders[$i]['Quantity_inStock'] = $data['Quantity'];

     
    }
  }


  file_put_contents('ordersDB.json', json_encode($orders));
}


function deleteOrder($Id)
{
  $orders = getOrders();

  foreach ($orders as $i => $order) {
    if ($order['Id'] == $Id) {
      array_splice($orders, $i, 1);

      
    }
  }

  file_put_contents('ordersDB.json', json_encode($orders));
}



?>