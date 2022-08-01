<?php

namespace App\Controllers;
use App\Libraries\Wablas;

class Example extends BaseController
{
  public function info()
  {
    $wablas = new Wablas();
    $result = $wablas->info();

    echo "<pre>";
    print_r($result);
  }

  public function send()
  {
    $wablas = new Wablas();
    $phone  = '081280xxxxxx';
    $text   = 'Test WA';

    $result = $wablas->sendText($phone,$text);

    echo "<pre>";
    print_r($result);
  }

  public function sendimage()
  {
    $wablas = new Wablas();
    $phone  = '081280xxxxxx';
    $image   = 'https://cdn-asset.jawapos.com/wp-content/uploads/2019/01/keluarga-pawang-di-jepang-maafkan-macan-putih-yang-membunuhnya_m_.jpg';
    $caption   = 'Test Caption Image';

    $result = $wablas->sendImage($phone,$image,$caption);
    // $result = $wablas->sendDoc($phone,$documen,$caption);
    // $result = $wablas->sendVideo($phone,$video,$caption);

    echo "<pre>";
    print_r($result);
  }

  public function sendtemplate()
  {
    $wablas = new Wablas();
    $data  = [
        'phone' => '6281218xxxxxx',
        'message'=> [
            'title' => [
                'type' => 'image', //text,image,document,video
                'content' => 'https://cdn-asset.jawapos.com/wp-content/uploads/2019/01/keluarga-pawang-di-jepang-maafkan-macan-putih-yang-membunuhnya_m_.jpg',
            ],
            'buttons' => [
                'url' => [
                    'display' => 'wablas.com',
                    'link' => 'https://wablas.com',
                ],
                'call' => [
                    'display' => 'contact us',
                    'link' => '081223644660',
                ],
                'quickReply' => ["reply 1","reply 2"],
            ],
            'content' => 'sending template message...',
            'footer' => 'footer template here',
        ],
    ];

    $result = $wablas->sendTemplate($data);

    echo "<pre>";
    print_r($result);
  }
}
