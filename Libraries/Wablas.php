<?php

namespace App\Libraries;

class Wablas
{
  /**
   * use API Keys from device > Edit Device > Api Keys for authenticated
   *
   * @var string
   */
  public $apiKey = '';

  /**
   * What URL used
   *
   * @var string
   */
  public $url = 'https://kudus.wablas.com';

  public function info()
  {
    $info = $this->get($this->url.'/api/device/info/'.$this->apiKey);

    return $info;
  }

  // Send Single Text
  public function sendText($phone,$text)
  {
    $params = ['phone' => $phone,'message' => $text];

    $info = $this->post($this->url.'/api/send-message', $params);

    return $info;
  }

  // Send Single Document from URL
  public function sendImage($phone,$image,$caption)
  {
    $params = [
              'phone' => $phone,
              'image' => $image,
              'caption' => $caption,
              ];

    $info = $this->post($this->url.'/api/send-image', $params);

    return $info;
  }

  // Send Single Document from URL
  public function sendDoc($phone,$document,$caption)
  {
    $params = [
              'phone' => $phone,
              'document' => $document,
              'caption' => $caption,
              ];

    $info = $this->post($this->url.'/api/send-document', $params);

    return $info;
  }

  // Send Single Video File from URL
  public function sendVideo($phone,$video,$caption)
  {
    $params = [
              'phone' => $phone,
              'video' => $video,
              'caption' => $caption,
              ];

    $info = $this->post($this->url.'/api/send-video', $params);

    return $info;
  }

  public function sendTemplate($params)
  {
    $info = $this->post($this->url.'/api/send-video', $params);

    return $info;
  }

  public function get($url)
  {
    $client = \Config\Services::curlrequest();
    $response = $client->request('GET', $url);

    return $response->data;
  }

  public function post($url,$params)
  {
    $client = \Config\Services::curlrequest();

    $response = $client->post($url, [
        'form_params' => $params,
        'headers' => [
            'Authorization' => $this->apiKey
        ],
    ]);

    $body = json_decode($response->getBody());

    if($body->status){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function sendWhatsappTemplate($phone,$text)
  {
    $client = \Config\Services::curlrequest();

    $response = $client->post($this->url.'/api/send-message', [
        'form_params' => ['phone' => $phone,'message' => $text],
        'headers' => [
            'Authorization' => $this->apiKey
        ],
    ]);

    $body = json_decode($response->getBody());

    if($body->status){
      return TRUE;
    }else{
      return FALSE;
    }

  }

}
