
    function setQuantity(upordown) 
{
    var amount = document.getElementsById('amount');

    if (amount.value > 1) 
        {
        if (upordown == 'up')
        {
            ++document.getElementsById('amount').value;
        }
        else if (upordown == 'down')
        {--document.getElementsById('amount').value;}
    }
    else if (amount.value == 1) 
    {
        if (upordown == 'up')
        {++document.getElementsById('amount').value;}
    }
    else
        {document.getElementsById('amount').value=1;}
}


