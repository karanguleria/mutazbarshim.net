<?php

/*
  Template name: Api Cart
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['stProduct'])) {
global $woocommerce;
//print_r($_POST);
//871
        // if (isset($_POST['stQuantity'])) {
//         WC()->cart->add_to_cart($_POST['stProduct'], $_POST['stQuantity'], $_POST['stVariation']);
          $msg = 'Cart updated';
          $status = 'success';
        // } else {
//            $cart_in = WC()->cart->add_to_cart($_POST['stProduct']);
//            echo($cart_in);
//$state =true;
$total = $_POST['stQuantity'];
        foreach($woocommerce->cart->get_cart() as $key => $val ) {
            
//           
//        $_product = $val['data'];
        if($_POST['stVariation'] == $val['variation_id']) {
//            echo $key;
//            echo   $val['product_id'];
             $vari = WC()->cart->get_cart_item($key);
//        print_r($vari['quantity']);
//        echo "old".$vari['quantity'];
        if(@$vari){
            $qty = $_POST['stQuantity'] ;
            $total = $vari['quantity']+$qty ;
//            echo $total;
//            WC()->cart->set_quantity(  $key,  $total,true);
            echo "removed";
            WC()->cart->remove_cart_item( $key );
            
//            $state= false;
        }
//            return true;
        }
    }
   
         WC()->cart->add_to_cart($_POST['stProduct'], $total, $_POST['stVariation']);
   
//       echo $_POST['stProduct'];
//        $in_cart = WC()->cart->find_product_in_cart(871);
//        $in_cart = WC()->cart->find_product_in_cart(868);
//        echo "<pre>";
//        var_dump($in_cart);
//        echo "</pre>";
//        echo "asd".$in_cart;
       


        // if(!WC()->cart->add_to_cart($_POST['stProduct'], $_POST['stQuantity']))
//            WC()->cart->add_to_cart($_POST['stProduct'], $_POST['stQuantity']);
        //WC()->cart->set_quantity(  $cart_in,  $vari = 1,  $refresh_totals = true);
        //  }
    }
    $response_arr = array('message' => $msg, 'status' => $status);
    echo json_encode($response_arr);
}
?>
