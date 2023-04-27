<?php
namespace App\Classes;
class Whatsapp {
   private $baseUrl;
   private $senderID;
   private $receiver;
   private $data;
   private $template;
   private $language;
   private $apiVersion;
   private $token;
   public function __construct($senderID,$receiver,$data,$template,$language){
       $this->baseUrl = 'https://graph.facebook.com';
       $this->apiVersion = 'v15.0';
       $this->senderID = $senderID;
       $this->receiver = $receiver;
       $this->data = $data;
       $this->template = $template;
       $this->language = $language;
       $this->token = '';
   }
   public function sendWithParameters(){
     $curl = curl_init();
     $template = array(
          'name' => $this->template, 
          'language' => array('code' => $this->language),
          'components' => $this->data
     );
     $params = array(
          'messaging_product' => 'whatsapp',
          'to' => $this->receiver,
          'type' => 'template',
          'from' => $this->senderID,
          'template' => json_encode($template)
     );
     $url = "{$this->baseUrl}/{$this->apiVersion}/{$this->senderID}/messages/";
     curl_setopt_array($curl, array(
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS =>json_encode($params),
         CURLOPT_HTTPHEADER => array(
             'Authorization: Bearer '.$this->token,
             'Content-Type: application/json'
         ),
     ));

     $response = curl_exec($curl);
     $response = json_decode($response,true);
     $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
     curl_close ($curl);
     return $response;
   }
}