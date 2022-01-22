{foreach $msgs->getMessages() as $msg}
    <div class="alert alert-dismissible fade show position-absolute mx-5 w-75 {if $msg->isInfo()}alert-success{/if}
               {if $msg->isWarning()}alert-warning{/if}
               {if $msg->isError()}alert-danger{/if}" 
               role="alert">
        {$msg->text}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
{/foreach}
