<?php
/* Smarty version 3.1.33, created on 2022-01-22 10:41:31
  from 'D:\ROZNE\projekt_AS\app\views\RegisterPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61ebdf5b22db39_26369470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1815d48b04233fdc4fd94e2d5fa9763951c64b1' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\RegisterPage.tpl',
      1 => 1642848084,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ebdf5b22db39_26369470 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>Nowa akcja | Amelia framework</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"><?php echo '</script'; ?>
>
</head>

<body>
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
" class="nav-link px-2 link-dark">Strona główna</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">O nas</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">Kontakt</a></li>
            </ul>

            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>

              </a>
                <?php if ($_smarty_tpl->tpl_vars['user']->value->role == 'guest') {?>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item" href="#">Zaloguj</a></li>
                    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/createAccount">Utwórz konto</a></li>
                </ul>
                <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->role == 'admin') {?>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
                <?php }?>

            </div>
          </div>
        </div>
    </header>
    <main>
        <section class="container py-5 d-flex justify-content-center">
            <div class="row w-75">
                <div class="col">
                   <h4 class="mb-4">Formularz rejestracji</h4>
                   <form method="post" action="./registerNewUser">
                    <h6>Dane podstawowe:</h6>
                    <hr>
                    <div class="row mb-2">
                      <label for="email-input" class="form-label col">Adres e-mail</label>
                      <input type="email" class="form-control form-control-sm col" id="email-input" name="email-input">
                    </div>
                    <div class="row mb-2">
                      <label for="username-input" class="form-label col">Nazwa użytkownika</label>
                      <input type="text" class="form-control form-control-sm col" id="username-input" name="username-input">
                    </div>
                    <div class="row mb-2">
                      <label for="password-input" class="form-label col">Hasło</label>
                      <input type="password" class="form-control form-control-sm col" id="password-input" name="password-input">
                    </div>
                    <h6 class="mt-4">Dane do zamówienia:</h6>
                    <hr>
                    <div class="row mb-2">
                      <label for="imie-input" class="form-label col">Imię</label>
                      <input type="text" class="form-control form-control-sm col" id="imie-input" name="imie-input">
                    </div>
                    <div class="row mb-2">
                      <label for="nazwisko-input" class="form-label col">Nazwisko</label>
                      <input type="text" class="form-control form-control-sm col" id="nazwisko-input" name="nazwisko-input">
                    </div>
                    <div class="row mb-2">
                      <label for="miasto-input" class="form-label col">Miasto</label>
                      <input type="text" class="form-control form-control-sm col" id="miasto-input" name="miasto-input">
                    </div>
                    <div class="row mb-2">
                      <label for="kod_pocztowy-input" class="form-label col">Kod pocztowy</label>
                      <input type="text" class="form-control form-control-sm col" id="kod_pocztowy-input" name="kod_pocztowy-input">
                    </div>
                    <div class="row mb-2">
                      <label for="ulica-input" class="form-label col">Ulica</label>
                      <input type="text" class="form-control form-control-sm col" id="ulica-input" name="ulica-input">
                    </div>
                    <div class="row mb-2">
                      <label for="numer_lok-input" class="form-label col">Numer lokalu</label>
                      <input type="text" class="form-control form-control-sm col" id="numer_lok" name="numer_lok-input">
                    </div>
                    <div class="row mt-4">
                        <div class="col"></div>
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary ">Wyślij</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
            <p><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</p>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </section>
    </main>
 </body>

</html>

<?php }
}
