<?php
/* Smarty version 3.1.33, created on 2022-05-20 20:16:56
  from 'D:\ROZNE\projekt_AS\app\views\templates\Part_comment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6287f738f0e3c5_13482831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86cb18163af0f8003685ead93f3c9046c577f6cf' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\templates\\Part_comment.tpl',
      1 => 1653077814,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6287f738f0e3c5_13482831 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card mt-3">
  <div class="card-header bg-gradient d-flex justify-content-between" style="background-color: #d3d3d36b">
      <h6 class="card-title"><?php echo $_smarty_tpl->tpl_vars['comment']->value['Nick'];?>
</h6>
      <span class="d-block" style="font-size: 0.8rem!important;"><?php echo $_smarty_tpl->tpl_vars['comment']->value['Data_dodania'];?>
</span>
  </div>
  <div class="card-body">
    <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['comment']->value['Tresc'];?>
</p>
  </div>
</div><?php }
}
