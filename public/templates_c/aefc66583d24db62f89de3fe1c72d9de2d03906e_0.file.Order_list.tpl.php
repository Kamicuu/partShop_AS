<?php
/* Smarty version 3.1.33, created on 2022-01-27 18:43:43
  from 'D:\ROZNE\projekt_AS\app\views\templates\Order_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61f2e7dfd43709_33307985',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aefc66583d24db62f89de3fe1c72d9de2d03906e' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\templates\\Order_list.tpl',
      1 => 1643309021,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f2e7dfd43709_33307985 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\ROZNE\\projekt_AS\\lib\\smarty\\plugins\\function.math.php','function'=>'smarty_function_math',),));
?>
<table class="table mt-3">
    <caption>Lista zamówień</caption>
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Data</th>
        <th scope="col">Imię i nazwisko</th>
        <th scope="col">Wartość zamówienia</th>
        <th scope="col">Koszt przesyłki</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
      <tr class="table-active">
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
        <td><?php echo $_smarty_tpl->tpl_vars['order']->value->status;?>
</td>
      </tr>
      <tr>
        <td colspan="7">
            <table class="table ms-1 table-sm table-light">
                <thead>
                    <tr>
                      <th scope="col" style="font-weight: 500">Id</th>
                      <th scope="col" style="font-weight: 500">Nazwa</th>
                      <th scope="col" style="font-weight: 500">Koszt jed.</th>
                      <th scope="col" style="font-weight: 500">Jed. miary</th>
                      <th scope="col" style="font-weight: 500">Ilość</th>
                    </tr>
                </thead>
                <tbody style="border-top: thick">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value->czesci_zamowienia, 'part');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['part']->value) {
?>
                <tr>
                    <th scope="row"><?php echo $_smarty_tpl->tpl_vars['part']->value->id;?>
</th>
                    <td><?php echo $_smarty_tpl->tpl_vars['part']->value->nazwa;?>
</td>
                    <td><?php echo smarty_function_math(array('equation'=>$_smarty_tpl->tpl_vars['part']->value->cena/100,'format'=>"%.2f"),$_smarty_tpl);?>
 zł</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['part']->value->jednostka_miary;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['part']->value->ilosc;?>
</td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </td>
      </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php }
}
