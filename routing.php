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
#wyszukiwarka części
Utils::addRoute('partList', 'PartListCtrl');
#statyczne podstrony
Utils::addRoute('oNas', 'StaticSitesCtrl');
Utils::addRoute('kontakt', 'StaticSitesCtrl');
#edycja uzytkownika
Utils::addRoute('editProfile', 'ProfileCtrl', ['user', 'admin']);
Utils::addRoute('deleteProfile', 'ProfileCtrl', ['user', 'admin']);
#podglad zamowien
Utils::addRoute('showAllOrders', 'AdminElementListsCtrl', 'admin');
#koszyk
Utils::addRoute('showCart', 'CartCtrl', 'user');
Utils::addRoute('createOrder', 'CartCtrl', 'user');
#szczegóły części
Utils::addRoute('showPartDetails', 'PartDetails');
Utils::addRoute('showPartDetailsComments', 'PartDetails');
