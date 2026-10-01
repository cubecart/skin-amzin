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

{if {$DOCUMENT.hide_title==0}}
	<h2 class="content-title">{$DOCUMENT.doc_name}</h2>
{/if}

<div class="cleafix">
	{$DOCUMENT.doc_content}
</div>

{if $SHARE}
	<hr>
	<div>
		{foreach from=$SHARE item=html}
			{$html}
		{/foreach}
	</div>
{/if}

{foreach from=$COMMENTS item=html}
	{$html}
{/foreach}