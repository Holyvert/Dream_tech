<?php
echo "setting<br/>";
$userEmail = 'hani';
echo '<script>
  const d = new Date();
  d.setTime(d.getTime() + (1*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = "user_email" + "=" + "'.$userEmail.'" + ";" + "admin" + "=" +"set" + ";"+ expires + ";path=/";
</script>';
echo "<br/>done";
?>