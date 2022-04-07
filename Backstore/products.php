<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $datae = array();
        $datae[] = array(
         'Name'=>$_POST['porduct_name'] 
        'Ailse' => $_POST['Category'],
        'company'=> $_POST['company'],
        'Quantity'=> $_POST['s_perU'],
        'price_each'=> $_POST['price_each'],
        'price_perQ'=> $_POST['price_perQ'],
        'More_Description'=> $_POST['More_Description'],
        'image'=> $_POST['images'],
        'color'=> $_POST['color'],
        'Quantity_inStock'=> $_POST['Quantity'] 
        );

    $fp=fopen('Products.json', 'a');
    fwrite($fp,json_encode($datae));
    fclose($fp);

 }
?>