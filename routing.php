<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('main'); #default action
App::getRouter()->setLoginRoute('loginViev'); #action to forward if no permissions

#strona głóna
Utils::addRoute('main', 'MainPageCtrl');
Utils::addRoute('models', 'MainPageCtrl');
#logowanie
Utils::addRoute('loginViev', 'LoginCtrl');
Utils::addRoute('doLogin', 'LoginCtrl');
Utils::addRoute('doLogout', 'LoginCtrl');
#tworzenie konta
Utils::addRoute('createAccount', 'CreateAccountCtrl');
Utils::addRoute('registerNewUser', 'CreateAccountCtrl');
