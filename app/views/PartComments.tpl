<div class="w-75 mt-5">
    <div id="alert_box">
        {include file="`$smarty.current_dir`\\templates\Alert.tpl"}
    </div>
    <h4>Komentarze</h4>
    <hr>
    <div class="mt-4 mb-5">
        <span>Dodaj komentarz:</span>
        <form id="comment_form" onsubmit="ajaxPostForm('comment_form','{$conf->app_root}/showPartDetailsComments','comments'); return false">
            <input type="hidden" 
                   value="
                   {strip}
                    {if not empty($partId)}
                       {$partId}
                    {else}
                        {$comentForm->part_id}
                    {/if}
                    {/strip}" 
                   name="part_id">
            <div class="input-group input-group-sm mb-3 mt-2">
              <input type="text" class="form-control me-3" name="nick" placeholder="Nick" 
                value="{strip}{if  not empty($comentForm->nick)}
                            {$comentForm->nick}
                       {/if}"{/strip}>
              <span class="input-group-text">@</span>
              <input type="email" class="form-control" name="email" placeholder="Email" 
                value="{strip}{if  not empty($comentForm->email)}
                           {$comentForm->email}
                       {/if}"{/strip}>
            </div>
            <div class="input-group input-group-sm">
              <span class="input-group-text">Treść</span>
              <textarea class="form-control" name="comment_text">{strip}{$comentForm->comment_text}{/strip}</textarea>
            </div>
            <div class="d-flex justify-content-between align-items-center p-2">
                <div class="d-flex">
                    <span style="padding-top: 3px">
                        Odpowiedz na pytanie  
                        <b>
                        {if  not empty($comentForm->captcha_question)}
                            {$comentForm->captcha_question}
                        {/if}
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
        {if not empty($comments)}
            {foreach $comments as $comment}
                {include file="`$smarty.current_dir`\\templates\Part_comment.tpl" comment=$comment}
            {/foreach}
        {else}
        <i>Brak komentarzy.</i>
        {/if}
    </div>
</div>
