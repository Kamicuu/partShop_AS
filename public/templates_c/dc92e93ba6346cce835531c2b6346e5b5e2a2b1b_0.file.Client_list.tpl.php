<?php
/* Smarty version 3.1.33, created on 2022-06-09 09:01:11
  from 'D:\ROZNE\projekt_AS\app\views\templates\Client_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_62a1b6d7cda0f5_84735232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc92e93ba6346cce835531c2b6346e5b5e2a2b1b' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\templates\\Client_list.tpl',
      1 => 1654765266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a1b6d7cda0f5_84735232 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="client_table">
    <?php echo '<script'; ?>
>
        function goToPrevious() {
            document.getElementById("page-input").value = document.getElementById("page_prev").value;
            console.log(document.getElementById("page-input").value)
            ajaxPostForm('paging_form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/showPartClientList','client_table');
        }
        function goToNext() {
            document.getElementById("page-input").value = document.getElementById("page_next").value;
            console.log(document.getElementById("page-input").value)
            ajaxPostForm('paging_form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/showPartClientList','client_table');
        }
    <?php echo '</script'; ?>
>
    <form id="paging_form">
        <input type="hidden" name="page-input" id="page-input"/>
    </form>
    <input type="hidden" id="page_prev" value="<?php echo $_smarty_tpl->tpl_vars['pageNum']->value-1;?>
"/>
    <input type="hidden" id="page_next" value="<?php echo $_smarty_tpl->tpl_vars['pageNum']->value+1;?>
"/>
    <table class="table mt-3">
        <caption>Lista klientów</caption>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Imie</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">E mail</th>
            <th scope="col">Miasto</th>
            <th scope="col">Kod pocztowy</th>
            <th scope="col">Ulica</th>
            <th scope="col">Numer lokalu</th>
          </tr>
        </thead>
        <tbody style="border-top: thick">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clients']->value, 'client');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['client']->value) {
?>
        <tr>
            <th scope="row"><?php echo $_smarty_tpl->tpl_vars['client']->value['Id'];?>
</th>
            <td><?php echo $_smarty_tpl->tpl_vars['client']->value['Imie'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['client']->value['Nazwisko'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['client']->value['E_mail'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['client']->value['Miasto'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['client']->value['Kod_pocztowy'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['client']->value['Ulica'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['client']->value['Numer_lokalu'];?>
</td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <div class="col text-end pe-4">
        <button type="button" class="btn btn-link p-0" onclick="goToPrevious()">
            <?php if ($_smarty_tpl->tpl_vars['pageNum']->value > 0) {?>
            <?php echo $_smarty_tpl->tpl_vars['pageNum']->value-1;?>

            <?php }?>
        </button>
        <button type="button" class="btn btn-link p-0 disabled"><?php echo $_smarty_tpl->tpl_vars['pageNum']->value;?>
</button>
        <button type="button" class="btn btn-link p-0" onclick="goToNext()"><?php echo $_smarty_tpl->tpl_vars['pageNum']->value+1;?>
</button>
    </div>
</div>
<?php }
}
