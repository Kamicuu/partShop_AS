<table class="table mt-3">
    <caption>Lista zamówień</caption>
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Data</th>
        <th scope="col">Imię i nazwisko</th>
        <th scope="col">Wartość zamówienia</th>
        <th scope="col">Koszt przesyłki</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      {foreach $orders as $order}
      <tr class="table-active">
        <th scope="row">{$order->id}</th>
        <td>{$order->data}</td>
        <td>{$order->nazwa_zamawiajacego}</td>
        <td>{math equation=$order->wartosc_zamowienia/100 format="%.2f"} zł</td>
        <td>{math equation=$order->koszt_przesylki/100 format="%.2f"} zł</td>
        <td>{$order->status}</td>
      </tr>
      <tr>
        <td colspan="7">
            <table class="table ms-1 table-sm table-light">
                <thead>
                    <tr>
                      <th scope="col" style="font-weight: 500">Id</th>
                      <th scope="col" style="font-weight: 500">Nazwa</th>
                      <th scope="col" style="font-weight: 500">Koszt jed.</th>
                      <th scope="col" style="font-weight: 500">Jed. miary</th>
                      <th scope="col" style="font-weight: 500">Ilość</th>
                    </tr>
                </thead>
                <tbody style="border-top: thick">
                {foreach $order->czesci_zamowienia as $part}
                <tr>
                    <th scope="row">{$part->id}</th>
                    <td>{$part->nazwa}</td>
                    <td>{math equation=$part->cena/100 format="%.2f"} zł</td>
                    <td>{$part->jednostka_miary}</td>
                    <td>{$part->ilosc}</td>
                </tr>
                {/foreach}
                </tbody>
            </table>
        </td>
      </tr>
      {/foreach}
    </tbody>
</table>
