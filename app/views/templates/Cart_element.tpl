<li class="list-group-item d-flex justify-content-between align-items-center" style="min-width: 468px">
    <div class="d-flex w-100">
        <div class="flex-shrink-1">
            <img src="{$part->url_zdjecia}" class="img-thumbnail rounded float-end size_130px" alt="Error while loading image">
        </div>
        <div class="w-75 ps-5">
            <h6>{$part->nazwa}</h6>
            <table class="table table-sm w-75">
                <tr>
                    <td class="cart_table_cell">Id</td>
                    <td>{$part->id}</td>
                </tr>
                <tr>
                    <td class="cart_table_cell">Cena jed.</td>
                    <td>{math equation=$part->cena/100 format="%.2f"} zł</td>
                </tr>
                <tr>
                    <td class="cart_table_cell">Jednostka miary</td>
                    <td>{$part->jednostka_miary}</td>
                </tr>
            </table>
        </div>
        <div class="d-flex flex-fill align-items-start flex-column justify-content-between align-items-end">
            <div clas="row">
                <span class="me-2 fw-bold">szt. </span>
                <span class="badge bg-primary rounded-pill" style="margin-top: 3px">{$part->ilosc}</span>
            </div>
            <div class="row">
                <span class="me-2 fw-bold">{math equation=($part->cena*$part->ilosc)/100 format="%.2f"} zł<span>
            </div>
            <div clas="row">
                <form method="post">
                    <input type="hidden" value="{$part->id}" name="partId-input">
                    <button type="submit" class="btn btn-danger mb-2">Usuń</button>
                </form>
            </div>
        </div>
    </div> 
</li>
