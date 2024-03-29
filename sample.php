<?php

/**
 * @filename: sample.php
 * @project: 5BX Test Client sample implementation
 * @dependencies: 5bx.php
 */

require __DIR__ . '/src/_5bx.php';

use Pagerange\Bx\_5bx;


// These test values may or may not work
// For consisten results, get your own id and key
define('_5BX_API_LOGIN_ID', '23452345');
define('_5BX_API_KEY', 'asdfasdfasdfasdfasdfasdf');



// Sample implementation
// Create a 5bx object
// add your parameters using the methods below
// get your response by execting the authorize_and_capture() method
// $response is a JSON object, already encoded
  try {
	  $transaction = new _5bx(_5BX_API_LOGIN_ID, _5BX_API_KEY);
	  $transaction->amount('5.99');
	  $transaction->card_num('4111111111111111'); // credit card number
	  $transaction->exp_date ('0418'); // expiry date month and year
	  $transaction->cvv('333'); // card cvv number
	  $transaction->ref_num('2011099'); // your reference or invoice number
	  $transaction->card_type('visa'); // card type
	  $response = $transaction->authorize_and_capture(); // returns JSON object
  } catch (Exception $e) {
	  die($e->getMessage());
  }


// Once you've got the response, do what you need to do...
  // ...output errors
  // ...commit to database
  // ...etc
  // 

print_r($response);
die;

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





