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

{if !$DISABLE_BOX_NEWSLETTER}
	<div id="box-newsletter">
		<div class="panel">
			<div class="panel-heading"><i class="fas fa-envelope"></i> {$LANG.newsletter.mailing_list}</div>
			<div class="panel-body">

				{if $IS_USER}
					{if ($CTRL_SUBSCRIBED)}
						<p class="text-center">{$LANG.newsletter.customer_is_subscribed}</p>
						<div class="text-center"><a href="{$STORE_URL}/index.php?_a=newsletter&action=unsubscribe" class="btn btn-danger btn-sm">{$LANG.newsletter.click_to_unsubscribe}</a></div>
					{else}
						<p class="text-center">{$LANG.newsletter.customer_not_subscribed}</p>
						<div class="text-center"><a href="{$STORE_URL}/index.php?_a=newsletter&action=subscribe" class="btn btn-success btn-sm">{$LANG.newsletter.click_to_subscribe}</a></div>
					{/if}
				{else}
				<form action="{$VAL_SELF}" method="post" id="newsletter_form_box">
					<div>{$LANG.newsletter.enter_email_signup}</div>
					<br>
					<p>
						<input name="subscribe" id="newsletter_email" class="form-control" type="text" maxlength="250" title="{$LANG.newsletter.subscribe}" placeholder="{$LANG.common.eg} joe@example.com"/>
					</p>
					<div id="newsletter_recaptcha" style="margin-bottom:5px;">
						{include file='templates/content.recaptcha.php' ga_fid="Newsletter"}
					</div>
					<br>
					<input type="submit" class="btn btn-default btn-block postfix g-recaptcha" id="subscribe_button" value="{$LANG.newsletter.subscribe}">
					<input type="hidden" name="force_unsubscribe" id="force_unsubscribe" value="0">
					
				</form>
				<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
				<div class="hide" id="validate_already_subscribed">{$LANG.newsletter.notify_already_subscribed} {$LANG.newsletter.continue_to_unsubscribe}</div>
				<div class="hide" id="validate_subscribe">{$LANG.newsletter.subscribe}</div>
				<div class="hide" id="validate_unsubscribe">{$LANG.newsletter.unsubscribe}</div>
				{/if}

			</div>
		</div>
	</div>
{/if}