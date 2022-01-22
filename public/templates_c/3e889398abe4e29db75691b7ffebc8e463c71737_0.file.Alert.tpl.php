<?php
/* Smarty version 3.1.33, created on 2022-01-22 15:12:21
  from 'D:\ROZNE\projekt_AS\app\views\templates\Alert.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61ec1ed5da7a04_78826650',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e889398abe4e29db75691b7ffebc8e463c71737' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\templates\\Alert.tpl',
      1 => 1642864339,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ec1ed5da7a04_78826650 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
    <div class="alert alert-dismissible fade show position-absolute mx-5 w-75 <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-success<?php }?>
               <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
               <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>" 
               role="alert">
        <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
