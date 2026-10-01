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

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
		
		<div class="auth-tabs">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#login-panel" aria-controls="login-panel" role="tab" data-toggle="tab">{$LANG.account.login}</a>
				</li>
				<li role="presentation">
					<a href="{$URL.register}">{$LANG.account.register}</a>
				</li>
			</ul>
	
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="login-panel">
					<form action="{$VAL_SELF}" id="login_form" method="post">			
						{foreach from=$LOGIN_HTML item=html}
							{$html}
						{/foreach}
				
						<dl>
							<dt><label for="login-username">{$LANG.user.email_address}</label></dt>
							<dd><input type="text" autocomplete="off" name="username" id="login-username" class="form-control" placeholder="{$LANG.user.email_address} {$LANG.form.required}" value="{$USERNAME}" required></dd>
						</dl>
						<dl>
							<dt><label for="login-password">{$LANG.account.password}</label></dt>
							<dd><input type="password" autocomplete="off" name="password" id="login-password" class="form-control" placeholder="{$LANG.account.password} {$LANG.form.required}" required></dd>
						</dl>
						<dl class="clearfix">
							<span class="pull-right"><a href="{$URL.recover}">{$LANG.account.forgotten_password}</a></span>
							<span><input type="checkbox" name="remember" id="login-remember" value="1" {if $REMEMBER}checked{/if}><label for="login-remember"> {$LANG.account.remember_me}</label></span>
						</dl>
						<dl>
							<button name="submit" type="submit" class="btn btn-success btn-block">
								{$LANG.account.log_in}
							</button>
						</dl>
						<input type="hidden" name="redir" value="{$REDIRECT_TO}">
					</form>
				</div>
			</div>
		</div>
		
	</div>
</div>

<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
<div class="hide" id="empty_password">{$LANG.account.error_password_empty}</div>