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

<h2 class="content-title">{$LANG.account.recover_password}</h2>

<p class="well well-sm">{$LANG.account.enter_validation_key}</p>

<br>

<form action="{$VAL_SELF}" id="password_recovery" method="post">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
			<div class="row">
				<div class="col-xs-12">
					<dl>
						<dt><label for="email">{$LANG.common.email}</label></dt>
						<dd><input type="text" name="email" id="email" value="{$DATA.email}" class="form-control" placeholder="{$LANG.common.email} ({$LANG.common.required})" required></dd>
					</dl>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<dl>
						<dt><label for="validate">{$LANG.account.validation_key}</label></dt>
						<dd><input type="text" name="validate" id="validate" value="{$DATA.validate}" class="form-control" placeholder="{$LANG.account.validation_key} ({$LANG.common.required})" required></dd>
					</dl>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<dl>
						<dt><label for="password">{$LANG.account.new_password}</label></dt>
						<dd><input type="password" autocomplete="off" name="password[password]" id="password" class="form-control" placeholder="{$LANG.account.new_password} ({$LANG.common.required})" required></dd>
					</dl>
				</div>
				<div class="col-xs-12 col-sm-6">
					<dl>
						<dt><label for="passconf">{$LANG.account.new_password_confirm}</label></dt>
						<dd><input type="password" autocomplete="off" name="password[passconf]" id="passconf" class="form-control" placeholder="{$LANG.account.new_password_confirm} ({$LANG.common.required})" required></dd>
					</dl>
				</div>
			</div>
			<hr>
			<div class="text-center">
				<input type="submit" value="{$LANG.form.submit}" class="btn btn-success">
			</div>
		</div>
	</div>
</form>

<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
<div class="hide" id="validate_password">{$LANG.account.error_password_empty}</div>
<div class="hide" id="validate_password_length">{$LANG.account.error_password_length}</div>
<div class="hide" id="validate_password_mismatch">{$LANG.account.error_password_mismatch}</div>
<div class="hide" id="validate_field_required">{$LANG.form.field_required}</div>