<?php
 $input = "123";
$encrypted = encryptIt( $input );
$decrypted = decryptIt( $encrypted );
echo "plain text=".$input;
echo "<br>Encrypted=".$encrypted;
echo "<br>Decripted=".$decrypted;
function encryptIt( $q ) 
{
$cryptKey='qJB0rGtIn5UB1xG03efyCp';
$qEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
return( $qEncoded );
}

function decryptIt( $q )
{
$cryptKey= 'qJB0rGtIn5UB1xG03efyCp';
$qDecoded= rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
return( $qDecoded );
}
?>