<?php
/* Smarty version 3.1.33, created on 2022-05-21 00:00:15
  from 'D:\ROZNE\projekt_AS\app\views\templates\Order_list_header_order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_62882b8f6e5775_06003792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0279817c3674460cd89ad75797198ada46f6f6ad' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\templates\\Order_list_header_order.tpl',
      1 => 1653091212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62882b8f6e5775_06003792 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\ROZNE\\projekt_AS\\lib\\smarty\\plugins\\function.math.php','function'=>'smarty_function_math',),));
?>
<form id="change_status_form-<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" onsubmit="return false;" method="post"></form>
<form id="archivize_form-<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" onsubmit="return false;" method="post"></form>
<tr class="table-active" id="order-<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
    <th scope="row"><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</th>
    <td><?php echo $_smarty_tpl->tpl_vars['order']->value->data;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['order']->value->nazwa_zamawiajacego;?>
</td>
    <td><?php echo smarty_function_math(array('equation'=>$_smarty_tpl->tpl_vars['order']->value->wartosc_zamowienia/100,'format'=>"%.2f"),$_smarty_tpl);?>
 zł</td>
    <td><?php echo smarty_function_math(array('equation'=>$_smarty_tpl->tpl_vars['order']->value->koszt_przesylki/100,'format'=>"%.2f"),$_smarty_tpl);?>
 zł</td>
    <td>
        <input type="hidden" form="change_status_form-<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" name="orderId" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
        <input type="hidden" form="archivize_form-<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" name="orderId" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
        <select form="change_status_form-<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" name="status" class="form-select form-select-sm" 
            onchange="ajaxPostForm('change_status_form-<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
','<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/changeOrderStatus','order-<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
')"
            >
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderStatuses']->value, 'status');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
?>
            <option 
            <?php if ($_smarty_tpl->tpl_vars['status']->value == $_smarty_tpl->tpl_vars['order']->value->status) {?>
                selected
            <?php }?>
            ><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['order']->value->status == 'wysłane' || $_smarty_tpl->tpl_vars['order']->value->status == 'anulowane') {?>
            <button class="btn btn-warning btn-sm" onclick="ajaxPostFormWithConfirmation('archivize_form-<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
','<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/archivizeOrder','order_table');">Archiwizuj</button>
        <?php } else { ?>
            <button class="btn btn-sm disabled btn-secondary">Archiwizuj</button>
        <?php }?>
    </td> 
</tr>
<?php }
}
