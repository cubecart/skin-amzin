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

{if $SOCIAL_LINKS}
	 {include file='images/icon-sprites.svg'}
	<div class="social-links">
		{foreach from=$SOCIAL_LINKS item=link}
			<a href="{$link.url}" title="{$link.name}" target="_blank" rel="noopener noreferrer">
			<svg class="icon"><use xlink:href="#icon-{$link.icon}"></use></svg>
			</a>
		{/foreach}
	</div>
{/if}