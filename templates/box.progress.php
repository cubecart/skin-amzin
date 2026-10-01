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

{if isset($BLOCKS)}
	<div class="row">
		<ul class="list-unstyled clearfix checkout-progress-wrapper" id="box-progress">
			{foreach from=$BLOCKS item=block}
				<li class="col-xs-4 text-center checkout-progress {$block.class}"><a href="{$block.url}"><span class="hidden-xs">{$block.step}.</span> {$block.title}</a></li>
			{/foreach}
		</ul>
	</div>
{/if}