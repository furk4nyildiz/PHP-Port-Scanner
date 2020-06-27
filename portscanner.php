<?php 
$host = array("127.0.0.1","216.58.206.206","youtube.com");
foreach ($host as $ip) {
$openports = array();
$services = array(21=>"ftp",22=>"ssh",23=>"telnet",25=>"smtp",53=>"dns",80=>"http",110=>"pop3",111=>"rcpbind",135=>"msrpc",139=>"netbios-ssn",143=>"imap",443=>"https",445=>"microsoft-ds",993=>"imaps",995=>"pop3s",1723=>"pptp",3306=>"mysql",3389=>"ms-wbt-server",5900=>"vnc",8080=>"http-proxy");
foreach ($services as $service => $value)
{
    $con = @fsockopen($ip, $service, $error, $errorstring, 2);
    if (is_resource($con))
    {
    	array_push($openports, $value . " - ". $service . "  ");
        fclose($con);
    }
}

echo "<br>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -<br>Host: " . $ip . "<br>Open Ports: ";
for ($i=0; $i < count($openports); $i++) { 
	echo $openports[$i] . " | ";
} echo "
<br>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -<br>";

}


?>
