<?php

include 'include.php';

$invoice_id = 1;
$price_in_usd = 12.98;
$product_url = '';
$price_in_btc = file_get_contents($blockchain_root . "tobtc?currency=USD&value=" . $price_in_usd);

?>

<html>
<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript" src="pay-now-button-v2.js"></script>
    
    <script type="text/javascript">
	$(document).ready(function() {
		$('.stage-paid').on('show', function() {
			window.location.href = './order_status.php?invoice_id=<?php echo $invoice_id; ?>';
		});
	});
	</script>
</head>
    <body>

        <button class="blockchain-btn" style="width:auto" data-create-url="create.php?invoice_id=<?php echo $invoice_id; ?>"> 
            <div class="blockchain stage-begin">
            </div>
            <div class="blockchain stage-loading" style="text-align:center">
                <img src="loading-large.gif">
            </div>
            <div class="blockchain stage-ready" style="text-align:center">
                Please send <?php echo $price_in_btc; ?> BTC to <br /> <b>[[address]]</b> <br />
                <div class='qr-code'></div>
            </div>
            <div class="blockchain stage-paid">
                Payment Received <b>[[value]] BTC</b>. Thank You.
            </div>
            <div class="blockchain stage-error">
                <font color="red">[[error]]</font>
            </div>
        </div>
    </body>
</html>