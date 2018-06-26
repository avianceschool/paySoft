<?php 
  function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  $trans = generateRandomString(10);
?>
<?php $xml_data = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
<soap12:Body>
<SubmitCheck xmlns="http://192.168.0.227/MobileWebService">
<strStoreID>888888</strStoreID>
<strTransitNum>'.$_REQUEST['strRoutingNo'].'</strTransitNum>
<strAccount>'.$_REQUEST['strAccountNumber'].'</strAccount>
<decAmount>'.$_REQUEST['strAmount'].'</decAmount>
<strReference>'.$_REQUEST['strCheckNo'].'</strReference>
<strTransID>'.$trans.'</strTransID>
<strName>'.$_REQUEST['strFirstName'].'</strName>
<strLastName>'.$_REQUEST['strLastName'].'</strLastName>
<strAddress1>'.$_REQUEST['strStreetNumber'].'</strAddress1>
<strAddress2>'.$_REQUEST['strStreetName'].'</strAddress2>
<strCity>'.$_REQUEST['strCity'].'</strCity>
<strState>'.$_REQUEST['strState'].'</strState>
<strZip>'.$_REQUEST['strZipCode'].'</strZip>
<strTelephone>'.$_REQUEST['strPhoneNumber'].'</strTelephone>
</SubmitCheck>
</soap12:Body>
</soap12:Envelope>';
$URL = "https://ws.paysoftintern.com/service.asmx";

$ch = curl_init($URL);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);


// if($output==111){echo "Success";} else {echo $output;};
?>