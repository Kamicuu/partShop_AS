<?php
/* Smarty version 3.1.33, created on 2022-01-25 19:58:35
  from 'D:\ROZNE\projekt_AS\app\views\PartList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_61f0566bbcba83_37467023',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1389b0498ea02861e5f876b87e1a72fdc364dc10' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\PartList.tpl',
      1 => 1643140714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f0566bbcba83_37467023 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>PartShop.pl - lista części</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"><?php echo '</script'; ?>
>
 <style>
    #alert_box{
        height: 30px;
    }
    .small_text{
        font-size: .92rem;
    }
    .next_button{
        max-width: 70px;
    }
    .li_element{
        border-top: 1px solid rgba(0,0,0,.125)!important;
        min-width: 350px;
    }
    .table_spec{
        
    }
    .table_spec_cel{
        width: 200px;
        padding: 0.3rem!important;
    }
    .size-200px{
        width: 200px;
        height: 200px;
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
              <li><a href="#" class="nav-link px-2 link-dark">O nas</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">Kontakt</a></li>
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
        <form id="searchForm" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/partList" method="get"></form>
        <div class="row justify-content-center" id="alert_box">
            <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
        <section class="container p-5 flex-column d-flex">
            <div clas="row w-75">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-4">Lista części</h4>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3 input-group-sm">
                            <input type="search" value="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
" name="search-input" form="searchForm" class="form-control" placeholder="Wyszukaj części po nazwie">
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
" form="searchForm" name="carId-input"/>  
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['categoryId']->value;?>
" form="searchForm" name="categoryId-input"/>
                            <button form="searchForm" class="btn btn-outline-secondary" type="submit" id="button-search">Szukaj</button>
                        </div>
                    </div>
                    <hr class="mb-1"> 
                        <div class="row mb-5">
                            <div class="col">
                                <small>
                                    Kategoria:
                                        <span class="fst-italic fw-light"><?php if (!empty($_smarty_tpl->tpl_vars['categoryName']->value)) {?>
                                            <?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>

                                            <?php } else { ?>
                                            n/a
                                        </span><?php }?>
                                </small>
                            </div> 
                            <div class="col">
                                <small>
                                    Samochód: 
                                        <span class="fst-italic fw-light"><?php if (!empty($_smarty_tpl->tpl_vars['carName']->value)) {?>
                                            <?php echo $_smarty_tpl->tpl_vars['carName']->value['Producent'];?>
 <?php echo $_smarty_tpl->tpl_vars['carName']->value['Model'];?>
 <?php echo $_smarty_tpl->tpl_vars['carName']->value['Rok_produkcji'];?>
 / <?php echo $_smarty_tpl->tpl_vars['carName']->value['Silnik'];?>

                                            <?php } else { ?>
                                            n/a
                                        </span><?php }?>
                                </small>
                            </div>
                        </div>
                        <ul class="list-group">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partObjects']->value, 'partObj');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['partObj']->value) {
?>
                            <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Part_card_element.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('part'=>$_smarty_tpl->tpl_vars['partObj']->value), 0, true);
?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                      </ul>
                </div>
            </div>
        </section> 
    </main>
 </body>

</html>


<?php }
}
