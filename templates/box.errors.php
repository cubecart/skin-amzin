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

{if isset($GUI_MESSAGE.error)}
	<div class="alert alert-danger" role="alert">
		{$LANG.gui_message.errors_detected}
		<ul class="list-unstyled">
			{foreach from=$GUI_MESSAGE.error item=error}
				<li>{$error}</li>
			{/foreach}
		</ul>
	</div>
{/if}

{if isset($GUI_MESSAGE.notice)}
	<div class="alert alert-success" role="alert">
		<ul class="list-unstyled">
			{foreach from=$GUI_MESSAGE.notice item=notice}
				<li>{$notice}</li>
			{/foreach}
		</ul>
	</div>
{/if}

{if isset($GUI_MESSAGE.info)}
	<div class="alert alert-info" role="alert">
		<ul class="list-unstyled">
			{foreach from=$GUI_MESSAGE.info item=info}
				<li>{$info}</li>
			{/foreach}
		</ul>
	</div>
{/if}

<noscript>
	<div class="alert alert-danger text-center" role="alert">
		{$LANG.catalogue.error_js_required}
	</div>
</noscript>