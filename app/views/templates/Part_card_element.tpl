<li class="list-group-item li_element mb-4" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
        <a style="text-decoration:none" href="{$conf->app_root}/showPartDetails?partId={$part['Id']}"><h5 class="mb-2">{$part['Producent']} <span class="text-muted">{$part['Model']}</span></h5></a>
    </div>
      <img src="{$part['URL_zdjecia']}" class="img-thumbnail rounded float-end size-200px" alt="Error while loading image">
    <p class="my-1">{$part['Opis']}</p>
    <table class="table table_spec my-3"  style="width:300px">
        <tbody>
            <tr>
                <td class="table_spec_cel">Kategoria: </td><td class="table_spec_cel">{$part['Nazwa']}</td>
            </tr>
            <tr>
                <td class="table_spec_cel">Jednostka miary: </td><td class="table_spec_cel">{$part['Jednostka_miary']}</td>
            </tr>
            <tr>
                <td class="table_spec_cel">Model: </td><td class="table_spec_cel">{$part['Model']}</td>
            </tr> 
            <tr>
                <td class="table_spec_cel">Kode OEM: </td><td class="table_spec_cel">{$part['Kod_OEM']}</td>
            </tr>
            <tr>
                <td class="table_spec_cel">Zamiennik: </td><td class="table_spec_cel">
                    {if $part['Zamiennik'] eq 'Y'}
                        Tak
                        {else}
                        Nie
                    {/if}
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row flex-column">
      <div class="col justify-content-end d-flex">
          <p class="fw-bold fs-5 me-4">{math equation=$part['Cena']/100 format="%.2f"} zł</p>
      </div>
      <div class="col justify-content-end d-flex">
          <form id="addToCartFrom{$part['Id']}" action="{$postUrlAddToCart}" method="post"></form>
            <span class="me-3" style="margin-top:3px">Ilosć sztuk: </span>
            <div class="me-3">
                <input form="addToCartFrom{$part['Id']}" type="hidden" value="{$part['Id']}" name="partId-input">
                <input form="addToCartFrom{$part['Id']}" type="number" value="1" name="amount-input" class="form-control form-control-sm" style="width: 55px ">
            </div>
            <div>
              <button form="addToCartFrom{$part['Id']}" type="submit" class="btn btn-primary btn-sm me-4">Dodaj do koszyka</button>
            </div>
      </div>
    </div>
    <small>PartShop.pl</small>
</li>
