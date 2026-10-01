{*
 * Amzin skin for CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2026. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Originally created by NiteFox (NiteTower Design) and
 * transferred to CubeCart Limited in 2022.
 * ========================================
 * Web:   https://www.cubecart.com
 * Email:  hello@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 *}

{if isset($ADDRESSES)}

	<h2 class="content-title">{$LANG.address.your_address_book}</h2>
	
	<div class="text-right">
		<a href="{$STORE_URL}/index.php?_a=addressbook&action=add" class="btn btn-default"><i class="fas fa-plus-square"></i> {$LANG.address.address_add}</a>
	</div>

	<br>

	<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
	
		{foreach from=$ADDRESSES item=address}
			<div class="panel addressbook-panel {if $address.billing}callout{/if}">
			
				<div class="panel-heading">
					<a href="?_a=addressbook&action=edit&address_id={$address.address_id}">{$address.description}</a>
				</div>
				
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-sm-6 address-data">
							{if !empty($address.title)}{$address.title|capitalize} {/if}{$address.first_name|capitalize} {$address.last_name|capitalize}
							<br>
							{$address.line1|capitalize}<br/>
							{if !empty($address.line2)} {$address.line2|capitalize}<br/>{/if}
							{$address.town|upper}<br/>
							{if !empty($address.state)}{$address.state|upper}<br/>{/if}
							{$address.postcode}{if $CONFIG['store_country_name']!==$address['country']}<br>
							{$address.country}{/if}
						</div>
						<div class="col-xs-12 col-sm-6 address-badges">
							<span class="badge">{$LANG.address.default_delivery_address} <i class="fas fa-{if $address.default}check{else}times{/if}"></i></span>
							<span class="badge">{$LANG.address.delivery_address} <i class="fas fa-check"></i></span>
							<span class="badge">{$LANG.address.billing_address} <i class="fas fa-{if $address.billing}check{else}times{/if}"></i></span>
						</div>
					</div>
				</div>
				
				<div class="panel-footer clearfix">
					<a href="?_a=addressbook&action=edit&address_id={$address.address_id}" class="btn btn-default btn-xs pull-right">{$LANG.common.edit}</a>
					<input type="checkbox" name="delete[]" value="{$address.address_id}"{if $address.billing} disabled{/if}> {$LANG.common.delete}
				</div>
			
			</div>
		{/foreach}
		
		<div class="clearfix">
			<button type="submit" class="btn btn-danger">{$LANG.common.delete_selected}</button>
			<div class="pull-right">
				{if $CHECKOUT_BUTTON}
					<a href="?_a=basket" class="btn btn-success">{if $CONFIG.ssl == 1}{$LANG.basket.basket_secure_checkout}{else}{$LANG.basket.basket_checkout}{/if}</a>{else}<a href="?" class="btn btn-success">{$LANG.basket.continue_shopping}</a>
				{/if}
			</div>
		</div>

	</form>
{/if}

