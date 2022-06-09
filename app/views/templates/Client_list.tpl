<div id="client_table">
    <script>
        function goToPrevious() {
            document.getElementById("page-input").value = document.getElementById("page_prev").value;
            console.log(document.getElementById("page-input").value)
            ajaxPostForm('paging_form','{$conf->app_root}/showPartClientList','client_table');
        }
        function goToNext() {
            document.getElementById("page-input").value = document.getElementById("page_next").value;
            console.log(document.getElementById("page-input").value)
            ajaxPostForm('paging_form','{$conf->app_root}/showPartClientList','client_table');
        }
    </script>
    <form id="paging_form">
        <input type="hidden" name="page-input" id="page-input"/>
    </form>
    <input type="hidden" id="page_prev" value="{$pageNum-1}"/>
    <input type="hidden" id="page_next" value="{$pageNum+1}"/>
    <table class="table mt-3">
        <caption>Lista klientów</caption>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Imie</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">E mail</th>
            <th scope="col">Miasto</th>
            <th scope="col">Kod pocztowy</th>
            <th scope="col">Ulica</th>
            <th scope="col">Numer lokalu</th>
          </tr>
        </thead>
        <tbody style="border-top: thick">
        {foreach $clients as $client}
        <tr>
            <th scope="row">{$client['Id']}</th>
            <td>{$client['Imie']}</td>
            <td>{$client['Nazwisko']}</td>
            <td>{$client['E_mail']}</td>
            <td>{$client['Miasto']}</td>
            <td>{$client['Kod_pocztowy']}</td>
            <td>{$client['Ulica']}</td>
            <td>{$client['Numer_lokalu']}</td>
        </tr>
        {/foreach}
        </tbody>
    </table>
    <div class="col text-end pe-4">
        <button type="button" class="btn btn-link p-0" onclick="goToPrevious()">
            {if $pageNum>0}
            {$pageNum-1}
            {/if}
        </button>
        <button type="button" class="btn btn-link p-0 disabled">{$pageNum}</button>
        <button type="button" class="btn btn-link p-0" onclick="goToNext()">{$pageNum+1}</button>
    </div>
</div>
