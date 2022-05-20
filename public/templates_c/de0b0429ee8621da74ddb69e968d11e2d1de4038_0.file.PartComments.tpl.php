<?php
/* Smarty version 3.1.33, created on 2022-05-20 20:08:14
  from 'D:\ROZNE\projekt_AS\app\views\PartComments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6287f52ed63251_45272150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de0b0429ee8621da74ddb69e968d11e2d1de4038' => 
    array (
      0 => 'D:\\ROZNE\\projekt_AS\\app\\views\\PartComments.tpl',
      1 => 1653077268,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6287f52ed63251_45272150 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="w-75 mt-5">
    <div id="alert_box">
        <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </div>
    <h4>Komentarze</h4>
    <hr>
    <div class="mt-4 mb-5">
        <span>Dodaj komentarz:</span>
        <form id="comment_form" onsubmit="ajaxPostForm('comment_form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/showPartDetailsComments','comments'); return false">
            <input type="hidden" 
                   value="
                   <?php if (!empty($_smarty_tpl->tpl_vars['partId']->value)) {
echo $_smarty_tpl->tpl_vars['partId']->value;
} else {
echo $_smarty_tpl->tpl_vars['comentForm']->value->part_id;
}?>" 
                   name="part_id">
            <div class="input-group input-group-sm mb-3 mt-2">
              <input type="text" class="form-control me-3" name="nick" placeholder="Nick" 
                value="<?php if (!empty($_smarty_tpl->tpl_vars['comentForm']->value->nick)) {
echo $_smarty_tpl->tpl_vars['comentForm']->value->nick;
}?>">
              <span class="input-group-text">@</span>
              <input type="email" class="form-control" name="email" placeholder="Email" 
                value="<?php if (!empty($_smarty_tpl->tpl_vars['comentForm']->value->email)) {
echo $_smarty_tpl->tpl_vars['comentForm']->value->email;
}?>">
            </div>
            <div class="input-group input-group-sm">
              <span class="input-group-text">Treść</span>
              <textarea class="form-control" name="comment_text"><?php echo $_smarty_tpl->tpl_vars['comentForm']->value->comment_text;?>
</textarea>
            </div>
            <div class="d-flex justify-content-between align-items-center p-2">
                <div class="d-flex">
                    <span style="padding-top: 3px">
                        Odpowiedz na pytanie  
                        <b>
                        <?php if (!empty($_smarty_tpl->tpl_vars['comentForm']->value->captcha_question)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['comentForm']->value->captcha_question;?>

                        <?php }?>
                        </b>
                        :
                    </span>
                    <div class="input-group input-group-sm ms-2" style="width: 70px">
                        <input type="number" name="captcha_resp" class="form-control me-3">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Wyślij</button>
            </div>
        </form>  
    </div>
    <span>Komentarze użytkowników:</span>
    <div class="mt-2">
        <?php if (!empty($_smarty_tpl->tpl_vars['comments']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
?>
                <?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."\\templates\Part_comment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('comment'=>$_smarty_tpl->tpl_vars['comment']->value), 0, true);
?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
        <i>Brak komentarzy.</i>
        <?php }?>
    </div>
</div>
<?php }
}
