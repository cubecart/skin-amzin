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
	<div class="element-social">
		<div class="panel">
			<div class="panel-heading"><i class="fas fa-plus-square"></i> {$LANG.common.follow_us}</div>
			<ul class="list-group">
				{foreach from=$SOCIAL_LINKS item=link}
					<li class="list-group-item">
						<a href="{$link.url}" title="{$link.name}" target="_blank" rel="noopener noreferrer">
							<svg class="icon"><use xlink:href="#icon-{$link.icon}"></use></svg>
						</a>
					</li>
				{/foreach}
			</ul>
		</div>
	</div>
{/if}