<?php
/* Smarty version 3.1.33, created on 2022-01-22 14:55:48
  from 'D:\ROZNE\projekt_AS\app\views\templates\Dropdown_menu_guest.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61ec1af4a25974_97637260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a147328c562630f4b9a477000bd2eaddcfe10b89' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\templates\\Dropdown_menu_guest.tpl',
      1 => 1642863340,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ec1af4a25974_97637260 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/loginViev">Zaloguj</a></li>
    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/createAccount">Utwórz konto</a></li>
</ul>
<?php }
}
