<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
 <meta charset="utf-8"/>
 <title>PartShop.pl - strona główna</title>
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
              <li><a href="{$conf->app_root}" class="nav-link px-2 link-secondary">Strona główna</a></li>
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
        <form id="selectionForm" action="{$conf->app_root}/main" method="get"></form>
        <form id="generateSearch" action="{$conf->app_root}/partList" method="get"></form>
        <div class="row justify-content-center" id="alert_box">
            {include file="`$smarty.current_dir`\\templates\Alert.tpl"}
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
                        {if $disableProducer}
                            disabled
                        {/if}>
                        <div class="mb-2 px-1 fw-light small_text">Wybierz markę pojazdu</div>
                        <div class="input-group mb-3">
                        <select class="form-select form-select-sm" size="5" form="selectionForm" name="producer-input">
                            {foreach $producers as $producer}
                                <option 
                                    {if not empty($selectedProducer) && $selectedProducer eq $producer} 
                                        selected
                                    {/if}    
                                    value="{$producer}">{$producer}</option>
                            {/foreach}
                        </select>
                        <button class="btn btn-outline-secondary" form="selectionForm" type="submit"
                            {if not empty($selectedProducer)} 
                                disabled
                            {/if}>-></button>
                        </div>
                    </fieldset>
                </div>
                <div class="col">
                    <fieldset  
                        {if $disableModel}
                            disabled
                        {/if}>
                        <div class="mb-2 px-1 fw-light small_text">Wybierz model pojazdu</div>
                        <div class="input-group mb-3">
                            <select class="form-select form-select-sm" size="5" form="selectionForm" name="model-input">
                                {foreach $models as $model}
                                    <option 
                                        {if not empty($selectedModel) && $selectedModel eq $model} 
                                            selected
                                        {/if}    
                                        value="{$model}">{$model}</option>
                                {/foreach}
                            </select>
                            {if $disableProducer}
                                <input type="hidden" value="{$selectedProducer}" form="selectionForm" name="producer-input"/>
                            {/if}
                            <button class="btn  btn-outline-secondary" form="selectionForm" type="submit"
                            {if not empty($selectedModel)} 
                                disabled
                            {/if}>-></button>
                        </div>
                    </fieldset>
                </div>
                <div class="col">
                    <fieldset  
                        {if $disableEngine}
                            disabled
                        {/if}>
                        <div class="mb-2 px-1 fw-light small_text">Wybierz wersję pojazdu</div>
                        <div class="input-group mb-3">
                        <select class="form-select form-select-sm" size="5" form="selectionForm" name="engine-input">
                            {foreach $engineVersions as $version}
                                <option 
                                    {if not empty($selectedEngineVersionId) && $selectedEngineVersionId eq $version['id']} 
                                        selected
                                    {/if}    
                                    value="{$version['id']}">{$version['engine']}</option>
                            {/foreach}
                        </select>
                        {if $disableModel}
                            <input type="hidden" value="{$selectedProducer}" form="selectionForm" name="producer-input"/>
                            <input type="hidden" value="{$selectedModel}" form="selectionForm" name="model-input"/>
                        {/if}
                        <button class="btn  btn-outline-secondary" form="selectionForm" type="submit"
                            {if not empty($selectedEngineVersionId)} 
                                disabled
                            {/if}>Zatwierdź</button>
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
                            {foreach $categories as $category}
                                <option    
                                    value="{$category['Id']}">{$category['Nazwa']}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col justify-content-center d-flex">
                        <fieldset>
                            {if $carSelectionComplete eq true}
                                <input type="hidden" value="{$selectedEngineVersionId}" form="generateSearch" name="carId-input"/> 
                            {/if}
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

