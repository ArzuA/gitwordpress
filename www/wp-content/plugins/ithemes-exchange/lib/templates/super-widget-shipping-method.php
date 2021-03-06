<?php
/**
 * This is the default template part for the core shipping-method
 * purchase requirement element in the super-widget-shipping-method
 * template part.
 *
 * @since 1.4.0
 * @version 1.4.0
 * @package IT_Exchange
 *
 * WARNING: Do not edit this file directly. To use
 * this template in a theme, copy over this file
 * to the exchange/ directory located in your theme.
*/

// Don't show anything if shipping-method requirement exists and hasn't been met
if ( in_array( 'customer-has-shipping-address', it_exchange_get_pending_purchase_requirements() ) )
	return;
?>
<div class="it-exchange-sw-processing it-exchange-sw-processing-shipping cart-items-wrapper">
	<?php do_action( 'it_exchange_super_widget_shipping_method_purchase_requirement_before_element' ); ?>
	<div class="it-exchange-checkout-shipping-method-purchase-requirement it-exchange-sw-processing-inner">
		<?php do_action( 'it_exchange_super_widget_shipping_method_purchase_requirement_begin_element' ); ?>
		<div class="it-exchange-sw-processing-section">
			<h3><?php _e( 'Shipping Method', 'it-l10n-ithemes-exchange' ); ?></h3>
			<?php it_exchange( 'shipping-method', 'form' ); ?>
		</div>

		<div id="it-exchange-super-widget-shipping-method-actions">
			<?php it_exchange( 'shipping-method', 'cancel' ); ?>
		</div>

		<?php do_action( 'it_exchange_super_widget_shipping_method_purchase_requirement_end_element' ); ?>
	</div>
	<?php do_action( 'it_exchange_super_widget_shipping_method_purchase_requirement_after_element' ); ?>
</div>
