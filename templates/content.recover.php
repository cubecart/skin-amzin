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

<p class="well well-sm">{$LANG.account.recover_password_text}</p>

<br>
<br>

<div class="row">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				
				<div class="panel panel-default">
					<div class="panel-body">
						<br>
						<form action="{$VAL_SELF}" method="post" id="recover_password">
							<dl>
								<dt><label for="email">{$LANG.common.email}</label></dt>
								<dd><input type="text" name="email" id="email" class="form-control required" placeholder="{$LANG.common.email} {$LANG.form.required}"></dd>
							</dl>
							{include file='templates/content.recaptcha.php' ga_fid='recover'}
							<dl class="clearfix">
								<input type="submit" value="{$LANG.form.submit}" class="btn btn-success pull-right">
							</dl>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>


<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>