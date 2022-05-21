<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>PartShop.pl - o nas</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <script src="https://www.google.com/recaptcha/api.js"></script>
 <style>
    #alert_box{
        height: 30px;
    }
    .form_container{
        display: flex;
        flex-wrap: wrap;
        margin-left: 17%;
        margin-right: 17%;
        background-color: #f7f7f9;
        min-width: 1000px;    
    }
    #kontakt_info{
        position:relative; 
        margin:auto; 
        width:380px;
        text-align: justify;
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
              <li><a href="{$conf->app_root}/kontakt" class="nav-link px-2 link-secondary">Kontakt</a></li>
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
            <div class="row w-75">
                <div class="h-100 p-5 border rounded-3 backgroud-light-opacity-50">
                        <h2 class="mb-4">Dane kontaktowe</h2>
                        <div class="d-flex justify-content-center">
                            <p class="small-font me-auto" style="min-width: 100px;">
                                PartShop sp. z o.o.
                                <br>
                                NIP 9999888877
                                <br>
                                REGON 666554433   
                            </p>

                            <p class="small-font">
                                <span><a href="mailto:kontakt@partshop.pl">kontakt@partshop.pl</a></span>
                                <br>
                                <span id="y">+48 111 222 333</span>
                            </p>
                        </div>
                        <p>Zapraszam do współpracy, wyślij zapytanie:</p>
                        <form id="contact_form" method="post" action="">
                            <div class="input-group input-group-sm flex-nowrap mt-2">
                                <span class="input-group-text" id="addon-wrapping">Temat</span>
                                <input type="text" class="form-control" placeholder="Temat zapytania" name="topic" value="{$formData->temat}">  
                            </div>
                            <div class="input-group input-group-sm mt-2">
                                <span class="input-group-text"style="min-width: 55.22px;" >Treść</span>
                                <textarea class="form-control" placeholder="Wprowadź treść zapytania" name="description">{$formData->wiadomosc}</textarea>
                            </div>
                            <div class="input-group input-group-sm flex-nowrap mt-2">
                                <span class="input-group-text" id="addon-wrapping" style="min-width: 55.22px;">@</span>
                                <input type="text" class="form-control" placeholder="Adres e-mail" name="e-mail" value="{$formData->email}">  
                            </div>
                            <div id="emailHelp" class="form-text">Nie udostępnimy nikomu twojego e-maila</div>
                            <div class="g-recaptcha mt-3" data-theme="light" data-sitekey="***REMOVED***"></div>
                            <button class="btn btn-outline-primary primary-color-bg-hover mt-1" type="submit" name="submit" id="form_send_bnt">Wyślij</button>
                        </form>                        
                    </div>
            </div>
        </section>
    </main>
 </body>

</html>



