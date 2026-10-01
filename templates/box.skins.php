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

{if $SKINS}
	<a href="#" data-toggle="modal" data-target="#skinChanger" class="skinChangerTog"><i class="fas fa-palette"></i></a>
	
	<div class="modal fade" id="skinChanger" tabindex="-1" role="dialog" aria-labelledby="skinChangerLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
					<h4 class="modal-title">Change Skin:</h4>
				</div>
				<div class="modal-body clearfix">
					<form action="{$VAL_SELF}" method="post" class="autosubmit skin_selector" id="box-skin">
						<dl>
							<dd>
								<select name="select_skin" class="form-control auto_submit">
								{foreach from=$SKINS item=skin}
									{if isset($skin.styles)}
										{foreach from=$skin.styles item=style}
											<option value="{$skin.name}|{$style.directory}" {$style.selected}>{$skin.display} - {$style.name}</option>
										{/foreach}
									{else}
										<option value="{$skin.name}" {$skin.selected}>{$skin.display}</option>
									{/if}
								{/foreach}
								</select>
							</dd>
						</dl>
						<dl>
							<input type="submit" value="submit" class="hide">
						</dl>
					</form>
				</div>
			</div>
		</div>
	</div>
{/if}