<?php
/* Smarty version 3.1.33, created on 2022-01-27 20:09:09
  from 'D:\ROZNE\projekt_AS\app\views\templates\Part_card_element.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61f2fbe58e3563_68302116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9463cf27dd3483e232b8f42ea8d2ef9b12af33c' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\templates\\Part_card_element.tpl',
      1 => 1643314144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f2fbe58e3563_68302116 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\ROZNE\\projekt_AS\\lib\\smarty\\plugins\\function.math.php','function'=>'smarty_function_math',),));
?>
<li class="list-group-item li_element mb-4" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-2"><?php echo $_smarty_tpl->tpl_vars['part']->value['Producent'];?>
 <span class="text-muted"><?php echo $_smarty_tpl->tpl_vars['part']->value['Model'];?>
</span></h5>
    </div>
      <img src="<?php echo $_smarty_tpl->tpl_vars['part']->value['URL_zdjecia'];?>
" class="img-thumbnail rounded float-end size-200px" alt="Error while loading image">
    <p class="my-1"><?php echo $_smarty_tpl->tpl_vars['part']->value['Opis'];?>
</p>
    <table class="table table_spec my-3"  style="width:300px">
        <tbody>
            <tr>
                <td class="table_spec_cel">Kategoria: </td><td class="table_spec_cel"><?php echo $_smarty_tpl->tpl_vars['part']->value['Nazwa'];?>
</td>
            </tr>
            <tr>
                <td class="table_spec_cel">Jednostka miary: </td><td class="table_spec_cel"><?php echo $_smarty_tpl->tpl_vars['part']->value['Jednostka_miary'];?>
</td>
            </tr>
            <tr>
                <td class="table_spec_cel">Model: </td><td class="table_spec_cel"><?php echo $_smarty_tpl->tpl_vars['part']->value['Model'];?>
</td>
            </tr> 
            <tr>
                <td class="table_spec_cel">Kode OEM: </td><td class="table_spec_cel"><?php echo $_smarty_tpl->tpl_vars['part']->value['Kod_OEM'];?>
</td>
            </tr>
            <tr>
                <td class="table_spec_cel">Zamiennik: </td><td class="table_spec_cel">
                    <?php if ($_smarty_tpl->tpl_vars['part']->value['Zamiennik'] == 'Y') {?>
                        Tak
                        <?php } else { ?>
                        Nie
                    <?php }?>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row flex-column">
      <div class="col justify-content-end d-flex">
          <p class="fw-bold fs-5 me-4"><?php echo smarty_function_math(array('equation'=>$_smarty_tpl->tpl_vars['part']->value['Cena']/100,'format'=>"%.2f"),$_smarty_tpl);?>
 zł</p>
      </div>
      <div class="col justify-content-end d-flex">
          <form id="addToCartFrom<?php echo $_smarty_tpl->tpl_vars['part']->value['Id'];?>
" action="<?php echo $_smarty_tpl->tpl_vars['postUrlAddToCart']->value;?>
" method="post"></form>
            <span class="me-3" style="margin-top:3px">Ilosć sztuk: </span>
            <div class="me-3">
                <input form="addToCartFrom<?php echo $_smarty_tpl->tpl_vars['part']->value['Id'];?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['part']->value['Id'];?>
" name="partId-input">
                <input form="addToCartFrom<?php echo $_smarty_tpl->tpl_vars['part']->value['Id'];?>
" type="number" value="1" name="amount-input" class="form-control form-control-sm" style="width: 55px ">
            </div>
            <div>
              <button form="addToCartFrom<?php echo $_smarty_tpl->tpl_vars['part']->value['Id'];?>
" type="submit" class="btn btn-primary btn-sm me-4">Dodaj do koszyka</button>
            </div>
      </div>
    </div>
    <small>PartShop.pl</small>
</li>
<?php }
}
