<?php
include "config.php";

if(!loggedin()){
    header("location: /login");
}

$msg = $err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    foreach($_SESSION['order_data'] as $order_data){
        $stmt = $mysqli->prepare("UPDATE item SET quantity = quantity - ? WHERE item_id = ?");
        $stmt->bind_param("is", $order_data['quantity'], $order_data['item_id']);
        if($stmt->execute()){
            $subtotal = $order_data['price'] * $order_data['quantity'];
            $shipping = 0;
            $discount = 0;
            $stmt = $mysqli->prepare("
                    INSERT INTO orders(title, seller_id, buyer_id, item_id, price, quantity, shipping, discount, total_price, fullname, phone, address)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?);");
            $stmt->bind_param("siisiiiiisss", $order_data['title'], $order_data['seller_id'], $_SESSION['id'], $order_data['item_id'], $order_data['price'], $order_data['quantity'], 
                    $shipping, $discount, $subtotal, $_POST['fullname'], $_POST['phone'], $_POST['address']);
            $stmt->execute();
            
            $mysqli->query("DELETE FROM shopping_cart WHERE cart_id = {$order_data['cart_id']}");
            unset($_SESSION['order_data']);
            unset($_SESSION['order_total']);
        } else {
            $err = "Something went wrong. Please try again later.";
        }
    }
}

?>

<?php $title = "NULLBOOKSELL - Payment"; include "template/html_top.inc"; ?>
<body>
    <?php include "template/html_header.inc"; ?>
    
    <div class="container">
        <?php if($err){ ?>
            <h1>Payment Failure</h1>
            <div class='alert alert-danger' role='alert'>
                <?php echo $err; ?>
            </div>
        <?php } else { ?>
            <h1>Payment Successful</h1>
            <div class='alert alert-success' role='alert'>
                You can view your orders in <a href='order_history'>Order History</a>.
            </div>
        <?php }?>
    </div>
<?php include "template/html_footer.inc"; ?>
</body>
<script src="/js/card.js"></script>
</html>