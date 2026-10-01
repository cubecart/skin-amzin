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

{if isset($ITEMS)}
	
	<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data" class="autosubmit" id="checkout_form">
	
	{if $INCLUDE_CHECKOUT}
		{include file='templates/content.checkout.confirm.php'}
	{/if}
   
   <br>	
   <h3 class="content-title">{$LANG.checkout.your_basket}</h3>
   {foreach from=$ITEMS key=hash item=item}
	<div class="checkout-item clearfix" id="ci_{$hash}">

		<div class="row">
			<div class="col-xs-8 ci-col-1">
				<div class="row">
					<div class="item-thumb col-xs-4 col-sm-3">
						<a href="{$item.link}" class="th" title="{$item.name}"><img src="{$item.image}" alt="{$item.name}"></a>
					</div>
					<div class="item-details col-xs-8 col-sm-9">
						<a href="{$item.link}">{$item.name}</a>
						<ul class="list-unstyled item_options">
							{if $item.options}
								{foreach from=$item.options item=option}
									<li class="text-muted">
										<strong>{$option.option_name}</strong>: {$option.value_name|truncate:45:"&hellip;":true}{if !empty($option.price_display)} ({$option.price_display}){/if}
									</li>
								{/foreach}
							{/if}
							{if $item.quantity gt 1}
								<li class="text-muted"><strong>{$LANG.common.price_unit}</strong>: {$item.line_price_display}</li>
							{/if}
						</ul>
						<div class="item-remove">
							<a href="{$STORE_URL}/index.php?_a=basket&remove-item={$hash}"><i class="fas fa-trash"></i> {$LANG.common.remove}</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 ci-col-2">
				<div class="row">
					<div class="item-quant col-xs-12 col-sm-6">
						<a href="#" class="quan subtract" rel="{$hash}"><i class="fas fa-minus-square"></i></a>
						<span id="quant_display" class="disp_quan_{$hash}">{$item.quantity}</span>
						<input name="quan[{$hash}]" maxlength="4" type="hidden" value="{$item.quantity}">
						<span id="original_val_{$hash}" class="hide">{$item.quantity}</span>
						<a href="#" class="quan add" rel="{$hash}"><i class="fas fa-plus-square"></i></a>
					</div>
					<div class="item-tprice col-xs-12 col-sm-6">
						<span id="ci_pdisplay_{$hash}">{$item.price_display}</span>
						<div id="quick_update_{$hash}" class="hidden">
							<button type="submit" name="update" class="btn btn-success btn-xs update-btn" value="{$LANG.basket.basket_update}">{$LANG.common.update}</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	{/foreach}

	<br>
	<br>

	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					{if isset($SHIPPING)}
						{if !isset($free_coupon_shipping)}
							<strong>{$LANG.basket.shipping_select}:</strong><br>
							<select name="shipping" class="form-control" style="">
								<option value="">{$LANG.form.please_select}</option>
								{foreach from=$SHIPPING key=group item=methods}
									{if $HIDE_OPTION_GROUPS ne '1'}
										<optgroup label="{$group}">
									{/if}
									{foreach from=$methods item=method}
										<option value="{$method.value}" {$method.selected}>{$method.display}</option>
									{/foreach}
									{if $HIDE_OPTION_GROUPS ne '1'}
										</optgroup>
									{/if}
								{/foreach}
							</select>
						{/if}
						<br>
						<br>
					{/if}
				
					<div>
						<strong>{$LANG.basket.coupon_add}</strong>
						<div class="input-group">
							<input name="coupon" id="coupon" type="text" maxlength="25" class="form-control">
							<div class="input-group-btn">
							<button type="submit" name="update" class="btn btn-success" value="{$LANG.common.apply}"><i class="fas fa-plus"></i></button>
							</div>
						</div>
					</div>
					<br>
					<br>
				</div>
							
				<div class="col-xs-12 col-sm-6">
			
				<table class="table table-bordered basket-totals-table">
					<tbody>
						{if $BASKET_WEIGHT}
							<tr>
								<td>
									{$LANG.basket.weight}: 
								</td>
								<td class="text-right">
									{$BASKET_WEIGHT}
								</td>
							</tr>
						{/if}
					
						<tr>
							<td>{$LANG.basket.total_sub}</td>
							<td class="text-right">{$SUBTOTAL}</td>
						</tr>
						
						{if isset($SHIPPING)}
							<tr>
								<td>
									{$LANG.basket.shipping}
									{if $ESTIMATE_SHIPPING}
										(<a href="#" data-toggle="modal" data-target="#myEstimate">{$LANG.common.refine_estimate}</a>)
										
										<div class="modal fade" id="myEstimate" tabindex="-1" role="dialog" aria-labelledby="myEstimateLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
														<h4 class="modal-title" id="myEstLabel">{$LANG.basket.specify_shipping}</h4>
													</div>
													<div class="modal-body clearfix">
														<div id="getEstimate">
															<div class="row">
															<dl class="col-xs-12">
																<dt><label for="estimate_country">{$LANG.address.country}</label></dt>
																<dd>
																	<select name="estimate[country]" id="estimate_country"  class="nosubmit form-control country-list" rel="estimate_state">
																		{foreach from=$COUNTRIES item=country}
																			<option value="{$country.numcode}" data-status="{$country.status}" {$country.selected}>{$country.name}</option>
																		{/foreach}
																	</select>
																</dd>
															</dl>
															</div>
															<div class="row">
																<dl class="col-xs-6" id="estimate_state_wrapper">
																	<dt><label for="estimate_state">{$LANG.address.state}</label></dt>
																	<dd><input type="text" name="estimate[state]" id="estimate_state" class="form-control" value="{$ESTIMATES.state}" placeholder="{$LANG.address.state}"></dd>
																</dl>
																<dl class="col-xs-6">
																	<dt><label for="estimate_postcode">{$LANG.address.postcode}</label></dt>
																	<dd><input type="text" value="{$ESTIMATES.postcode}" id="estimate_postcode" class="form-control" placeholder="{$LANG.address.postcode}" name="estimate[postcode]"></dd>
																</dl>
															</div>
														</div>
													</div>
													<div class="modal-footer text-center">
														<input type="submit" name="get-estimate" class="btn btn-success" value="{$LANG.basket.fetch_shipping_rates}">
														<script type="text/javascript">
															 var county_list = {if !empty($STATE_JSON)}{$STATE_JSON}{else}false{/if};
														</script>
													</div>
												</div>
											</div>
										</div>
									{/if}
								</td>
								<td class="text-right">{$SHIPPING_VALUE}</td>
							</tr>
						{/if}
					   
					   {foreach from=$TAXES item=tax}
							<tr>
								<td>{if $tax.included}{$LANG.common.includes} {/if}{$tax.name}{$CUSTOMER_LOCALE.mark}</td>
								<td class="text-right">{$tax.value}</td>
							</tr>
						{/foreach}
						{foreach from=$COUPONS item=coupon}
							<tr class="checkout-coupon-row">
								<td>{$coupon.voucher} <a href="{$VAL_SELF}&remove_code={$coupon.remove_code}" title="{$LANG.common.remove}"><i class="fas fa-times"></i></a></td>
								<td class="text-right">{$coupon.value}</td>
							</tr>
						{/foreach}
						{if isset($DISCOUNT)}
							<tr class="checkout-discount-row">
								<td>{$LANG.basket.total_discount}</td>
								<td class="text-right">{$DISCOUNT}</td>
							</tr>
						{/if}
						<tr class="checkout-total-row">
							<td>{$LANG.basket.total_grand}</td>
							<td class="text-right">{$TOTAL}</td>
						</tr>
					</tbody>
				</table>

			</div>
			</div>
		</div>
	</div>
	

	{if $INCLUDE_CHECKOUT && !$DISABLE_GATEWAYS}
		{if $GATEWAYS|@count > 1}
		<br>
		<div id="payment_method">
			<div class="panel panel-default">
				<div class="panel-heading">{$LANG.gateway.select}</div>
				<ul class="list-group gateway-list" id="gateway_error">
					{foreach from=$GATEWAYS item=gateway}
						<li class="list-group-item">
							<input name="gateway" type="radio" class="nosubmit" value="{$gateway.folder}" id="{$gateway.folder}" required {$gateway.checked} rel="gateway_error"><label for="{$gateway.folder}"> {$gateway.description}</label>

							{if !empty($gateway.help)}
								<a href="{$gateway.help}" class="info" title="{$LANG.common.information}"><i class="fas fa-info-circle"></i></a>
							{/if}
						</li>
					{/foreach}
				</ul>
				<div class="hide" id="validate_gateway_required">{$LANG.gateway.choose_payment}</div>
			</div>
		</div>
		{else}
			{foreach from=$GATEWAYS item=gateway}
			<input type="hidden" name="gateway" value="{$gateway.folder}">
			{/foreach}
		{/if}
	{/if}
	
	{if $TERMS_CONDITIONS && isset($ALTERNATE_TERMS) && $ALTERNATE_TERMS=='0'}
		<ul class="list-group checkout-accepts">
			<li class="list-group-item">
				<span id="error_terms_agree"><input type="checkbox" id="reg_terms" name="terms_agree" value="1" rel="error_terms_agree"><label for="reg_terms">{$LANG.account.register_terms_agree_link|replace:'%s':{$TERMS_CONDITIONS}}</label></span>
			</li>
		</ul>
	{/if}
	
	<hr>
	
	<div class="row">
		<div class="col-xs-12 checkout-controls">
			<div class="row">
				<div class="col-xs-12 col-sm-4 cc-btn-col cc-btn-col-1 text-center">
					<button type="submit" name="update" class="btn btn-success cc-btn-1" value="{$LANG.basket.basket_update}"><i class="fas fa-sync hidden-xs"></i> {$LANG.basket.basket_update}</button>
				</div>
				<div class="col-xs-12 col-sm-4 cc-btn-col cc-btn-col-2 text-center">
					<a href="?" class="btn btn-default cc-btn-2">{$LANG.basket.continue_shopping}</a>
				</div>
				<div class="col-xs-12 col-sm-4 cc-btn-col cc-btn-col-3 text-center">
					{if $DISABLE_CHECKOUT_BUTTON!==true}
						<button type="submit" name="proceed" id="checkout_proceed" class="btn btn-success cc-btn-3 g-recaptcha">{$CHECKOUT_BUTTON} <i class="fas fa-arrow-right"></i></button>
					{/if}
				</div>
			</div>
		</div>
	</div>

</form>

<br><br>

{if $DISABLE_CHECKOUT_BUTTON!==true}
	{if $CHECKOUTS}
		<div class="row">
			<div class="col-xs-12 text-right">-- {$LANG.common.or} --</div>
		</div>
		{foreach from=$CHECKOUTS item=checkout}
			<div class="row">
				<div class="col-xs-12 text-right">{$checkout}</div>
			</div>
		{/foreach}
	{/if}
{/if}

{if $RELATED}
	<br>
	{include file='templates/box.checkout.related.php'}
{/if}


{else}
	
	<div class="error_block text-center">
		<div class="block_icon"><i class="fas fa-shopping-basket"></i></div>
		<h2>{$LANG.basket.basket_is_empty}</h2>
		<a href="?" class="btn btn-default">{$LANG.basket.continue_shopping}</a>
	</div>

{/if}