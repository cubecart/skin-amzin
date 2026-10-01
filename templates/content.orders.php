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

{if $IS_USER}
	
	<h2 class="content-title">{$LANG.account.your_orders}</h2>

	{if $ORDERS}
		
		<p class="well well-sm">{$LANG.account.your_orders_explained}</p>
		
		<div class="row">
			<div class="col-xs-12 split-pagination">
				{$PAGINATION}
			</div>
		</div>

		<div class="">
			{foreach from=$ORDERS item=order}
				<div class="panel order-panel">
					<div class="panel-heading">
						{if $CONFIG.oid_mode=='i'}{$order.{$CONFIG.oid_col}}{else}{$order.cart_order_id}{/if}
						<span class="badge" title="{$LANG.common.status} : {$order.status.text}">{$order.status.text}</span>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12 col-sm-6">{$LANG.common.date} : {$order.time}</div>
							<div class="col-xs-12 col-sm-6">{$LANG.basket.total} : {$order.total}</div>
						</div>
					</div>
					<div class="panel-footer">
						<ul class="list-unstyled order-options">
							{if $order.cancel}
								<li><a href="{$STORE_URL}/index.php?_a=vieworder&cancel={$order.cart_order_id}" class="" title="{$LANG.basket.cancel_order}"><i class="fas fa-times"></i> {$LANG.basket.cancel_order}</a></li>
							{/if}
							{if $order.make_payment}
								<li><a href="{$STORE_URL}/index.php?_a=gateway&cart_order_id={$order.cart_order_id}&retrieve=1" class=""><i class="fas fa-shopping-cart"></i> {$LANG.basket.complete_payment}</a></li>
							{/if}
							{if  !$order.make_payment && !empty($order.basket)}
								<li><a href="{$STORE_URL}/index.php?_a=vieworder&reorder={$order.cart_order_id}" class="" title="{$LANG.common.reorder}"><i class="fas fa-sync"></i> {$LANG.common.reorder}</a></li>
							{/if}
							<li><a href="{$STORE_URL}/index.php?_a=vieworder&cart_order_id={$order.cart_order_id}" class="" title="{$LANG.common.view_details}"><i class="fas fa-eye"></i> {$LANG.common.view_details}</a></li>
								{if $order.withdrawal_eligible}
								<li><a href="{$order.withdrawal_url}" class="" title="{$LANG.withdrawal.button}"><i class="fas fa-undo"></i> {$LANG.withdrawal.button}</a></li>
								{/if}

						</ul>
					</div>
				</div>
			{/foreach}
		</div>

		<div class="row">
			<div class="col-xs-12 split-pagination">
				{$PAGINATION}
			</div>
		</div>
		
	{else}

		<div class="error_block text-center">
			<div class="block_icon"><i class="fas fa-shopping-basket"></i></div>
			<h2>{$LANG.account.no_orders_made}</h2>
		</div>

	{/if}
	
{else}
	
	<h2 class="content-title">{$LANG.account.lookup_order}</h2>
	
	<br><br>
	
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<form action="{$VAL_SELF}" id="lookup_order" method="post">
		<dl class="row">
			<dt><label for="lookup_order_id">{$LANG.basket.order_number}</label></dt>
			<dd><input type="text" id="lookup_order_id" class="form-control" name="cart_order_id" value="{$ORDER_NUMBER}"></dd>
		</dl>
		<dl class="row">
			<dt><label for="lookup_email">{$LANG.common.email}</label></dt>
			<dd><input type="text" id="lookup_email" class="form-control" name="email" value=""></dd>
		</dl>
		<dl class="text-center">
			<input type="submit" value="{$LANG.common.search}" class="btn btn-success">
		</dl>
		<div class="hide" id="validate_field_required">{$LANG.form.field_required}</div>
		<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
		</form>
	</div>

{/if}