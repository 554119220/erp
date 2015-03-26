<?php
return array(
    'URL_MODEL'              => 2,
    'URL_HTML_SUFFIX'        => '',
    //'TMPL_TEMPLATE_SUFFIX' => '.htm',
    'URL_CASE_INSENSITIVE'   => true,
    'TMPL_ACTION_ERROR'      => 'Public:message',
    'TMPL_ACTION_SUCCESS'    => 'Public:message',
    'DEFAULT_TIMEZONE'       => 'PRC',
    'LOAD_EXT_CONFIG'        => 'db',
    'OUTPUT_ENCODE'          => false,
    'LANG_SWITCH_ON'         => true,
    'LANG_AUTO_DETECT'       => true,
	'DEFAULT_LANG'           => 'zh-cn', // 默认语言
    'LANG_LIST'              => 'zh-cn',
    'LANG_AUTO_DETECT'       => true,
    'VAR_LANGUAGE'           => '1',
    'COOKIE_PATH'            => __ROOT__,
    //'MULTI_MODULE'          =>  false,
    //'MODULE_ALLOW_LIST'      => array('Home'),
    //'DEFAULT_MODULE'         => 'Home', // 默认模块
    'TMPL_CACHE_ON' => false,

    'SESSION_OPTIONS'      => array('cookie_path'=>__ROOT__),
    'DEFAULT_AJAX_RETURN' => 'JSON',
    'DEFAULT_FILTER'      => 'strip_tags,stripslashes',  //输入过滤
    'DATA_CACHE_TYPE'       =>  'Memcache',    // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
    
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
