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

{if $LANGUAGES}
	<div class="dropdown">
		<a href="#" class="parent-link dropdown-toggle" type="button" id="language_dropdown" title="{$current_language.title}" rel="nofollow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<img src="{$STORE_URL}/language/flags/{$current_language.code}.png" alt="{$current_language.title}">
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu dropdown-menu-left" aria-labelledby="language_dropdown">
			{foreach from=$LANGUAGES item=language}
				{if $current_language.code!==$language.code}
					<li>
						<a href="{$language.url}" title="{$language.title}" rel="nofollow"><img src="{$STORE_URL}/language/flags/{$language.code}.png" alt="{$language.title}"> {$language.title}</a>
					</li>
				{/if}
			{/foreach}
		</ul>
	</div>
{/if}