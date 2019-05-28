<?php
	ob_start();
	session_start();
	header("Cache-Control:public");
	error_reporting(0);
	require('route.class.php');

	route::get('asd','SiteController@index');
	route::get('all_news','SiteController@all_news');
    route::get('all_category','SiteController@all_category');
    route::get('firma/{id}','SiteController@firma_detail');
    route::get('get_username/{id}','SiteController@get_uname');
    route::get('get_catname/{id}','SiteController@get_catname');
    route::get('firma_cat/{id}', 'SiteController@firma_cat'); // firmalari cat gore ceker
    route::get('register','SiteController@register'); // kayit ol, email, password, username localhost/api/register?email=asd&password=asdsa&name=123
    route::get('change_pw','SiteController@change_pw'); // sirayla email, password, username   localhost/api/change_pw?email=asd&password=asdsa&name=123
    route::get('login','SiteController@login');
	route::error();

?>