<?php
/* Smarty version 3.1.33, created on 2022-01-22 16:43:41
  from 'D:\ROZNE\projekt_AS\app\views\templates\Dropdown_menu_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61ec343ddc3747_14149258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cabd10b69a1a33c4ac330954d61c37f84bdf4535' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\templates\\Dropdown_menu_admin.tpl',
      1 => 1642867643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ec343ddc3747_14149258 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
    <li><a class="dropdown-item" href="#">New project...</a></li>
    <li><a class="dropdown-item" href="#">Settings</a></li>
    <li><a class="dropdown-item" href="#">Profile</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/doLogout">Wyloguj</a></li>
</ul>
<?php }
}
