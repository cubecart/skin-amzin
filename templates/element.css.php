<link href="//fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<link rel="stylesheet" href="{$ROOT_PATH}skins/{$SKIN_FOLDER}/js/vendor/swipebox/css/swipebox.min.css">
<link rel="stylesheet" href="{$ROOT_PATH}skins/{$SKIN_FOLDER}/js/vendor/lightslider/css/lightslider.css">

{assign var=css_input value=[   'skins/{$SKIN_FOLDER}/css/normalize.css',
                               
                                'skins/{$SKIN_FOLDER}/css/cubecart.css',
                                'skins/{$SKIN_FOLDER}/css/cubecart.common.css',
                                'skins/{$SKIN_FOLDER}/css/cubecart.helpers.css',
                                'skins/{$SKIN_FOLDER}/css/jquery.bxslider.css',
                                'skins/{$SKIN_FOLDER}/css/jquery.chosen.css',
								'skins/{$SKIN_FOLDER}/css/bootstrap/css/bootstrap.min.css',
								'skins/{$SKIN_FOLDER}/css/style.css'
								
								]}
{foreach from=$CSS key=css_keys item=css_files}
    {$css_input[] = $css_files}
{/foreach}

{combine input=$css_input output='cache/css.{$SKIN_FOLDER}.css' age='604800' debug=$CONFIG.debug||!$CONFIG.cache}

{if !empty($SKIN_SUBSET)}
	<link rel="stylesheet" href="{$ROOT_PATH}skins/{$SKIN_FOLDER}/css/cubecart.{$SKIN_SUBSET}.css">
{/if}