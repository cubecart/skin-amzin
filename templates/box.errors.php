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