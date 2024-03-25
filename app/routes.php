<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('Home/index' , 'Home,index');
$this->addRoute('User/register' , 'User,register');
$this->addRoute('User/login' , 'User,login');
$this->addRoute('User/logout' , 'User,logout');
$this->addRoute('User/update' , 'User,update');
$this->addRoute('User/delete' , 'User,delete');
$this->addRoute('User/securePlace' , 'Profile,index');
$this->addRoute('Profile/index' , 'Profile,index');
$this->addRoute('Profile/create' , 'Profile,create');
$this->addRoute('Profile/modify' , 'Profile,modify');
$this->addRoute('Profile/delete' , 'Profile,delete');
$this->addRoute('Publication/create' , 'Publication,create');
$this->addRoute('Publication/index' , 'Publication,index');
$this->addRoute('Publication/edit/{id}' , 'Publication,edit');
$this->addRoute('Publication/delete/{id}' , 'Publication,delete');
$this->addRoute('Publication/search', 'Publication,search');
$this->addRoute('Comment/add/{id}' , 'Comment,add');
$this->addRoute('Comment/edit/{id}' , 'Comment,edit');
$this->addRoute('Comment/delete/{id}' , 'Comment,delete');