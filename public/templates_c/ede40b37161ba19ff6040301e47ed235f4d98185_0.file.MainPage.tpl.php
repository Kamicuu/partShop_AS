<?php
/* Smarty version 3.1.33, created on 2022-04-24 13:46:52
  from 'D:\ROZNE\projekt_AS\app\views\MainPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_626554ccc43988_43681904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ede40b37161ba19ff6040301e47ed235f4d98185' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\MainPage.tpl',
      1 => 1650808007,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626554ccc43988_43681904 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>PartShop.pl - strona główna</title>
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
 </style>
 <?php echo '<script'; ?>
>
     
    window.onload = () =>{
         ackParamButtonChecker();
    }
    
    function ackParamButtonChecker(){
        
        let ackButton = document.getElementById("ack_find_params");
        let engines = document.getElementById("engine-input");
         
        if(engines.value===''){
            ackButton.disabled=true;
        }else{
            ackButton.disabled=false;
        }

    }
 <?php echo '</script'; ?>
>
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
" class="nav-link px-2 link-secondary">Strona główna</a></li>
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
        <form id="selectionForm" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/main" method="get"></form>
        <form id="generateSearch" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/partList" method="get"></form>
        <div class="row justify-content-center" id="alert_box">
            <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
        <section class="container p-5 flex-column d-flex">
            <div clas="row w-75">
                <div class="row">
                    <h4 class="mb-4">Wyszukaj części do swojego samochodu</h4>
                    <hr> 
                </div>
                <div class="row">
                <div class="col">
                    <fieldset 
                        <?php if ($_smarty_tpl->tpl_vars['disableProducer']->value) {?>
                            disabled
                        <?php }?>>
                        <div class="mb-2 px-1 fw-light small_text">Wybierz markę pojazdu</div>
                        <div class="input-group mb-3">
                        <select class="form-select form-select-sm" size="5" form="selectionForm" name="producer-input">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['producers']->value, 'producer');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producer']->value) {
?>
                                <option 
                                    <?php if (!empty($_smarty_tpl->tpl_vars['selectedProducer']->value) && $_smarty_tpl->tpl_vars['selectedProducer']->value == $_smarty_tpl->tpl_vars['producer']->value) {?> 
                                        selected
                                    <?php }?>    
                                    value="<?php echo $_smarty_tpl->tpl_vars['producer']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['producer']->value;?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                        <button class="btn btn-outline-secondary" form="selectionForm" type="submit"
                            <?php if (!empty($_smarty_tpl->tpl_vars['selectedProducer']->value)) {?> 
                                disabled
                            <?php }?>>-></button>
                        </div>
                    </fieldset>
                </div>
                <div class="col">
                    <fieldset  
                        <?php if ($_smarty_tpl->tpl_vars['disableModel']->value) {?>
                            disabled
                        <?php }?>>
                        <div class="mb-2 px-1 fw-light small_text">Wybierz model pojazdu</div>
                        <div class="input-group mb-3">
                            <select class="form-select form-select-sm" size="5" form="selectionForm" name="model-input">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['models']->value, 'model');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['model']->value) {
?>
                                    <option 
                                        <?php if (!empty($_smarty_tpl->tpl_vars['selectedModel']->value) && $_smarty_tpl->tpl_vars['selectedModel']->value == $_smarty_tpl->tpl_vars['model']->value) {?> 
                                            selected
                                        <?php }?>    
                                        value="<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['model']->value;?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <?php if ($_smarty_tpl->tpl_vars['disableProducer']->value) {?>
                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['selectedProducer']->value;?>
" form="selectionForm" name="producer-input"/>
                            <?php }?>
                            <button class="btn  btn-outline-secondary" form="selectionForm" type="submit"
                            <?php if (!empty($_smarty_tpl->tpl_vars['selectedModel']->value)) {?> 
                                disabled
                            <?php }?>>-></button>
                        </div>
                    </fieldset>
                </div>
                <div class="col">
                    <fieldset  
                        <?php if ($_smarty_tpl->tpl_vars['disableEngine']->value) {?>
                            disabled
                        <?php }?>>
                        <div class="mb-2 px-1 fw-light small_text">Wybierz wersję pojazdu</div>
                        <div class="input-group mb-3">
                        <select class="form-select form-select-sm" onchange="ackParamButtonChecker()" size="5" form="selectionForm" name="engine-input" id="engine-input">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['engineVersions']->value, 'version');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['version']->value) {
?>
                                <option 
                                    <?php if (!empty($_smarty_tpl->tpl_vars['selectedEngineVersionId']->value) && $_smarty_tpl->tpl_vars['selectedEngineVersionId']->value == $_smarty_tpl->tpl_vars['version']->value['id']) {?> 
                                        selected
                                    <?php }?>    
                                    value="<?php echo $_smarty_tpl->tpl_vars['version']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['version']->value['engine'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                        <?php if ($_smarty_tpl->tpl_vars['disableModel']->value) {?>
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['selectedProducer']->value;?>
" form="selectionForm" name="producer-input"/>
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['selectedModel']->value;?>
" form="selectionForm" name="model-input"/>
                        <?php }?>
                        <button id="ack_find_params" class="btn
                                <?php if (!empty($_smarty_tpl->tpl_vars['selectedEngineVersionId']->value)) {?>
                                    btn-success
                                <?php } else { ?>
                                    btn-outline-secondary 
                                <?php }?>" 
                                form="selectionForm" 
                                type="submit"
                            <?php if (!empty($_smarty_tpl->tpl_vars['selectedEngineVersionId']->value)) {?> 
                                disabled
                            <?php }?>>Zatwierdź</button>
                        </div>
                    </fieldset>
                </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                   <div class="mb-2 px-1 fw-light small_text">Wybierz kategorię części</div>
                </div>  
            </div>
            <div class="row">
                <div class="col justify-content-center d-flex">
                    <div class="w-100">
                        <select class="form-select form-select-sm" form="generateSearch" name="categoryId-input">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                                <option    
                                    value="<?php echo $_smarty_tpl->tpl_vars['category']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['Nazwa'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col justify-content-center d-flex">
                        <fieldset>
                            <?php if ($_smarty_tpl->tpl_vars['carSelectionComplete']->value == true) {?>
                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['selectedEngineVersionId']->value;?>
" form="generateSearch" name="carId-input"/> 
                            <?php }?>
                        </fieldset>
                        <button class="row btn btn-secondary w-50" form="generateSearch" type="submit">
                            Wyszukaj częsci do twojego pojazdu
                        </button> 
                    </div>
                </div>
            </div>
        </section> 
    </main>
 </body>

</html>

<?php }
}
