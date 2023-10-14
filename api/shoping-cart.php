<?php
// Verifique se o cookie 'carrinho' existe
if (isset($_COOKIE['carrinho'])) {
    $carrinho = unserialize($_COOKIE['carrinho']);
} else {
    $carrinho = array();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delicias Deia</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="../css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

    <script src="../script.js"></script>
</head>

<body>
    <!-- Here is a page Preloder, this implementation is optional -->
    <!-- Page Preloder <div id="preloder"> <div class="loader"></div> </div> -->

     <!-- Logo of webiste -->
     <div class="offcanvas-menu-overlay"></div>
     <div class="offcanvas-menu-wrapper">
  
         <div class="offcanvas__logo">
             <a href="../index.html"><img src="../img/logo.png" alt=""></a>
         </div>
         <div id="mobile-menu-wrap"></div>
         <div class="offcanvas__option">
 
         </div>
     </div>
     <!-- End Logo of webiste -->
 
     <!-- Navigation shop-details -->
     <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                            </div>
                            <div class="header__logo">
                                <a href="../index.html"><img src="../img/logo.png" alt=""></a>
                            </div>
                            <div class="header__top__right">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="../index.html">Início</a></li>
                            <li><a href="../shop.html">Loja</a></li>
                            <li class="active"><a href="./shoping-cart.php">Carrinho</a></li>
                            <li><a href="../contact.html">Contato</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- End navigation shop-details -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Carrinho</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="../index.html">Início</a>
                        <span>Carrinho</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            require_once 'connection.php';

                            foreach ($carrinho as $product_id => $quantity) {
                                // Consulta para obter o produto específico pelo ID do produto
                                $query = "SELECT * FROM Products WHERE idProduct = $product_id AND active = 1";
                                $result = $db->query($query);

                                if ($result) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="displayImage.php?produto_id=' . $row['idProduct'] . '" alt="' . $row['nameProduct'] . '">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6>' . $row['nameProduct'] . '</h6>
                                                    <h5>R$ ' . $row['price'] . '</h5>
                                                </div>
                                            </td>
                                            <td class="quantity__item">
                                                <div class="quantity">
                                                    <div>
                                                    <input type="number" class="quantity-input" value="' . $quantity . '" data-product-id="' . $row['idProduct'] . '" style="width: 50px;">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price" data-product-id="' . $row['idProduct'] . '" data-product-price="' . $row['price'] . '">R$ ' . ($row['price'] * $quantity) . '</td>
                                            <td class="cart__remove">
                                            <button class="remove-button" data-product-id="' . $row['idProduct'] . '">Remover</button>
                                        </td>';
                                        echo '</tr>';
                                    }
                                }
                            }
                            ?>                        
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="../shop.html">Mais alguma coisa?</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-whatsapp"></i> Enviar para o whatsapp!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Códigos para desconto</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Aplicar</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Total da compra</h6>
                        <ul>
                            <li>Subtotal <span>R$ 169.50</span></li>
                            <li>Total <span>R$ 169.50</span></li>
                            <a href="#" class="primary-btn">Enviar pedido para whatsapp!</a>
                        </ul>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="../img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>WORKING HOURS</h6>
                        <ul>
                            <li>Monday - Friday: 08:00 am – 08:30 pm</li>
                            <li>Saturday: 10:00 am – 16:30 pm</li>
                            <li>Sunday: 10:00 am – 16:30 pm</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore dolore magna aliqua.</p>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <h6>Subscribe</h6>
                        <p>Get latest updates and offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white">
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Marco Nascimento
                        
                      </p>
                  </div>
                  <div class="col-lg-5">
                    <div class="copyright__widget">
                        <ul>
                            <li><a href="#">Politicas e privacidades</a></li>
                            <li><a href="#">Termos e condições</a></li>
                           
                            <li><a href="#">Whatsapp</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.nice-select.min.js"></script>
<script src="../js/jquery.barfiller.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/jquery.slicknav.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.nicescroll.min.js"></script>
<script src="../js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Função para atualizar o preço ao alterar a quantidade
    function updatePrice(productId, quantity) {
        const priceElement = $(`.cart__price[data-product-id="${productId}"]`);
        const productPrice = parseFloat(priceElement.data('product-price'));
        const newPrice = productPrice * quantity;
        priceElement.text(`R$ ${newPrice.toFixed(2)}`);
    }

    // Função para remover um item do carrinho
    function removeProduct(productId) {
        // Encontre o elemento da linha do carrinho correspondente
        const cartItem = $('.cart__remove button[data-product-id="' + productId + '"]').closest('tr');
        
        // Remove a linha do carrinho
        cartItem.remove();
    }

    // Lidar com o clique no botão "Remover"
    $('.remove-button').click(function() {
        const productId = $(this).data('product-id');
        removeProduct(productId);
    });


    // Função para atualizar o preço e remover o item quando a quantidade muda
    $('.quantity-input').on('change', function () {
        const productId = $(this).data('product-id');
        const newQuantity = parseInt($(this).val());
        updatePrice(productId, newQuantity);
    });
</script>






</body>

</html>