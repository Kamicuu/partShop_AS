<?php
/* Smarty version 3.1.33, created on 2022-01-27 23:10:33
  from 'D:\ROZNE\projekt_AS\app\views\Cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61f32669300fe0_79947291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbb8c9f18a943294006b797112cc7a88bd8baec7' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\Cart.tpl',
      1 => 1643324961,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f32669300fe0_79947291 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\ROZNE\\projekt_AS\\lib\\smarty\\plugins\\function.math.php','function'=>'smarty_function_math',),));
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>PartShop.pl - koszyk</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"><?php echo '</script'; ?>
>
 <style>
    #alert_box{
        height: 30px;
    }
    .cart_table_cell{
        width: 300px;
    }
    .size_130px{
        width: 130px;
        min-width: 130px;
        height: 130px;
    }
 </style>
</head>

<body>
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
" class="nav-link px-2 link-dark">Strona główna</a></li>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/oNas" class="nav-link px-2 link-dark">O nas</a></li>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/kontakt" class="nav-link px-2 link-dark">Kontakt</a></li>
            </ul>

            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_smarty_tpl->tpl_vars['userSesion']->value->username;?>

              </a>
                <?php if ($_smarty_tpl->tpl_vars['userSesion']->value->role == 'guest') {?>
                    <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Dropdown_menu_guest.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php } elseif ($_smarty_tpl->tpl_vars['userSesion']->value->role == 'admin') {?>
                    <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Dropdown_menu_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php } elseif ($_smarty_tpl->tpl_vars['userSesion']->value->role == 'user') {?>
                    <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Dropdown_menu_user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php }?>
            </div>
            
          </div>
        </div>
    </header>
    <main>
        <div class="row justify-content-center" id="alert_box">
            <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
        <section class="container py-5">
            <div class="row w-100">
                <div class="row">
                    <h4 class="mb-4">Koszyk</h4>
                    <hr> 
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="list-group">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partObjArray']->value, 'part');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['part']->value) {
?>
                                <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Cart_element.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('part'=>$_smarty_tpl->tpl_vars['part']->value), 0, true);
?>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    </div>
                </div>
            </div> 
            <div class="row mt-4 justify-content-end">
                <form id="sendOrder" method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/createOrder"></form>
                <hr>
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                    <label class="input-group-text" for="kosztPrzesylki-input">Przesyłka</label>
                    <select form="sendOrder" class="form-select form-select-sm" id="typPrzesylki-input" name="kosztPrzesylki-input" required>
                        <option selected value="1500">Kurier DHL - 15.00 zł</option>
                        <option value="1800">Poczta Polska - 18.00 zł</option>
                    </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group input-group-sm mb-3">
                    <label class="input-group-text" for="typPlatnosci-input">Płatności</label>
                    <select form="sendOrder" class="form-select form-select-sm" id="kosztPrzeylki-input" name="typPlatnosci-input" required>
                        <option selected value="przelew">Przelew</option>
                        <option value="pobranie">Pobranie</option>
                    </select>
                    </div>
                </div>
                <div class="col d-flex justify-content-end">
                    <span class="me-5">Łącznie: </span>
                    <span class="me-5 fw-bold"><?php echo smarty_function_math(array('equation'=>$_smarty_tpl->tpl_vars['sumOfProducts']->value/100,'format'=>"%.2f"),$_smarty_tpl);?>
 zł</span>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button form="sendOrder" class="btn btn-success me-5" type="submit">Zamów</button>
                </div>
            </div>
        </section>
    </main>
 </body>

</html>


<?php }
}
