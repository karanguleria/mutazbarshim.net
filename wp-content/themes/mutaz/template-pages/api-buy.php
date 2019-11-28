<?php
/*
Template name: Api Buy
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['stProduct'])) { 
     global $woocommerce;
        $msg = 'Cart updated';
        $status = 'success';
        $total = $_POST['stQuantity'];
        foreach ($woocommerce->cart->get_cart() as $key => $val) {
            if ($_POST['stVariation'] == $val['variation_id']) {
                $vari = WC()->cart->get_cart_item($key);
                if (@$vari) { 
                    $qty = $_POST['stQuantity'];
                    $total = $vari['quantity'] + $qty;
                    WC()->cart->remove_cart_item($key);
                }
            }
        }

        WC()->cart->add_to_cart($_POST['stProduct'], $total, $_POST['stVariation']);
    }
    if (@$key)
        $response_arr = array('message' => $msg, 'status' => $status, 'key' => $key, 'quantity' => $total);
    else
        $response_arr = array('message' => $msg, 'status' => $status);

    echo json_encode($response_arr);
}
?>
