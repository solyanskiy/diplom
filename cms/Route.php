<?php
// Список Роутов.
$this -> router -> add('home', '/', 'HomeController:index');

// Категории
$this -> router -> add('category', '/category/(id:int)', 'CategoryController:renderCategory');

// Шаблон
$this -> router -> add('renderService', '/service/(id:int)', 'ServiceController:render');
$this -> router -> add('refactorService', '/refactor/(id:int)', 'ServiceController:refactor');

// Отзывы
$this -> router -> add('review', '/review', 'ReviewController:loadReviews');
$this -> router -> add('addreview', '/review/addreview', 'ReviewController:addNewReview', 'POST');

// Авторизация \ Регистрация
$this -> router -> add('loginCMS', "/cms/login/", 'CmsLoginController:render');
$this -> router -> add('auth-user', '/cms/auth/', 'CmsLoginController:auth', 'POST');
$this -> router -> add('registerUserForm', '/cms/register/', 'RegisterController:render');
$this -> router -> add('adduser', '/cms/adduser/', 'RegisterController:adduser', 'POST');
$this -> router -> add('logoutCMS', '/cms/logout/', 'CmsLoginController:logout');

//Рефакторинг
$this -> router -> add('setChanges', '/cms/download/(id:int)', 'ServiceController:setChanges', 'POST');

