{if isset($BRANCH.children)}
	<li class="dropdown-submenu">
		<a class="subcat-toggle" data-level="{$BRANCH.cat_level}" href="{$BRANCH.url}">
			{$BRANCH.name} <i class="fas fa-angle-right hidden-xs hidden-sm"></i><i class="fas fa-angle-down hidden-md hidden-lg"></i>
		</a>
		<ul class="dropdown-menu" data-level="{$BRANCH.cat_level}">
			{$BRANCH.children}
				{assign var="allLevel" value=$BRANCH.cat_level+1}
			<li><a href="{$BRANCH.url}" data-level="{$allLevel}" class="subcat-main">{$LANG.common.view_all} {$BRANCH.name}</a></li>
		</ul>
	</li>
{else}
	<li>
		<a href="{$BRANCH.url}" data-level="{$BRANCH.cat_level}" title="{$BRANCH.name}">{$BRANCH.name}</a>
	</li>
{/if}