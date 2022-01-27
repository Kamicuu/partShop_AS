<?php
/* Smarty version 3.1.33, created on 2022-01-27 22:04:52
  from 'D:\ROZNE\projekt_AS\app\views\templates\Cart_element.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61f31704cc8917_54754655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da9aa82994b2fa36c151e56a8e99ffdb24926478' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\templates\\Cart_element.tpl',
      1 => 1643321091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f31704cc8917_54754655 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\ROZNE\\projekt_AS\\lib\\smarty\\plugins\\function.math.php','function'=>'smarty_function_math',),));
?>
<li class="list-group-item d-flex justify-content-between align-items-center" style="min-width: 468px">
    <div class="d-flex w-100">
        <div class="flex-shrink-1">
            <img src="<?php echo $_smarty_tpl->tpl_vars['part']->value->url_zdjecia;?>
" class="img-thumbnail rounded float-end size_130px" alt="Error while loading image">
        </div>
        <div class="w-75 ps-5">
            <h6><?php echo $_smarty_tpl->tpl_vars['part']->value->nazwa;?>
</h6>
            <table class="table table-sm w-75">
                <tr>
                    <td class="cart_table_cell">Id</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['part']->value->id;?>
</td>
                </tr>
                <tr>
                    <td class="cart_table_cell">Cena jed.</td>
                    <td><?php echo smarty_function_math(array('equation'=>$_smarty_tpl->tpl_vars['part']->value->cena/100,'format'=>"%.2f"),$_smarty_tpl);?>
 zł</td>
                </tr>
                <tr>
                    <td class="cart_table_cell">Jednostka miary</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['part']->value->jednostka_miary;?>
</td>
                </tr>
            </table>
        </div>
        <div class="d-flex flex-fill align-items-start flex-column justify-content-between align-items-end">
            <div clas="row">
                <span class="me-2 fw-bold">szt. </span>
                <span class="badge bg-primary rounded-pill" style="margin-top: 3px"><?php echo $_smarty_tpl->tpl_vars['part']->value->ilosc;?>
</span>
            </div>
            <div class="row">
                <span class="me-2 fw-bold"><?php echo smarty_function_math(array('equation'=>($_smarty_tpl->tpl_vars['part']->value->cena*$_smarty_tpl->tpl_vars['part']->value->ilosc)/100,'format'=>"%.2f"),$_smarty_tpl);?>
 zł<span>
            </div>
            <div clas="row">
                <form method="post">
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['part']->value->id;?>
" name="partId-input">
                    <button type="submit" class="btn btn-danger mb-2">Usuń</button>
                </form>
            </div>
        </div>
    </div> 
</li>
<?php }
}
