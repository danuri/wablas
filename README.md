# wablas
This Library for wablas API.

## Source
https://kudus.wablas.com/doc-api

## Installation & setup
- Copy `Libraries/Wablas.php` to Your `App/Libraries/`
- Copy `Controlles/Example.php` to Your `App/Controllers/` for testing
- Add route if needed

## Call From Controllers
Just need define at the top

use `App\Libraries\Wablas;`

and call function
```
public function send()
  {
    $wablas = new Wablas();
    $phone  = '081280xxxxxx';
    $text   = 'Test WA';

    $result = $wablas->sendText($phone,$text);

    echo "<pre>";
    print_r($result);
  }
  ```
