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
 
<div id="box-documents">
	<div class="panel">
		<div class="panel-heading"><i class="fas fa-file"></i> {$LANG.common.information}</div>
		<ul class="list-group">
			{foreach from=$DOCUMENTS item=document}
				<li class="list-group-item">
					<a href="{$document.doc_url}" title="{$document.doc_name}" {if $document.doc_url_openin}target="_blank"{/if}>
						{$document.doc_name}
					</a>
				</li>
			{/foreach}
			{foreach from=$DOCUMENTS_LIST_HOOKS item=list_item}
				<li class="list-group-item">
					<a href="{$list_item.href}" title="{$list_item.title}">{$list_item.title}</a>
				</li>
			{/foreach}
		</ul>
	</div>
</div>