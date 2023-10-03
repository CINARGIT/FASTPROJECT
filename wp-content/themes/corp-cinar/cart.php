	<!-- Корзина -->
		<a href="<?php echo wc_get_cart_url(); ?>" title="Корзина" id="main_cart">
			<img src="<?=get_template_directory_uri()?>/img/cart.svg" alt="cart">
			<span id="mini-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
		</a>