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

{if $CRUMBS}
	<div id="element-breadcrumbs" class="hidden-xs">
		<ol class="breadcrumb">
			<li>
				<a href="{$STORE_URL}">
					<i class="fas fa-home"></i> &nbsp;
					<span class="hidden-xs">{$LANG.common.home}</span>
				</a>
			</li>
			{foreach from=$CRUMBS item=crumb name=crumbposition}
				{assign var="position" value=$smarty.foreach.crumbposition.iteration+1}
				<li>
					<a href="{$crumb.url}">
						<span>{$crumb.title}</span>
					</a>
				</li>
			{/foreach}
		</ol>
	</div>
{/if}
