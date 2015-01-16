<?php
return array(
    'URL_MODEL'            => 1,
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
    'SALE'                => '1,9,13,27,28,29',
    'OFFLINE_SALE'        => '1,9,27,28,29',
    'ONLINE_SALE'         => 13,
    'ONLINE_STORE'        => '2,6,7,10,12,14,15,16,17,18,21,22,24,25,26',
    'MEMBER_SALE'         => '9,27,28',
    'ZHONGLAONIAN_SALE'   => '1,29',
    'TAOBAO_STORE'        => '21,22,26',
    'FINANCE'             => 8,
    //'URL_PATHINFO_FETCH' => 'ORIG_PATH_INFO,REDIRECT_URL',
);
