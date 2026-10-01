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
<what3words-autosuggest{if !empty($CONFIG.w3w_user_key)} api_key="{$CONFIG.w3w_user_key}"{/if} id="{$as_id}" initial_value="{$value}"></what3words-autosuggest>
{* The component renders its OWN input and does not adopt a slotted one, so the
   posted value lives in this hidden field and is written by the event below.
   A visible <input> here renders a second, empty box above the real one. *}
<input type="hidden" name="{$input_name}" id="{$input_id}" value="{$value}">
<script>
(function () {
   var as = document.getElementById('{$as_id}');
   var country = document.getElementById('{$country_id}');
   var field = document.getElementById('{$input_id}');
   if (!as) return;

   function clip() {
      if (!country) return;
      var opt = country.options[country.selectedIndex];
      var iso = opt ? opt.getAttribute('data-iso') : '';
      if (iso) as.setAttribute('clip_to_country', iso);
   }
   clip();
   if (country) country.addEventListener('change', clip);

   as.addEventListener('selected_suggestion', function (e) {
      var suggestion = e.detail && e.detail.suggestion;
      if (!field || !suggestion || !suggestion.words) return;
      // Core stores and renders the bare words; the /// is added by the templates.
      field.value = String(suggestion.words).replace(/^\/{3}/, '');
   });
})();
</script>
