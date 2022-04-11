 <?php
       
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = array();
        $data[] = array(
        $names = $dochtml-> getElementsByClassName('porduct_name'),
        $Quantity= $_POST['quantity'],
        $prices = $dochtml-> getElementsByClassName('price_each'),
        $images = getElementsByClassName('imgDescription'),
        );

       $filename='addtocart.json';
    
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
        fwrite($handle, json_encode($data) . ']');
    }
    else
    {
        // write the first event inside an array
        fwrite($handle, json_encode($data));
    }

        // close the handle on the file
        fclose($handle);
}
}
    ?> 