{if isset($CTRL_FORM)}
	<div class="panel panel-default">
		<div class="panel-heading">{if $DATA.address_id>0}{$LANG.address.edit_address}{else}{$LANG.address.add_address}{/if}</div>
		<div class="panel-body">
			<form action="{$VAL_SELF}" method="post" id="addressbook_form" enctype="multipart/form-data">
			<div class="row">
				<dl class="col-xs-12 col-sm-6">
					<dt><label for="addr_description">{$LANG.common.description}</label></dt>
					<dd><input type="text" name="description" id="addr_description" class="form-control" value="{$DATA.description}" placeholder="{$LANG.address.example_address_description}"></dd>
				</dl>
			</div>
			<hr>
			<div class="row">
				<dl class="col-xs-12 col-sm-5">
					<dt><label for="addr_first_name">{$LANG.user.name_first}</label></dt>
					<dd><input type="text" name="first_name" id="addr_first_name" class="form-control" value="{$DATA.first_name|capitalize}" required placeholder="{$LANG.user.name_first} {$LANG.form.required}"></dd>
				</dl>
				<dl class="col-xs-12 col-sm-5">
					<dt><label for="addr_last_name">{$LANG.user.name_last}</label></dt>
					<dd><input type="text" name="last_name" id="addr_last_name" class="form-control" value="{$DATA.last_name|capitalize}" required placeholder="{$LANG.user.name_last} {$LANG.form.required}"></dd>
				</dl>
			</div>
			<div class="row">
				<dl class="col-xs-12">
					<dt><label for="addr_company_name">{$LANG.address.company_name}</label></dt>
					<dd><input type="text" name="company_name" id="addr_company_name" class="form-control" value="{$DATA.company_name}" placeholder="{$LANG.address.company_name}"></dd>
				</dl>
			</div>
			
			<address>
				<div class="row">
					<dl class="col-xs-12 col-sm-6">
						<dt><label for="addr_line1">{$LANG.address.line1}</label></dt>
						<dd><input type="text" name="line1" id="addr_line1" value="{$DATA.line1|capitalize}" required placeholder="{if $ADDRESS_LOOKUP}{$LANG.address.address_lookup}{else}{$LANG.address.line1} {$LANG.form.required}{/if}" autocomplete="off" autocorrect="off" class="form-control address_lookup"></dd>
					</dl>
				</div>
				
				{if $ADDRESS_LOOKUP}
					<p id="lookup_fail"><a href="#">{$LANG.address.address_not_found}</a></p>
				{/if}
				
				<div{if $ADDRESS_LOOKUP} class="hidden"{/if} id="address_form">
					<div class="row">
						<dl class="col-xs-12 col-sm-6">
							<dt><label for="addr_line2">{$LANG.address.line2}</label></dt>
							<dd><input type="text" name="line2" id="addr_line2" class="form-control" value="{$DATA.line2|capitalize}" placeholder="{$LANG.address.line2}"></dd>
						</dl>
					</div>
					<div class="row">
						<dl class="col-xs-12 col-sm-6">
							<dt><label for="addr_town">{$LANG.address.town}</label></dt>
							<dd><input type="text" name="town" id="addr_town" class="form-control" value="{$DATA.town|upper}" required placeholder="{$LANG.address.town} {$LANG.form.required}"></dd>
						</dl>
					</div>
					<div class="row">
						<dl class="col-xs-12 col-sm-6">
							<dt><label for="country-list">{$LANG.address.country}</label></dt>
							<dd>
								<select name="country" id="country-list" class="form-control">
									{foreach from=$COUNTRIES item=country}
										<option value="{$country.numcode}" data-status="{$country.status}" {$country.selected}>{$country.name}</option>
									{/foreach}
								</select>
							</dd>
						</dl>
						<dl class="col-xs-12 col-sm-6" id="state-list_wrapper">
							<dt><label for="state-list">{$LANG.address.state}</label></dt>
							<dd><input type="text" name="state" id="state-list" class="form-control" required value="{$DATA.state|upper}" placeholder="{$LANG.address.state} {$LANG.form.required}"></dd>
						</dl>
					</div>
					<div class="row">
						<dl class="col-xs-12 col-sm-6">
							<dt><label for="addr_postcode">{$LANG.address.postcode}</label></dt>
							<dd><input type="text" name="postcode" id="addr_postcode" class="form-control" value="{$DATA.postcode}" required placeholder="{$LANG.address.postcode} {$LANG.form.required}"></dd>
						</dl>
						{if !empty($CONFIG.w3w)}
							<dl class="col-xs-12 col-sm-6">
								<dt><label for="w3w">{$LANG.address.w3w_address} {$LANG.common.optional}</label></dt>
								<dd>
									{include file='templates/element.w3w.php' value=$DATA.w3w as_id='w3w_as' input_id='w3w' input_name='w3w' country_id='country-list'}
								</dd>
							</dl>
						{/if}					
					</div>
				</div>
			</address>
			
			<hr>

			<div>
				<input name="billing" type="checkbox" id="addr_billing" value="1" {$DATA.billing}> <label for="addr_billing">{$LANG.address.billing_address}</label>
			</div>
			<div>
				<input name="default" type="checkbox" id="addr_default" value="1" {$DATA.default}> <label for="addr_default">{$LANG.address.default_delivery_address}</label>
			</div>
			
			<hr>
			
			<div class="clearfix text-center">
				
				<input type="hidden" name="address_id" value="{$DATA.address_id}">
				<a href="index.php?_a={$REDIR}"class="btn btn-default pull-left"><i class="fas fa-arrow-left"></i> {$LANG.common.cancel}</a>
				<span class="pull-right">
					<button type="reset" class="btn btn-danger">{$LANG.common.reset}</button>
					&nbsp;
					<input type="submit" name="save" value="{$LANG.common.save}" class="btn btn-success">
				</span>
			</div>
			
			<div class="hide" id="validate_field_required">{$LANG.form.field_required}</div>
			
			</form>
		</div>
	</div>
	
	<script type="text/javascript">
	   var county_list = {if !empty($VAL_JSON_STATE)}{$VAL_JSON_STATE}{else}false{/if};
	</script>
{/if}