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

 <h2 class="content-title">{$LANG.documents.document_contact}</h2>

{if !empty($CONTACT.description)}
	<div class="well well-sm">{$CONTACT.description}</div>
{/if}


<form action="{$VAL_SELF}" id="contact_form" method="post">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
			<div class="row">
				<dl class="col-xs-12 col-sm-6">
					<dt><label for="contact_name">{$LANG.common.name}</label></dt>
					<dd><input type="text" name="contact[name]" id="contact_name" class="form-control" value="{$MESSAGE.name}" placeholder="{$LANG.common.name} {$LANG.form.required}"></dd>
				</dl>
				<dl class="col-xs-12 col-sm-6">
					<dt><label for="contact_email">{$LANG.common.email}</label></dt>
					<dd><input type="text" name="contact[email]" id="contact_email" class="form-control" value="{$MESSAGE.email}" placeholder="{$LANG.common.email} {$LANG.form.required}"></dd>
				</dl>
			</div>
			{if $CONTACT.phone}
				<dl>
					<dt><label for="contact_phone">{$LANG.address.phone}</label></dt>
					<dd><input type="text" name="contact[phone]" id="contact_phone" value="{$MESSAGE.phone}" class="form-control" placeholder="{$LANG.address.phone}{if $CONTACT.phone=='2'} {$LANG.form.required}{/if}"{if $CONTACT.phone=='2'} required="required"{/if}></dd>
				</dl>
			{/if}
			{if isset($DEPARTMENTS)}
				<dl>
					<dt><label for="contact_dept">{$LANG.common.department}</label></dt>
					<dd>
						<select name="contact[dept]" id="contact_dept" class="form-control">
							<option value="">{$LANG.form.please_select}</option>
							{foreach from=$DEPARTMENTS item=dept}
								<option value="{$dept.key}"{$dept.selected}>{$dept.name}</option>
							{/foreach}
						</select>
					</dd>
				</dl>
			{/if}
			<dl>
				<dt><label for="contact_subject">{$LANG.common.subject}</label></dt>
				<dd><input type="text" name="contact[subject]" id="contact_subject" class="form-control" value="{$MESSAGE.subject}" placeholder="{$LANG.common.subject} {$LANG.form.required}"></dd>
			</dl>
			<dl>
				<dt><label for="contact_enquiry">{$LANG.common.enquiry}</label></dt>
				<dd><textarea name="contact[enquiry]" id="contact_enquiry" class="form-control" rows="7" placeholder="{$LANG.common.enquiry} {$LANG.form.required}" required>{$MESSAGE.enquiry}</textarea></dd>
			</dl>
			
			{include file='templates/content.recaptcha.php'}
					
			<br>
					
			<dl class="text-center">
				<input type="submit" class="btn btn-success g-recaptcha" id="contact_submit" data-form-id="contact_form" value="{$LANG.documents.send_message}">
			</dl>
					
		</div>
	</div>
</form>


<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
<div class="hide" id="validate_field_required">{$LANG.form.field_required}</div>
<div class="hide" id="validate_phone">{$LANG.account.error_valid_phone}</div>