<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>PartShop.pl - profil</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <style>
    #alert_box{
        height: 30px;
    }
    .display_modal{
        position: relative;
        display: block;        
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
              <li><a href="{$conf->app_root}" class="nav-link px-2 link-dark">Strona główna</a></li>
              <li><a href="{$conf->app_root}/oNas" class="nav-link px-2 link-dark">O nas</a></li>
              <li><a href="{$conf->app_root}/kontakt" class="nav-link px-2 link-dark">Kontakt</a></li>
            </ul>

            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                {$userSesion->username}
              </a>
                {if $userSesion->role eq 'guest'}
                    {include file="`$smarty.current_dir`\\templates\Dropdown_menu_guest.tpl"}
                {elseif $userSesion->role eq 'admin'}
                    {include file="`$smarty.current_dir`\\templates\Dropdown_menu_admin.tpl"}
                {elseif $userSesion->role eq 'user'}
                    {include file="`$smarty.current_dir`\\templates\Dropdown_menu_user.tpl"}
                {/if}
            </div>
            
          </div>
        </div>
    </header>
    <main>
        <div class="row justify-content-center" id="alert_box">
            {include file="`$smarty.current_dir`\\templates\Alert.tpl"}
        </div>
        <section class="container py-5 d-flex justify-content-center">
            <form id="deleteUserTrue" action="{$conf->app_root}/deleteProfile" method="post">
                <input type="hidden" value="true" name="ack-input"/>
                <input type="hidden" value="{$userId}" name="id-input"/>
            </form>
            <form id="deleteUserFalse" action="{$conf->app_root}/deleteProfile" method="post">
                <input type="hidden" value="false" name="ack-input"/>
                <input type="hidden" value="{$userId}" name="id-input"/>
            </form>
            <div class="row w-75">
                <div class="col">
                 <div class="modal display_modal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Usuwanie konta</h5>
                        </div>
                        <div class="modal-body">
                            <p>Czy na pewno chcesz usunąć konto <span class="fw-bold">{$userName}</span>?<br>Proces jest nieodwracalny.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" form="deleteUserFalse" class="btn btn-secondary">Nie</button>
                          <button type="submit" form="deleteUserTrue" class="btn btn-primary">Tak</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
    </main>
 </body>

</html>


 
