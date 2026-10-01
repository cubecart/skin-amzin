{*
 * Amzin CubeCart Template
 * ========================================
 * Amzin is a template developed by NiteFox 
 * also known as NiteTower Design.
 * ========================================
 * Web:        https://www.facebook.com/CubeCartThemes
 * Email:      nitetowerdesign@gmail.com
 * License:    http://nitefox.x10host.com/license.html
 * Disclaimer: http://nitefox.x10host.com/disclaimer.html
 *}

<div class="order-receipt-content">

	<h3 class="order-summary">
		<i class="fas fa-shopping-basket"></i> {$LANG.basket.order_summary}
		<a href="{$STORE_URL}/index.php?_a=receipt&cart_order_id={$SUM.cart_order_id}{if !$IS_USER}&email={$SUM.email}{/if}" target="_blank" class="print-inv-link"><i class="fas fa-print"></i> {$LANG.confirm.print}</a>
			{if $SUM.withdrawal_eligible}
			<a href="{$SUM.withdrawal_url}" class="print-inv-link" title="{$LANG.withdrawal.button}"><i class="fas fa-undo"></i> {$LANG.withdrawal.button}</a>
			{/if}
	</h3>
	
	<br>

	<div class="row text-center">
		<div class="col-xs-12 receipt-head">
			<div class="col-xs-12 col-sm-4">
				<strong>{$LANG.orders.order_number}:</strong>
				<br>
				{if $CONFIG.oid_mode=='i'}{$SUM.{$CONFIG.oid_col}}{else}{$SUM.cart_order_id}{/if}
			</div>
			<div class="col-xs-12 col-sm-4">
				<div><strong>{$LANG.basket.order_date}:</strong><br>{$SUM.order_date_formatted}</div>
			</div>
			<div class="col-xs-12 col-sm-4">
				<div class="order_status_block stat_{$SUM.status}">
					<div class="status_text"><strong>{$LANG.orders.title_order_status}:</strong></div>
					<div class="status">{$SUM.order_status}</div>
				</div>
			</div>
		</div>
	</div>
	
	<br>
	
	<ul class="list-group order-product-list">
		{foreach from=$ITEMS item=item}
 		<li class="list-group-item ri-item">
			<div class="row ">
				<div class="ri-col-1 col-xs-9">
					<div class="ri-name">
						<strong>{$item.name}{if !empty($item.product_code)} ({$item.product_code}){/if}</strong>
					</div>
					<div class="ri-options">
						{if !empty($item.options)}
							{foreach from=$item.options item=option}
								<div class="text-muted">
									{$option}
								</div>
							{/foreach}
						{/if}
						<div class="ri-quantity text-muted"><strong>{$item.quantity}</strong> x <strong>{$item.price}</strong></div>
					</div>
				</div>
				<div class="ri-col-2 col-xs-3 text-muted">
					<div class="ri-quantity"><strong>{$item.quantity}</strong> x <strong>{$item.price}</strong></div>
					<span class="ri-price">
						{$item.price_total}
					</span>
				</div>
			</div>
		</li>
		{/foreach}
	</ul>
	
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{if !empty($SUM.customer_comments)}
				<div class="panel panel-default">
					<div class="panel-heading">{$LANG.common.comments}</div>
					<div class="panel-body">&quot;{$SUM.customer_comments}&quot;</div>
				</div>
			{/if}
		</div>
		<div class="col-xs-12 col-sm-6">
			<table class="table table-bordered" style="font-size:12px;">
				<tbody>
					<tr>
						<td>{$LANG.basket.total_sub}</td>
						<td class="text-right">{$SUM.subtotal}</td>
					</tr>
					<tr>
						<td>{if !empty($SUM.ship_method)}{$SUM.ship_method|replace:'_':' '}{if !empty($SUM.ship_product)} ({$SUM.ship_product}){/if}{else}{$LANG.basket.shipping}{/if}</td>
						<td class="text-right">{$SUM.shipping}</td>
					</tr>
					{foreach from=$TAXES item=tax}
					<tr>
						<td>{if $tax.included}{$LANG.common.includes} {/if}{$tax.name}</td>
						<td class="text-right">{$tax.value}</td>
					</tr>
					{/foreach}
					{if $DISCOUNT}
					<tr class="ri-discount-row">
						<td>{$LANG.basket.total_discount}</td>
						<td class="text-right">{$SUM.discount}</td>
					</tr>
					{/if}
					<tr class="ri-total-row">
						<td>{$LANG.basket.total_grand}</td>
						<td class="text-right">{$SUM.total}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
		
	<br>
	
	<div class="row">
		<div class="col-xs-12 {if $DELIVERY}col-sm-6{/if}">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fas fa-user"></i> {$LANG.basket.customer_info}</div>
				<div class="panel-body">			
					<div class="row">
						<div class="ri-billing-col col-xs-12 col-sm-6">
							<strong>{$LANG.address.billing_address}</strong><br>
							{$SUM.title} {$SUM.first_name|capitalize} {$SUM.last_name|capitalize}<br>
							{if $SUM.company_name}{$SUM.company_name}<br>{/if}
							{$SUM.line1|capitalize}<br>
							{if $SUM.line2|capitalize}{$SUM.line2|capitalize}<br>{/if}
							{$SUM.town|upper}<br>
							{if !empty($SUM.state)}{$SUM.state|upper}, {/if}{$SUM.postcode}{if $CONFIG['store_country_name']!==$SUM['country']}<br>
							{$SUM.country}{/if}
							 {if !empty($SUM.w3w)}
								<div class="w3w">///<a href="https://what3words.com/{$SUM.w3w}">{$SUM.w3w}</a></div>
							{/if}
							<br>
							<br>
						</div>
						<div class="ri-delivery-col col-xs-12 col-sm-6">
							<strong>{$LANG.address.delivery_address}</strong><br>
							{$SUM.title_d} {$SUM.first_name_d} {$SUM.last_name_d}<br>
							{if $SUM.company_name_d}{$SUM.company_name_d}<br>{/if}
							{$SUM.line1_d|capitalize}<br>
							{if $SUM.line2_d|capitalize}{$SUM.line2_d|capitalize}<br>{/if}
							{$SUM.town_d|upper}<br>
							{if !empty($SUM.state_d)}{$SUM.state_d|upper}, {/if}{$SUM.postcode_d}{if $CONFIG['store_country_name']!==$SUM['country_d']}<br>
							{$SUM.country_d}{/if}
							{if !empty($SUM.w3w_d)}
								<div class="w3w">///<a href="https://what3words.com/{$SUM.w3w_d}">{$SUM.w3w_d}</a></div>
							{/if}
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-xs-12 {if $DELIVERY}col-sm-6{/if}">
			{if $DELIVERY}
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fas fa-truck"></i> {$LANG.common.delivery}</div>
					<div class="panel-body">
						<div class="ri-delivery-sec row">
							<div class="col-xs-12">
							{if !empty($DELIVERY.date)}
								<div class="delivery-block">
									<div><strong>{$LANG.orders.shipping_date}:</strong></div>
									<div>{$DELIVERY.date}</div>
									<br>
								</div>
							{/if}
							{if !empty($DELIVERY.method)}
								<div class="delivery-block">
									<div><strong>{$LANG.catalogue.delivery_method}:</strong></div>
									<div>{$DELIVERY.method|replace:'_':' '}{if !empty($DELIVERY.product)} ({$DELIVERY.product|replace:'_':' '}){/if}</div>
									<br>
								</div>
							{/if}
							{if !empty($DELIVERY.url)}
								<div class="delivery-block">
									<div><strong>{$LANG.orders.shipping_tracking}:</strong></div>
									<div><a class="btn btn-success btn-xs" href="{$DELIVERY.url}" target="_blank">{$LANG.basket.track}</a></div>
								</div>
							{elseif !empty($DELIVERY.tracking)}
								<div class="delivery-block">
									<div><strong>{$LANG.orders.shipping_tracking}:</strong></div>
									<div>{$DELIVERY.tracking}</div>
								</div>
							{/if}
							</div>
						</div>
					</div>
				</div>
			{/if}
		</div>
		
	</div>
	
	
	<br>

	{if !empty($SUM.note_to_customer)}
		<hr>
		<div class="alert alert-info">{$SUM.note_to_customer}</div>
	{/if}

	{foreach from=$AFFILIATES item=affiliate}
		{$affiliate}
	{/foreach}

</div>

{if $ANALYTICS && $GA_SUM}
<script>
{literal}(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', '{/literal}{$ANALYTICS}{literal}', 'auto');
  ga('require', 'ecommerce');
  ga('ecommerce:addTransaction', {
    'id': '{/literal}{$GA_SUM.cart_order_id}{literal}',
    'affiliation': '{/literal}{$GA_SUM.store_name}{literal}',
    'revenue': '{/literal}{$GA_SUM.total}{literal}',
    'shipping': '{/literal}{$GA_SUM.shipping}{literal}',
    'tax': '{/literal}{$GA_SUM.total_tax}{literal}'
  });
{/literal}{foreach from=$GA_ITEMS item=item}{literal}ga('ecommerce:addItem', {
    'id': '{/literal}{$GA_SUM.cart_order_id}{literal}',
    'name': '{/literal}{$item.name}{literal}',
    'sku': '{/literal}{$item.product_code}{literal}',
    'price': '{/literal}{$item.price}{literal}',
    'quantity': '{/literal}{$item.quantity}{literal}',
    'category': '{/literal}{$ITEM_CATS.{$item.product_id}}{literal}'
  });{/literal}{/foreach}{literal}  ga('ecommerce:send');{/literal}
</script>
{/if}