{*
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2017. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 *}
 
{if $CONFIG.exit_modal}

	<div class="modal fade" id="newsletter_exit" tabindex="-1" role="dialog" aria-labelledby="newsletterExitLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
					<h4 class="modal-title">{$LANG.email.exit_title}</h4>
				</div>
				<div class="modal-body clearfix">
					<p>{$LANG.email.exit_copy}</p>
					
					<form action="{$VAL_SELF}" method="post" id="newsletter_exit_form">
						<div class="hide">{$LANG.newsletter.enter_email_signup}</div>
						
						<input name="subscribe" id="newsletter_email_exit" type="text" size="18" maxlength="250" class="form-control" title="{$LANG.newsletter.subscribe}" required placeholder="{$LANG.common.eg} joe@example.com"/>
						<br>
						<div class="text-center">
							<input type="submit" class="btn btn-success g-recaptcha" id="subscribe_button_exit" value="{$LANG.newsletter.subscribe}">
							<input type="hidden" name="force_unsubscribe" id="force_unsubscribe_exit" value="0">
						</div>
										
						<div class="hide" id="newsletter_recaptcha">
							{include file='templates/content.recaptcha.php' ga_fid="newsletter_exit"}
						</div>
					</form>
					<div class="hide" id="validate_email_exit">{$LANG.common.error_email_invalid}</div>
					<div class="hide" id="validate_already_subscribed_exit">{$LANG.newsletter.notify_already_subscribed} {$LANG.newsletter.continue_to_unsubscribe}</div>
					<div class="hide" id="validate_subscribe_exit">{$LANG.newsletter.subscribe}</div>
					<div class="hide" id="validate_unsubscribe_exit">{$LANG.newsletter.unsubscribe}</div>				
				</div>
			</div>
		</div>
	</div>

<script>
   function addEvent(obj, evt, fn) {
      if (obj.addEventListener) {
         obj.addEventListener(evt, fn, false);
      }
      else if (obj.attachEvent) {
         obj.attachEvent("on" + evt, fn);
      }
   }
   addEvent(window,"load",function(e) {
      addEvent(document, "mouseleave", function(e) {
         e = e ? e : window.event;
         var from = e.relatedTarget || e.toElement;
         if (!from || from.nodeName == "HTML") {
               if(!$.cookie('newsletter_exit')) {
                  $('#newsletter_exit').modal('show');
                  $.cookie('newsletter_exit', true, { expires: 30, path: '/' });
               }
         }
      });
   });
</script>
{/if}