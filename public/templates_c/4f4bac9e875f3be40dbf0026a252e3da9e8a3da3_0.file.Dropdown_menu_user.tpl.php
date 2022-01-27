<?php
/* Smarty version 3.1.33, created on 2022-01-27 18:49:28
  from 'D:\ROZNE\projekt_AS\app\views\templates\Dropdown_menu_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61f2e9386902b7_59470495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f4bac9e875f3be40dbf0026a252e3da9e8a3da3' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\templates\\Dropdown_menu_user.tpl',
      1 => 1643309356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f2e9386902b7_59470495 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/showCart">Koszyk</a></li>
    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/editProfile">Dane profilu</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/doLogout">Wyloguj</a></li>
</ul>
<?php }
}
