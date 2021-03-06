<?php
/* Smarty version 3.1.33, created on 2022-05-20 20:51:22
  from 'D:\ROZNE\projekt_AS\app\views\ProfileDetails.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6287ff4ad25064_35085843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf0bb750731aa7b595778773776c4541e00116f2' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\ProfileDetails.tpl',
      1 => 1653079877,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6287ff4ad25064_35085843 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>PartShop.pl - profil</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"><?php echo '</script'; ?>
>
 <style>
    #alert_box{
        height: 30px;
    }
    .form_spans{
        height: 32px;
    }
 </style>
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
" class="nav-link px-2 link-dark">Strona g????wna</a></li>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/oNas" class="nav-link px-2 link-dark">O nas</a></li>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/kontakt" class="nav-link px-2 link-dark">Kontakt</a></li>
            </ul>

            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_smarty_tpl->tpl_vars['userSesion']->value->username;?>

              </a>
                <?php if ($_smarty_tpl->tpl_vars['userSesion']->value->role == 'guest') {?>
                    <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Dropdown_menu_guest.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php } elseif ($_smarty_tpl->tpl_vars['userSesion']->value->role == 'admin') {?>
                    <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Dropdown_menu_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php } elseif ($_smarty_tpl->tpl_vars['userSesion']->value->role == 'user') {?>
                    <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Dropdown_menu_user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php }?>
            </div>
            
          </div>
        </div>
    </header>
    <main>
        <div class="row justify-content-center" id="alert_box">
            <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
        <section class="container py-5 d-flex justify-content-center">
            <div class="row w-75">
                <div class="col">
                   <h4 class="mb-4">Dane profilu</h4>
                   <form method="post" id="profileData" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/editProfile">
                    <h6>Dane podstawowe:</h6>
                    <hr>
                    <div class="row mb-2">
                      <label for="email-input" class="form-label col">Adres e-mail</label>
                      <input type="email" class="form-control form-control-sm col" id="email-input" name="email-input" required value="<?php echo $_smarty_tpl->tpl_vars['clientData']->value['E_mail'];?>
"
                             <?php if (empty($_smarty_tpl->tpl_vars['clientData']->value)) {?>
                                disabled
                            <?php }?> >
                    </div>
                    <div class="row mb-2">
                      <span class="col form_spans">Nazwa u??ytkownika</span>
                      <span class="col text-muted form_spans"><?php echo $_smarty_tpl->tpl_vars['userData']->value['Login'];?>
</span>
                    </div>
                    <div class="row mb-2">
                      <span class="col form_spans">Id u??ytkownika</span>
                      <span class="col text-muted form_spans"><?php echo $_smarty_tpl->tpl_vars['userData']->value['Id'];?>
</span>
                    </div>
                    <div class="row mb-2">
                      <label for="password-input" class="form-label col">Has??o</label>
                      <input type="password" class="form-control form-control-sm col" id="password-input" name="password-input">
                    </div>
                     <div class="row mb-2">
                      <label for="password-input" class="form-label col">Powt??rz has??o</label>
                      <input type="password" class="form-control form-control-sm col" id="password-conf-input" name="password-conf-input">
                    </div>
                    <h6 class="mt-4">Dane do zam??wienia:</h6>
                    <hr>
                    <fieldset
                        <?php if (empty($_smarty_tpl->tpl_vars['clientData']->value)) {?>
                            disabled
                        <?php }?>
                        >
                        <div class="row mb-2">
                          <label for="imie-input" class="form-label col">Imi??</label>
                          <input type="text" class="form-control form-control-sm col" id="imie-input" name="imie-input" required value="<?php echo $_smarty_tpl->tpl_vars['clientData']->value['Imie'];?>
">
                        </div>
                        <div class="row mb-2">
                          <label for="nazwisko-input" class="form-label col">Nazwisko</label>
                          <input type="text" class="form-control form-control-sm col" id="nazwisko-input" name="nazwisko-input" required value="<?php echo $_smarty_tpl->tpl_vars['clientData']->value['Nazwisko'];?>
">
                        </div>
                        <div class="row mb-2">
                          <label for="miasto-input" class="form-label col">Miasto</label>
                          <input type="text" class="form-control form-control-sm col" id="miasto-input" name="miasto-input" required value="<?php echo $_smarty_tpl->tpl_vars['clientData']->value['Miasto'];?>
">
                        </div>
                        <div class="row mb-2">
                          <label for="kod_pocztowy-input" class="form-label col">Kod pocztowy</label>
                          <input type="text" class="form-control form-control-sm col" id="kod_pocztowy-input" name="kod_pocztowy-input" required value="<?php echo $_smarty_tpl->tpl_vars['clientData']->value['Kod_pocztowy'];?>
">
                        </div>
                        <div class="row mb-2">
                          <label for="ulica-input" class="form-label col">Ulica</label>
                          <input type="text" class="form-control form-control-sm col" id="ulica-input" name="ulica-input" required value="<?php echo $_smarty_tpl->tpl_vars['clientData']->value['Ulica'];?>
">
                        </div>
                        <div class="row mb-2">
                          <label for="numer_lok-input" class="form-label col">Numer lokalu</label>
                          <input type="text" class="form-control form-control-sm col" id="numer_lok" name="numer_lok-input" required value="<?php echo $_smarty_tpl->tpl_vars['clientData']->value['Numer_lokalu'];?>
">
                        </div>
                    </fieldset>
                    </form>
                    <hr>
                    <div class="row mt-4">
                        <form method="post" id="removeProfile" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/deleteProfile">
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['userData']->value['Id'];?>
" name="id-input"/> 
                        </form>
                        <div class="col d-flex justify-content-start">
                            <button type="submit" form="removeProfile" class="btn btn-danger ">Usu?? konto</button>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="submit" form="profileData" class="btn btn-primary ">Aktualizuj dane</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
 </body>

</html>


 <?php }
}
