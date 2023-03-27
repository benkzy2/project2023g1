<?php
header("Content-type: text/css; charset: UTF-8");

if(isset($_GET['color']))
{
  $color = '#'.htmlspecialchars($_GET['color']);
}
else {
  $color = "'" . htmlspecialchars($color) . "'";
}
?>

.title h2 {
    color: <?php echo htmlspecialchars($color); ?>;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    background-color: <?php echo htmlspecialchars($color); ?>;
}
a {
    color: <?php echo htmlspecialchars($color); ?>;
}
.food-menu-area.food-menu-3-area .food-menu-items .single-menu-item .menu-price-btn a {
    color: <?php echo htmlspecialchars($color); ?>;
}
.food-menu-area.food-menu-3-area .food-menu-items .single-menu-item .menu-price-btn a::before {
    background: <?php echo htmlspecialchars($color); ?>2a;
}
.food-menu-area.food-menu-3-area .food-menu-items .single-menu-item .menu-price-btn a::after {
    border-color: <?php echo htmlspecialchars($color); ?>;
}
.food-menu-area .food-menu-items .single-menu-item .menu-price-btn span {
    color: <?php echo htmlspecialchars($color); ?>;
}
.menu-price-btn del {
    color: <?php echo htmlspecialchars($color); ?>;
}
.food-menu-area.food-menu-2-area .food-menu-items .single-menu-item:hover {
    border: 1px solid <?php echo htmlspecialchars($color); ?>;
}
#variationModal .btn-primary {
    background-color: <?php echo htmlspecialchars($color); ?>;
    border-color: <?php echo htmlspecialchars($color); ?>;
}

#variationModal .form-check span {
    color: <?php echo htmlspecialchars($color); ?>;
}

#variationModal .modal-title small {
    color: <?php echo htmlspecialchars($color); ?>;
}
.cart-icon {
    background-color: <?php echo htmlspecialchars($color); ?>;
}
.cart-header {
    background-color: <?php echo htmlspecialchars($color); ?>;
}
.cart-sidebar .cart-item h4.title a {
    color: <?php echo htmlspecialchars($color); ?>;
}
.cart-sidebar .cart-button {
    border: 1px solid <?php echo htmlspecialchars($color); ?>;
    background-color: <?php echo htmlspecialchars($color); ?>;
}
.cart-sidebar .cart-total strong {
    color: <?php echo htmlspecialchars($color); ?>;
}
.base-btn {
    background-color: <?php echo htmlspecialchars($color); ?>;
    border: 1px solid <?php echo htmlspecialchars($color); ?>;
}
.login-area .login-content .input-btn button {
    background: <?php echo htmlspecialchars($color); ?>;
    border-color: <?php echo htmlspecialchars($color); ?>;
}
.login-area .login-content .input-btn button:hover {
    color: <?php echo htmlspecialchars($color); ?>;
}
.qr-breadcrumb-details h2 {
    color: <?php echo htmlspecialchars($color); ?>;
}
.main-btn.main-btn-2 {
    background-color: <?php echo htmlspecialchars($color); ?>;
    border-color: <?php echo htmlspecialchars($color); ?>;
}
.checkout-area .coupon:before {
    background: <?php echo htmlspecialchars($color); ?>;
}
.food-menu-area .food-menu-items .single-menu-item .menu-content a.title:hover {
    color: <?php echo htmlspecialchars($color); ?>;
}