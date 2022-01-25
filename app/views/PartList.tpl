<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>PartShop.pl - lista części</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
              <li><a href="{$conf->app_root}" class="nav-link px-2 link-dark">Strona główna</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">O nas</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">Kontakt</a></li>
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
        <form id="searchForm" action="{$conf->app_root}/partList" method="get"></form>
        <div class="row justify-content-center" id="alert_box">
            {include file="`$smarty.current_dir`\\templates\Alert.tpl"}
        </div>
        <section class="container p-5 flex-column d-flex">
            <div clas="row w-75">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-4">Lista części</h4>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3 input-group-sm">
                            <input type="search" value="{$filter}" name="search-input" form="searchForm" class="form-control" placeholder="Wyszukaj części po nazwie lub modelu">
                            <input type="hidden" value="{$carId}" form="searchForm" name="carId-input"/>  
                            <input type="hidden" value="{$categoryId}" form="searchForm" name="categoryId-input"/>
                            <button form="searchForm" class="btn btn-outline-secondary" type="submit" id="button-search">Szukaj</button>
                        </div>
                    </div>
                    <hr class="mb-1"> 
                        <div class="row mb-5">
                            <div class="col">
                                <small>
                                    Kategoria:
                                        <span class="fst-italic fw-light">{if not empty($categoryName)}
                                            {$categoryName}
                                            {else}
                                            n/a
                                        </span>{/if}
                                </small>
                            </div> 
                            <div class="col">
                                <small>
                                    Samochód: 
                                        <span class="fst-italic fw-light">{if not empty($carName)}
                                            {$carName['Producent']} {$carName['Model']} {$carName['Rok_produkcji']} / {$carName['Silnik']}
                                            {else}
                                            n/a
                                        </span>{/if}
                                </small>
                            </div>
                        </div>
                        <ul class="list-group">
                        {foreach $partObjects as $partObj}
                            {include file="`$smarty.current_dir`\\templates\Part_card_element.tpl" part=$partObj}
                        {/foreach}
                      </ul>
                </div>
            </div>
        </section> 
    </main>
 </body>

</html>


