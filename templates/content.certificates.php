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

<h2 class="content-title">{$LANG.catalogue.gift_certificates}</h2>

<p class="well well-sm">{$LANG_CERT_VALUES}</p>

<br><br>

<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
	
		<form id="gc_form" action="{$VAL_SELF}" method="post" class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<dl class="col-xs-5 col-sm-6">
						<dt><label for="gc-value">{$LANG.common.value} ({$CONFIG.default_currency})</label></dt>
						<dd><input type="text" name="gc[value]" id="gc-value" class="form-control" value="{$POST.value}" placeholder="{$LANG.common.value} {$LANG.form.required}" required></dd>
					</dl>
					<dl class="col-xs-7 col-sm-6">
						<dt><label for="gc-method">{$LANG.catalogue.delivery_method}</label></dt>
						<dd>
							<select name="gc[method]" id="gc-method" class="form-control">
								{if in_array($GC.delivery, array(1,3))}<option value="e">{$LANG.common.email}</option>{/if}
								{if in_array($GC.delivery, array(2,3))}<option value="m">{$LANG.common.post}</option>{/if}
							</select>
						</dd>
					</dl>
				</div>
				<div class="row">
					<dl class="col-xs-12">
						<dt><label for="gc-name">{$LANG.catalogue.recipient_name}</label></dt>
						<dd><input type="text" name="gc[name]" id="gc-name" class="form-control" value="{$POST.name}" placeholder="{$LANG.catalogue.recipient_name} {$LANG.form.required}" required></dd>
					</dl>
					{if in_array($GC.delivery, array(1,3))}
						<dl class="col-xs-12" id="gc-method-e">
							<dt><label for="gc-email">{$LANG.catalogue.recipient_email}</label></dt>
							<dd><input type="text" name="gc[email]" id="gc-email" class="form-control" placeholder="{$LANG.catalogue.recipient_email} {$LANG.form.required}" value="{$POST.email}"></dd>
						</dl>
					{/if}
				</div>
				<div class="row">
					<dl class="col-xs-12">
						<dt><label for="gc-message">{$LANG.common.message} {$LANG.common.optional}</label></dt>
						<dd><textarea name="gc[message]" id="gc-message" class="form-control form-control-textarea">{$POST.message}</textarea></dd>
					</dl>
				</div>
				<hr>
				<dl class="text-center">
					<input type="submit" class="btn btn-success" name="Submit" value="{$LANG.catalogue.add_to_basket}"{if !$ctrl_allow_purchase} disabled="disabled"{/if}>
				</dl>
			</div>
		</form>
	</div>
</div>

<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
<div class="hide" id="validate_field_required">{$LANG.form.field_required}</div>