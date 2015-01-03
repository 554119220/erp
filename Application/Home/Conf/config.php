<?php
return array(
    'URL_MODEL'            => 0,
    //'TMPL_TEMPLATE_SUFFIX' => '.htm',

    'URL_CASE_INSENSITIVE' => true,
    'TMPL_ACTION_ERROR'    => 'Public:message',
    'TMPL_ACTION_SUCCESS'  => 'Public:message',
    'DEFAULT_TIMEZONE'     => 'PRC',
    'LOAD_EXT_CONFIG'      => 'db',
    'OUTPUT_ENCODE'        => false,
    'LANG_AUTO_DETECT'     => true,
	'DEFAULT_LANG'         => 'zh-cn', // 默认语言
    'VAR_LANGUAGE'         => '1',
    'COOKIE_PATH'          => __ROOT__,
    'SESSION_OPTIONS'      => array('cookie_path'=>__ROOT__),
    'MODULE_ALLOW_LIST'    => array('Home','Admin','User'),
    'DEFAULT_AJAX_RETURN' => 'JSON',
    'DEFAULT_FILTER'      => 'strip_tags,stripslashes',  //输入过滤
    'LANG_SWITCH_ON'      => true,
    'LANG_AUTO_DETECT'    => true,
	'DEFAULT_LANG'        => 'zh-cn', // 默认语言
    'LANG_LIST'           => 'zh-cn',
);
