<?php
  $url = "http://api.enviame.com.br/send-text";

  $data = array('instance' => $whatsapp_sistema,
                'to' => $tel_cliente_whats,
                'token' => '2UJN5-705-111L1',
                'message' => $mensagem);

  

  $options = array('http' => array(
                 'method' => 'POST',
                 'content' => http_build_query($data)
  ));

  $stream = stream_context_create($options);

  $result = file_get_contents($url, false, $stream);

  echo $result;
?>