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

{if isset($CTRL_VIEW) && $CTRL_VIEW}

	<h2 class="content-title">{$NEWSLETTER.subject}</h2>
	<div class="text-right text-muted">{$NEWSLETTER.date_sent} </div>
	<hr>
	<div class="clearfix">{$NEWSLETTER.content_html}</div>

{else}

	<h2 class="content-title">{$LANG.newsletter.subscription}</h2>
	
	{if $IS_USER}
		
		{if $SUBSCRIBED}
			<div class="alert alert-success text-center">
				<p>{$LANG.newsletter.customer_is_subscribed}</p>
				<br>
				<a href="{$URL.unsubscribe}" class="btn btn-sm btn-danger">{$LANG.newsletter.unsubscribe}</a>
			</div>
		{else}
			<div class="alert alert-danger text-center">
				<p>{$LANG.newsletter.customer_not_subscribed}</p>
				<br>
				<a href="{$URL.subscribe}" class="btn btn-sm btn-success">{$LANG.newsletter.subscribe_now}</a>
			</div>
		{/if}

	{else}
	
		<div class="panel panel-default">
			<div class="panel-heading">
				{$LANG.newsletter.enter_email_subscribe_unsubscribe}
			</div>
			<div class="panel-body">
				<form action="{$VAL_SELF}" method="post" id="{$FORM_ID}">
				<dl>
					<dt><label for="newsletter_email">{$LANG.common.email}</label></dt>
					<dd><input type="text" name="{$SUBSCRIBE_MODE}" class="form-control required" id="newsletter_email" placeholder="{$LANG.common.email} {$LANG.form.required}"></dd>
				</dl>
				<dl class="text-right">
					<input name="submit" class="btn btn-success" type="submit" value="{$LANG.form.submit}">
				</dl>
				</form>
				<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
				<div class="hide" id="validate_already_subscribed">{$LANG.newsletter.notify_already_subscribed}</div>
			</div>
		</div>
	
	{/if}
	
	<div class="newsletter-list">
		<h2 class="content-title">{$LANG.newsletter.newsletters}</h2>
		{if isset($NEWSLETTERS)}
			<p class="text-muted text-center">{$LANG.newsletter.view_newsletter_archive}</p>
			<ul class="list-group">
				{foreach from=$NEWSLETTERS item=newsletter}
					<li class="list-group-item">
						<div class="clearfix"><span class="badge hidden-xs pull-right" style="font-size:12px;"><i class="fas fa-calendar"></i> {$newsletter.date_sent}</span><a href="{$newsletter.view}">{$newsletter.subject}</a> <span class="hidden-sm hidden-md hidden-lg text-muted" style="font-size:12px;"><br><i class="fas fa-calendar"></i> {$newsletter.date_sent}</span></div>
					</li>
				{/foreach}
			</ul>
		{else}
			<div class="alert alert-info text-center">{$LANG.newsletter.no_archived_newsletters}</div>
		{/if}
	</div>
	
{/if}