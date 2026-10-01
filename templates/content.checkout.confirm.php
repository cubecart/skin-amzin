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

{if $IS_USER}
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading"> {if $CTRL_DELIVERY}{$LANG.address.billing_address}{else}{$LANG.address.billing_delivery_address}{/if}</div>
				<div class="panel-body">
					{$DATA.first_name|capitalize} {$DATA.last_name|capitalize}<br>
					{if $DATA.company_name}{$DATA.company_name}<br>{/if}
					{$DATA.line1|capitalize}<br>
					{if $DATA.line2|capitalize}{$DATA.line2|capitalize}<br>{/if}
					{$DATA.town|upper}<br>
					{if !empty($DATA.state)}{$DATA.state|upper}, {/if}{$DATA.postcode}{if $CONFIG['store_country_name']!==$DATA['country']}<br>
					{$DATA.country}{/if}
					<div class="text-right" style="padding-top:10px;">
						<a href="{$STORE_URL}/index.php?_a=addressbook&action=edit&address_id={$DATA.address_id}&redir=confirm" class="btn btn-default btn-sm">{$LANG.address.address_edit}</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
		
			{if $CTRL_DELIVERY}
				{assign var=CTRL_DELIVERY value=false}
				{foreach from=$ITEMS key=hash item=item}
					{if $item.digital=='0'}
						{assign var=CTRL_DELIVERY value=true}
					{/if}
				{/foreach}
			{/if}
		
			{if $CTRL_DELIVERY}
				<div class="panel panel-default">
					<div class="panel-heading">{$LANG.address.delivery_address}</div>
					<div class="panel-body">
						<select name="delivery_address" class="form-control" style="text-transform:capitalize;">
							{foreach from=$ADDRESSES item=address}
								<option value="{$address.address_id}" {$address.selected}>{$address.description} ({$address.town|upper}, {$address.postcode})</option>
							{/foreach}
						</select>
						<div class="text-right" style="padding-top:50px;">
							<a href="{$STORE_URL}/index.php?_a=addressbook&action=add&redir=confirm" class="btn btn-default btn-sm">{$LANG.address.address_add}</a>
						</div>
					</div>
				</div>
			{/if}
		</div>
	</div>
	{if !$USER_SUBSCRIBED}
		<div class="well well-sm">
			<input type="checkbox" id="mailing_list" name="mailing_list" value="1"><label for="mailing_list">{$LANG.account.register_mailing}</label>
		</div>
	{/if}
{else}

	<div id="register_false_address" {if empty($BILLING.line1)}class="hidden"{/if}>
		<div class="panel panel-default">
			<div class="panel-heading">{$LANG.address.billing_address}</div>
			<ul class="list-group">
				<li class="list-group-item">{$BILLING.first_name|capitalize} {$BILLING.last_name|capitalize}</li>
				{if $BILLING.company_name}<li class="list-group-item">{$BILLING.company_name}</li>{/if}
				<li class="list-group-item">{$BILLING.line1|capitalize}</li>
				{if $BILLING.line2|capitalize}<li class="list-group-item">{$BILLING.line2|capitalize}</li>{/if}
				<li class="list-group-item">{$BILLING.town|upper}</li>
				<li class="list-group-item">{if !empty($BILLING.state)}{$BILLING.state|upper}, {/if}{$BILLING.postcode}</li>
				<li class="list-group-item">{$BILLING.country_name}</li>
			</ul>
		</div>
					
		<div class="panel panel-default">
			<div class="panel-body">
				<p><i class="fas fa-envelope"></i> {$USER.email}</p>
				<p><i class="fas fa-phone"></i> {$USER.phone}</p>
				{if !empty($USER.mobile)}<p><i class="fas fa-mobile"></i> {$USER.mobile}</p>{/if}
			</div>
		</div>
		
		{assign var=CTRL_DELIVERY value=false}
		{foreach from=$ITEMS key=hash item=item}
			{if $item.digital=='0'}
				{assign var=CTRL_DELIVERY value=true}
			{/if}
		{/foreach}
		{if $CTRL_DELIVERY}
			<div class="panel panel-default">
				<div class="panel-heading">{$LANG.address.delivery_address}</div>
				<ul class="list-group">
					<li class="list-group-item">{$DELIVERY.first_name|capitalize} {$DELIVERY.last_name|capitalize}</li>
					{if $DELIVERY.company_name}<li class="list-group-item">{$DELIVERY.company_name}</li>{/if}
					<li class="list-group-item">{$DELIVERY.line1|capitalize}</li>
					{if $DELIVERY.line2|capitalize}<li class="list-group-item">{$DELIVERY.line2|capitalize}</li>{/if}
					<li class="list-group-item">{$DELIVERY.town|upper}</li>
					<li class="list-group-item">{if !empty($DELIVERY.state)}{$DELIVERY.state|upper}, {/if}{$DELIVERY.postcode}</li>
					<li class="list-group-item">{$DELIVERY.country_name}</li>
				</ul>
			</div>
				
			<a href="#" class="btn btn-default show_address_form"><i class="fas fa-edit"></i> {$LANG.form.make_changes}</a>
		{/if}
	</div>

	
	<div class="hidden" id="checkout_login_form">
		<div class="panel panel-default">
			<div class="panel-heading">{$LANG.account.login} <span class="pull-right">{$LANG.account.return_register_form} <a href="#register" id="checkout_register" class="btn btn-xs btn-success">{$LANG.common.signup}</a></span></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<dl class="col-xs-12 col-sm-6">
								<dt><label for="login-username">{$LANG.user.email_address}</label></dt>
								<dd><input type="text" name="username" id="login-username" class="form-control" placeholder="{$LANG.user.email_address} {$LANG.form.required}" autocomplete="username" value="{$USERNAME}" required disabled></dd>
							</dl>
							<dl class="col-xs-12 col-sm-6">
								<dt><label for="login-password">{$LANG.account.password}</label></dt>
								<dd><input type="password" name="password" id="login-password" class="form-control" placeholder="{$LANG.account.password} {$LANG.form.required}" autocomplete="current-password" required disabled></dd>
							</dl>
						</div>
					</div>
				</div>
				<div class="text-right clearfix">
					<button type="submit" name="proceed" id="checkout_login_btn" class="btn btn-default pull-left g-recaptcha">{$LANG.account.login}</button>
					<a href="{$STORE_URL}/index.php?_a=recover">{$LANG.account.forgotten_password}</a>
				</div>
			</div>
		</div>
	</div>
	
	<div id="checkout_register_form"{if !empty($BILLING.line1)} class="hidden"{/if}>
		
		<div class="panel panel-default">
			<div class="panel-heading"><i class="fas fa-user"></i> {$LANG.account.your_details} <span class="hidden-xs">- {$LANG.account.contact_details}</span> <span class="pull-right">{$LANG.account.already_registered} <a href="#login" id="checkout_login" class="btn btn-xs btn-success">{$LANG.account.log_in}</a></span></div>
			<div class="panel-body">
				<div class="row">
					<dl class="col-xs-12">
						<dt><label for="user_first">{$LANG.user.name_first}</label></dt>
						<dd><input type="text" name="user[first_name]" id="user_first" class="form-control" required value="{$USER.first_name|capitalize}" placeholder="{$LANG.user.name_first}  {$LANG.form.required}" autocomplete="given-name"></dd>
					</dl>
				</div>
				<dl>
					<dt><label for="user_last">{$LANG.user.name_last}</label></dt>
					<dd><input type="text" name="user[last_name]" id="user_last" class="form-control" required value="{$USER.last_name|capitalize}" placeholder="{$LANG.user.name_last}  {$LANG.form.required}" autocomplete="family-name"></dd>
				</dl>
				<dl>
					<dt><label for="user_email">{$LANG.common.email}</label></dt>
					<dd><input type="text" name="user[email]" id="user_email" class="form-control" required value="{$USER.email}" placeholder="{$LANG.common.email}  {$LANG.form.required}" autocomplete="email"></dd>
				</dl>
				<div class="row">
					<dl class="col-xs-6">
						<dt><label for="user_phone">{$LANG.address.phone}</label></dt>
						<dd><input type="text" name="user[phone]" id="user_phone" class="form-control" required value="{$USER.phone}" placeholder="{$LANG.address.phone}  {$LANG.form.required}" autocomplete="tel"></dd>
					</dl>
					<dl class="col-xs-6">
						<dt><label for="user_mobile">{$LANG.address.mobile}</label></dt>
						<dd><input type="text" name="user[mobile]" id="user_mobile" class="form-control" value="{$USER.mobile}" placeholder="{$LANG.address.mobile}" autocomplete="tel"></dd>
					</dl>
				</div>
								
				<div class="well well-sm">
					<input type="checkbox" name="register" id="show-reg" value="1" {$REGISTER_CHECKED}><label for="show-reg">{$LANG.account.create_account}</label>
				</div>
			
				<div class="row" id="account-reg">
					<dl class="col-xs-12 col-sm-6">
						<dt><label for="reg_password">{$LANG.account.password}</label></dt>
						<dd><input type="password" autocomplete="off" name="password" id="reg_password" class="form-control" required  placeholder="{$LANG.account.password} {$LANG.form.required}" autocomplete="new-password"></dd>
					</dl>
					<dl class="col-xs-12 col-sm-6">
						<dt><label for="reg_passconf">{$LANG.user.password_confirm}</label></dt>
						<dd><input type="password" autocomplete="off" name="passconf" id="reg_passconf" class="form-control" required  placeholder="{$LANG.user.password_confirm} {$LANG.form.required}" autocomplete="new-password"></dd>
					</dl>
				</div>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading"><i class="fas fa-home"></i> {$LANG.address.billing_address}</div>
			<div class="panel-body">
				{if !$ALLOW_DELIVERY_ADDRESS}<div class="alert alert-info text-center">{$LANG.address.ship_to_billing_only}</div>{/if}
				<dl>
					<dt><label for="addr_company">{$LANG.address.company_name}</label></dt>
					<dd><input type="text" name="billing[company_name]" id="addr_company" class="form-control" value="{$BILLING.company_name}" placeholder="{$LANG.address.company_name}" autocomplete="organization"></dd>
				</dl>
				<address>
					<dl>
						<dt><label for="addr_line1">{$LANG.address.line1}</label></dt>
						<dd><input type="text" name="billing[line1]" id="addr_line1" value="{$BILLING.line1|capitalize}" placeholder="{if $ADDRESS_LOOKUP}{$LANG.address.address_lookup}{else}{$LANG.address.line1} {$LANG.form.required}{/if}" autocomplete="off" autocorrect="off" class="form-control address_lookup"></dd>
					</dl>
					{if $ADDRESS_LOOKUP}
						<p id="lookup_fail"><a href="#">{$LANG.address.address_not_found}</a></p>
					{/if}
					<div{if $ADDRESS_LOOKUP} class="hidden"{/if} id="address_form">
					<dl>
						<dt><label for="addr_line2">{$LANG.address.line2}</label></dt>
						<dd><input type="text" name="billing[line2]" id="addr_line2" class="form-control" value="{$BILLING.line2|capitalize}" placeholder="{$LANG.address.line2}" autocomplete="address-line2"></dd>
					</dl>
					<div class="row">
						<dl class="col-xs-6">
							<dt><label for="addr_town">{$LANG.address.town}</label></dt>
							<dd><input type="text" name="billing[town]" id="addr_town" class="form-control" required value="{$BILLING.town|upper}" placeholder="{$LANG.address.town} {$LANG.form.required}" autocomplete="address-level2"></dd>
						</dl>
						<dl class="col-xs-6">
							<dt><label for="addr_postcode">{$LANG.address.postcode}</label></dt>
							<dd><input type="text" name="billing[postcode]" id="addr_postcode" class="form-control uppercase required" value="{$BILLING.postcode}" placeholder="{$LANG.address.postcode} {$LANG.form.required}" autocomplete="postal-code"></dd>
						</dl>
					</div>
					<div class="row">
						<dl class="col-xs-12 col-sm-6">
							<dt><label for="country-list">{$LANG.address.country}</label></dt>
							<dd><select name="billing[country]" class="nosubmit form-control" rel="state-list" id="country-list" autocomplete="country-name">
								{foreach from=$COUNTRIES item=country}
									<option value="{$country.numcode}" data-status="{$country.status}" {$country.selected}>{$country.name}</option>
								{/foreach}
								</select>
							</dd>
						</dl>
						<dl class="col-xs-12 col-sm-6" id="state-list_wrapper">
							<dt><label for="state-list">{$LANG.address.state}</label></dt>
							<dd><input type="text" name="billing[state]" id="state-list" class="form-control" value="{$BILLING.state|upper}" autocomplete="address-line1"></dd>
						</dl>
					</div>
					
					{if !empty($CONFIG.w3w)}
						<div class="row">
							<dl class="col-xs-12 col-sm-6">
								<dt><label for="w3w">{$LANG.address.w3w_address} {$LANG.common.optional}</label></dt>
								<dd>
									{include file='templates/element.w3w.php' value=$BILLING.w3w as_id='w3w_as_billing' input_id='w3w_billing' input_name='billing[w3w]' country_id='country-list'}
								</dd>
							</dl>
						</div>
					{/if}
				</address>
						
				{assign var=CTRL_DELIVERY value=false}
				{foreach from=$ITEMS key=hash item=item}
					{if $item.digital=='0'}
						{assign var=CTRL_DELIVERY value=true}
					{/if}
				{/foreach}
				{if !$CTRL_DELIVERY}
					<input type="hidden" name="delivery_is_billing" id="delivery_is_billing" value="1">
				{else if $ALLOW_DELIVERY_ADDRESS}
					<div class="well well-sm">
						<input type="checkbox" name="delivery_is_billing" id="delivery_is_billing" {$DELIVERY_CHECKED}><label for="delivery_is_billing">{$LANG.address.delivery_is_billing}</label>
					</div>
				{/if}
						
			</div>
		</div>

		
		{if $ALLOW_DELIVERY_ADDRESS}
			<div class="hidden" id="address_delivery">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fas fa-truck"></i> {$LANG.address.delivery_address}</div>
					<div class="panel-body">
						<div class="row">			
							<dl class="col-xs-12 col-sm-6">
								<dt><label for="del_first">{$LANG.user.name_first}</label></dt>
								<dd><input type="text" name="delivery[first_name]" id="del_first" class="form-control"  required value="{$DELIVERY.first_name|capitalize}" placeholder="{$LANG.user.name_first} {$LANG.form.required}" autocomplete="given-name"></dd>
							</dl>
							<dl class="col-xs-12 col-sm-6">
								<dt><label for="del_last">{$LANG.user.name_last}</label></dt>
								<dd><input type="text" name="delivery[last_name]" id="del_last" class="form-control"  required value="{$DELIVERY.last_name|capitalize}" placeholder="{$LANG.user.name_last} {$LANG.form.required}" autocomplete="family-name"></dd>
							</dl>
						</div>
						<dl>
							<dt><label for="del_company">{$LANG.address.company_name}</label></dt>
							<dd><input type="text" name="delivery[company_name]" id="del_company" class="form-control" value="{$DELIVERY.company_name}" placeholder="{$LANG.user.company_name}" autocomplete="organization"></dd>
						</dl>
						<address>
							<dl>
								<dt><label for="del_line1">{$LANG.address.line1}</label></dt>
								<dd><input type="text" name="delivery[line1]" id="del_line1" class="form-control" required value="{$DELIVERY.line1|capitalize}" placeholder="{$LANG.address.line1} {$LANG.form.required}" autocomplete="address-line1"></dd>
							</dl>
							<dl>
								<dt><label for="del_line2">{$LANG.address.line2}</label></dt>
								<dd><input type="text" name="delivery[line2]" id="del_line2" class="form-control" value="{$DELIVERY.line2|capitalize}" placeholder="{$LANG.address.line2}" autocomplete="address-line2"></dd>
							</dl>
							<div class="row">
								<dl class="col-xs-6">
									<dt><label for="del_town">{$LANG.address.town}</label></dt>
									<dd><input type="text" name="delivery[town]" id="del_town" class="form-control" required value="{$DELIVERY.town|upper}" placeholder="{$LANG.address.town} {$LANG.form.required}" autocomplete="address-level2"></dd>
								</dl>
								<dl class="col-xs-6">
									<dt><label for="del_postcode">{$LANG.address.postcode}</label></dt>
									<dd><input type="text" name="delivery[postcode]" id="del_postcode"  class="form-control uppercase required" value="{$DELIVERY.postcode}" placeholder="{$LANG.address.postcode} {$LANG.form.required}" autocomplete="postal-code"></dd>
								</dl>
							</div>
							<div class="row">
								<dl class="col-xs-12 col-sm-6">
									<dt><label for="delivery_country">{$LANG.address.country}</label></dt>
									<dd><select name="delivery[country]" id="delivery_country"  class="nosubmit form-control country-list" rel="delivery_state" autocomplete="country-name">
										{foreach from=$COUNTRIES item=country}
											<option value="{$country.numcode}" data-status="{$country.status}" {$country.selected_d}>{$country.name}</option>
										{/foreach}
										</select>
									</dd>
								</dl>
								<dl class="col-xs-12 col-sm-6" id="delivery_state_wrapper">
									<dt><label for="delivery_state">{$LANG.address.state}</label></dt>
									<dd><input type="text" name="delivery[state]" id="delivery_state" class="form-control" value="{$DELIVERY.state|upper}" placeholder="{$LANG.address.state} {$LANG.form.required}" autocomplete="address-level1"></dd>
								</dl>
							</div>
							{if !empty($CONFIG.w3w)}
								<div class="row">
									<dl class="col-xs-12 col-sm-6">
										<dt><label for="w3w">{$LANG.address.w3w_address} {$LANG.common.optional}</label></dt>
										<dd>
											{include file='templates/element.w3w.php' value=$DELIVERY.w3w as_id='w3w_as_delivery' input_id='w3w_delivery' input_name='delivery[w3w]' country_id='delivery_country'}
										</dd>
									</dl>
								</div>
							{/if}
						</address>
						
						<script type="text/javascript">
							var county_list = {if !empty($STATE_JSON)}{$STATE_JSON}{else}false{/if};
						</script>
					</div>
				</div>
			</div>
		{/if}	
		
		<br class="hidden-xs">
		
		<ul class="list-group checkout-accepts">
			{if $TERMS_CONDITIONS}
				<li class="list-group-item">
					<span id="error_terms_agree"><input type="checkbox" id="reg_terms" name="terms_agree" value="1" target="_blank" {$TERMS_CONDITIONS_CHECKED} rel="error_terms_agree"><label for="reg_terms">{$LANG.account.register_terms_agree_link|replace:'%s':{$TERMS_CONDITIONS}}</label></span>
				</li>
			{/if}
			<li class="list-group-item">
				<input type="checkbox" id="mailing_list" name="mailing_list" value="1" {$MAILING_LIST_SUBSCRIBE}><label for="mailing_list">{$LANG.account.register_mailing}</label>
			</li>
		</ul>
			
	</div>
	
	<br>
		{include file='templates/content.recaptcha.php'}
	<br>
	
{/if}

<div class="panel panel-default">
	<div class="panel-heading"><label for="delivery_comments" class="return"><i class="fas fa-comments"></i> {$LANG.basket.your_comments}</label></div>
	<div class="panel-body">
		<textarea name="comments" id="delivery_comments" class="form-control">{$VAL_CUSTOMER_COMMENTS}</textarea>
	</div>
</div>




<div class="hide" id="validate_required">{$LANG.form.required}</div>
<div class="hide" id="validate_field_required">{$LANG.form.field_required}</div>
<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
<div class="hide" id="validate_email_in_use">{$LANG.account.error_email_in_use}</div>
<div class="hide" id="validate_phone">{$LANG.account.error_valid_phone}</div>
<div class="hide" id="validate_mobile">{$LANG.account.error_valid_mobile_phone}</div>
<div class="hide" id="validate_password">{$LANG.account.error_password_empty}</div>
<div class="hide" id="validate_password_length">{$LANG.account.error_password_length}</div>
<div class="hide" id="validate_password_mismatch">{$LANG.account.error_password_mismatch}</div>
<div class="hide" id="validate_terms_agree">{$LANG.account.error_terms_agree}</div>
