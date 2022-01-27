<?php
/* Smarty version 3.1.33, created on 2022-01-27 17:01:49
  from 'D:\ROZNE\projekt_AS\app\views\AdminElementsLists.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61f2cffd323751_79245249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89882e447d263e0274dbd9cd60231ecbfaabfb49' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\AdminElementsLists.tpl',
      1 => 1643302906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f2cffd323751_79245249 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>PartShop.pl - admin</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"><?php echo '</script'; ?>
>
 <style>
    #alert_box{
        height: 30px;
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
" class="nav-link px-2 link-dark">Strona główna</a></li>
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
            <div class="row w-100">
                 <div class="row">
                    <h4 class="mb-4">Lista zamówień</h4>
                    <hr> 
                </row>
                <div class="col">
                  <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Order_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('orders'=>$_smarty_tpl->tpl_vars['orderData']->value), 0, true);
?>
                </div>
            </div>
        </section>
    </main>
 </body>

</html>



<?php }
}
