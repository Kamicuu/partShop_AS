<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('load'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions
//App::getRouter()->addRoute('createAccount', 'CreateAccountCtrl');

Utils::addRoute('load', 'MainPageCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('createAccount', 'CreateAccountCtrl');
Utils::addRoute('registerNewUser', 'CreateAccountCtrl');

//Utils::addRoute('action_name', 'controller_class_name');