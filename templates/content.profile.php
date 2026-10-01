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

<h2 class="content-title">{$LANG.account.your_details}</h2>

<p class="well well-sm">{$LANG.account.update_your_details}</p>

<form action="{$VAL_SELF}" method="post" id="profile_form">
		
	<div class="row">
		<dl class="col-xs-12 col-sm-5">
			<dt><label for="acc_first_name">{$LANG.user.name_first}</label></dt>
			<dd><input type="text" name="first_name" id="acc_first_name" class="form-control required" value="{$USER.first_name|capitalize}" placeholder="{$LANG.user.name_first} {$LANG.form.required}" required></dd>
		</dl>
		<dl class="col-xs-12 col-sm-5">
			<dt><label for="acc_last_name">{$LANG.user.name_last}</label></dt>
			<dd><input type="text" name="last_name" id="acc_last_name" class="form-control required" value="{$USER.last_name|capitalize}" placeholder="{$LANG.user.name_last} {$LANG.form.required}" required></dd>
		</dl>
	</div>
	
	<div class="row">
		<dl class="col-xs-12">
			<dt><label for="acc_email">{$LANG.common.email}</label></dt>
			<dd><input type="text" name="email" id="acc_email" class="form-control required" value="{$USER.email}" placeholder="{$LANG.common.email} {$LANG.form.required}" required></dd>
		</dl>
	</div>
	
	<div class="row">
		<dl class="col-xs-12 col-sm-6">
			<dt><label for="acc_phone">{$LANG.address.phone}</label></dt>
			<dd><input type="text" name="phone" id="acc_phone" class="form-control required" value="{$USER.phone}" placeholder="{$LANG.address.phone} {$LANG.form.required}" required></dd>
		</dl>
		<dl class="col-xs-12 col-sm-6">
			<dt><label for="acc_mobile">{$LANG.address.mobile}</label></dt>
			<dd><input type="text" name="mobile" id="acc_mobile" class="form-control" value="{$USER.mobile}" placeholder="{$LANG.address.mobile}"></dd>
		</dl>
	</div>

	{if $ACCOUNT_EXISTS}
		<div class="panel panel-default">
			<div class="panel-heading">
				{$LANG.account.password_change}
			</div>
			<div class="panel-body">
				<p class="well well-sm">{$LANG.account.update_your_password}</p>
				
				<dl>
					<dt><label for="passold">{$LANG.user.password_current}</label></dt>
					<dd><input type="password" autocomplete="off" name="passold" id="passold" class="form-control" placeholder="{$LANG.user.password_current}"></dd>
				</dl>
				<div class="row">
					<dl class="col-xs-12 col-sm-6">
						<dt><label for="passnew">{$LANG.user.password_new}</label></dt>
						<dd><input type="password" autocomplete="off" name="passnew" id="passnew" class="form-control" placeholder="{$LANG.user.password_new}"></dd>
					</dl>
					<dl class="col-xs-12 col-sm-6">
						<dt><label for="passconf">{$LANG.user.password_confirm}</label></dt>
						<dd><input type="password" autocomplete="off" name="passconf" id="passconf" class="form-control" placeholder="{$LANG.user.password_confirm}"></dd>
					</dl>
				</div>

			</div>
		</div>
	{/if}

	<hr>

	<div class="text-center">
		<input type="submit" name="update" value="{$LANG.common.update}" class="btn btn-success">
	</div>

</form>

<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
<div class="hide" id="validate_firstname">{$LANG.account.error_firstname_required}</div>
<div class="hide" id="validate_lastname">{$LANG.account.error_lastname_required}</div>
<div class="hide" id="validate_phone">{$LANG.account.error_valid_phone}</div>
<div class="hide" id="validate_mobile">{$LANG.account.error_valid_mobile_phone}</div>
<div class="hide" id="validate_password_mismatch">{$LANG.account.error_password_mismatch}</div>
<div class="hide" id="validate_password_length">{$LANG.account.error_password_length}</div>