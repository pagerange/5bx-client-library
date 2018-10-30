# 5BX Client

This is a simple client library to be used with a website integrating with the 5BX mock payment gateway.

Before you being, you must acquire a 5BX Gateway login id and API key.

Use and instantiate the 5bx class, then authorize your mock transaction through the gateway.

```php

    // Sample implementation
    // Create a 5bx object
    // add your parameters using the methods below
    // get your response by executing the authorize_and_capture() method
    // $response is a JSON object, already encoded
    
        use Pagerange\Bx\5bx

        $transaction = new _5bx($my_login_id, $my_api_key);
        $transaction->amount('5.99');
        $transaction->card_num('4111111111111111'); // credit card number
        $transaction->exp_date ('0418'); // expiry date month and year
        $transaction->cvv('333'); // card cvv number
        $transaction->ref_num('2011099'); // your reference or invoice number
        $transaction->card_type('visa'); // card type
        $response = $transaction->authorize_and_capture(); // returns JSON object



    // Once you've got the response, do what you need to do...
    // ...output errors
    // ...commit to database
    // ...etc

    if ($response->transaction_response->response_code == '1') {
        // Your transaction was authorized... do something
        echo "Success! Authorization Code: " . $response->transaction_response->auth_code;
    } elseif(count($response->transaction_response->errors)) {
        foreach($response->transaction_response->errors as $error) {
            echo $error . '<br />';
        }
    }

    echo '<pre>';
    print_r($response);

```
