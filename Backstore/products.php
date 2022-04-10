<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $datae = array();
        $datae[] = array(
        'Name'=>$_POST['porduct_name'],
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

  
       $filename='Products.json';
    
    // read the file if present
$handle = @fopen($filename, 'r+');

// create the file if needed
if ($handle === null)
{
    $handle = fopen($filename, 'w+');
}

if ($handle)
{
    // seek to the end
    fseek($handle, 0, SEEK_END);

    // are we at the end of is the file empty
    if (ftell($handle) > 0)
    {
        // move back a byte
        fseek($handle, -1, SEEK_END);

        // add the trailing comma
        fwrite($handle, ',', 1);

        // add the new json string
        fwrite($handle, json_encode($datae) . ']');
    }
    else
    {
        // write the first event inside an array
        fwrite($handle, json_encode($datae));
    }

        // close the handle on the file
        fclose($handle);
}

 }
?>