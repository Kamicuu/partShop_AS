<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('main'); #default action
App::getRouter()->setLoginRoute('loginViev'); #action to forward if no permissions

Utils::addRoute('main', 'MainPageCtrl');
Utils::addRoute('loginViev', 'LoginCtrl');
Utils::addRoute('doLogin', 'LoginCtrl');
Utils::addRoute('doLogout', 'LoginCtrl');
Utils::addRoute('createAccount', 'CreateAccountCtrl');
Utils::addRoute('registerNewUser', 'CreateAccountCtrl');
