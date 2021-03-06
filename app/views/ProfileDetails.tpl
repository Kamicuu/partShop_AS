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
    .form_spans{
        height: 32px;
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
            <div class="row w-75">
                <div class="col">
                   <h4 class="mb-4">Dane profilu</h4>
                   <form method="post" id="profileData" action="{$conf->app_root}/editProfile">
                    <h6>Dane podstawowe:</h6>
                    <hr>
                    <div class="row mb-2">
                      <label for="email-input" class="form-label col">Adres e-mail</label>
                      <input type="email" class="form-control form-control-sm col" id="email-input" name="email-input" required value="{$clientData['E_mail']}"
                             {if empty($clientData)}
                                disabled
                            {/if} >
                    </div>
                    <div class="row mb-2">
                      <span class="col form_spans">Nazwa użytkownika</span>
                      <span class="col text-muted form_spans">{$userData['Login']}</span>
                    </div>
                    <div class="row mb-2">
                      <span class="col form_spans">Id użytkownika</span>
                      <span class="col text-muted form_spans">{$userData['Id']}</span>
                    </div>
                    <div class="row mb-2">
                      <label for="password-input" class="form-label col">Hasło</label>
                      <input type="password" class="form-control form-control-sm col" id="password-input" name="password-input">
                    </div>
                     <div class="row mb-2">
                      <label for="password-input" class="form-label col">Powtórz hasło</label>
                      <input type="password" class="form-control form-control-sm col" id="password-conf-input" name="password-conf-input">
                    </div>
                    <h6 class="mt-4">Dane do zamówienia:</h6>
                    <hr>
                    <fieldset
                        {if empty($clientData)}
                            disabled
                        {/if}
                        >
                        <div class="row mb-2">
                          <label for="imie-input" class="form-label col">Imię</label>
                          <input type="text" class="form-control form-control-sm col" id="imie-input" name="imie-input" required value="{$clientData['Imie']}">
                        </div>
                        <div class="row mb-2">
                          <label for="nazwisko-input" class="form-label col">Nazwisko</label>
                          <input type="text" class="form-control form-control-sm col" id="nazwisko-input" name="nazwisko-input" required value="{$clientData['Nazwisko']}">
                        </div>
                        <div class="row mb-2">
                          <label for="miasto-input" class="form-label col">Miasto</label>
                          <input type="text" class="form-control form-control-sm col" id="miasto-input" name="miasto-input" required value="{$clientData['Miasto']}">
                        </div>
                        <div class="row mb-2">
                          <label for="kod_pocztowy-input" class="form-label col">Kod pocztowy</label>
                          <input type="text" class="form-control form-control-sm col" id="kod_pocztowy-input" name="kod_pocztowy-input" required value="{$clientData['Kod_pocztowy']}">
                        </div>
                        <div class="row mb-2">
                          <label for="ulica-input" class="form-label col">Ulica</label>
                          <input type="text" class="form-control form-control-sm col" id="ulica-input" name="ulica-input" required value="{$clientData['Ulica']}">
                        </div>
                        <div class="row mb-2">
                          <label for="numer_lok-input" class="form-label col">Numer lokalu</label>
                          <input type="text" class="form-control form-control-sm col" id="numer_lok" name="numer_lok-input" required value="{$clientData['Numer_lokalu']}">
                        </div>
                    </fieldset>
                    </form>
                    <hr>
                    <div class="row mt-4">
                        <form method="post" id="removeProfile" action="{$conf->app_root}/deleteProfile">
                            <input type="hidden" value="{$userData['Id']}" name="id-input"/> 
                        </form>
                        <div class="col d-flex justify-content-start">
                            <button type="submit" form="removeProfile" class="btn btn-danger ">Usuń konto</button>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="submit" form="profileData" class="btn btn-primary ">Aktualizuj dane</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
 </body>

</html>


 