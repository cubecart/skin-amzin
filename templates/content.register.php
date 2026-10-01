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

<h2 class="content-title">{$LANG.account.register}</h2>

<div class="text-right">
	{$LANG.account.already_registered} <a href="{$STORE_URL}/login{$CONFIG.seo_ext}" class="btn btn-sm btn-default">{$LANG.account.login_here}</a>
</div>

<hr>

<form action="{$VAL_SELF}" id="registration_form" method="post" name="registration">
	{foreach from=$LOGIN_HTML item=html}
		{$html}
	{/foreach}
	
	<div class="row">
		<dl class="col-xs-12 col-sm-5">
			<dt><label for="first_name">{$LANG.user.name_first}</label></dt>
			<dd><input type="text" name="first_name" id="first_name" class="form-control" value="{$DATA.first_name|capitalize}" placeholder="{$LANG.user.name_first} {$LANG.form.required}" required ></dd>
		</dl>
		<dl class="col-xs-12 col-sm-5">
			<dt><label for="last_name">{$LANG.user.name_last}</label></dt>
			<dd><input type="text" name="last_name" id="last_name" class="form-control" value="{$DATA.last_name|capitalize}"  placeholder="{$LANG.user.name_last} {$LANG.form.required}" required></dd>
		</dl>
	</div>
	<dl>
		<dt><label for="email">{$LANG.common.email}</label></dt>
		<dd><input type="text" name="email" id="email" class="form-control" value="{$DATA.email}" placeholder="{$LANG.common.email}  {$LANG.form.required}" required ></dd>
	</dl>
	<div class="row">
		<dl class="col-xs-12 col-sm-6">
			<dt><label for="phone">{$LANG.address.phone}</label></dt>
			<dd><input type="text" name="phone" id="phone" class="form-control" value="{$DATA.phone}" placeholder="{$LANG.address.phone} {$LANG.form.required}" required></dd>
		</dl>
		<dl class="col-xs-12 col-sm-6">
			<dt><label for="mobile">{$LANG.address.mobile}</label></dt>
			<dd><input type="text" name="mobile" id="mobile" class="form-control" value="{$DATA.mobile}" placeholder="{$LANG.address.mobile}"></dd>
		</dl>
	</div>
	<div class="row">
		<dl class="col-xs-12 col-sm-6">
			<dt><label for="password">{$LANG.account.password}</label></dt>
			<dd><input type="password" autocomplete="off" name="password" id="password" class="form-control" placeholder="{$LANG.account.password} {$LANG.form.required}" required ></dd>
		</dl>
		<dl class="col-xs-12 col-sm-6">
			<dt><label for="passconf">{$LANG.account.password_confirm}</label></dt>
			<dd><input type="password" autocomplete="off" name="passconf" id="passconf" class="form-control" placeholder="{$LANG.account.password_confirm}  {$LANG.form.required}" required ></dd>
		</dl>
	</div>
	
	<div class="row">
		<dl class="col-xs-12">
			{include file='templates/content.recaptcha.php'}
		</dl>
	</div>
	
	<hr>
	
	<dl class="well well-sm">
		{if $TERMS_CONDITIONS}
		<dd>
			<span id="error_terms_agree"><input type="checkbox" id="terms" name="terms_agree" value="1" {$TERMS_CONDITIONS_CHECKED} rel="error_terms_agree"><label for="terms">{$LANG.account.register_terms_agree_link|replace:'%s':{$TERMS_CONDITIONS}}</label></span>
		</dd>
		{/if}
		<dd>
			<input type="checkbox" id="mailing" name="mailing_list" value="1" {if isset($DATA.mailing_list) && $DATA.mailing_list == 1}checked{/if}><label for="mailing">{$LANG.account.register_mailing}</label>
		</dd>
	</dl>
	
	<hr>

	<div class="text-center">
		
		<input type="submit" name="register" value="{$LANG.account.register}" id="register_submit" class="g-recaptcha btn btn-success">
	</div>
	
</form>

<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
<div class="hide" id="validate_email_in_use">{$LANG.account.error_email_in_use}</div>
<div class="hide" id="validate_firstname">{$LANG.account.error_firstname_required}</div>
<div class="hide" id="validate_lastname">{$LANG.account.error_lastname_required}</div>
<div class="hide" id="validate_terms_agree">{$LANG.account.error_terms_agree}</div>
<div class="hide" id="validate_password">{$LANG.account.error_password_empty}</div>
<div class="hide" id="validate_password_length">{$LANG.account.error_password_length}</div>
<div class="hide" id="validate_password_mismatch">{$LANG.account.error_password_mismatch}</div>
<div class="hide" id="validate_phone">{$LANG.account.error_valid_phone}</div>
<div class="hide" id="validate_mobile">{$LANG.account.error_valid_mobile_phone}</div>
<div class="hide" id="validate_required">{$LANG.form.required}</div>