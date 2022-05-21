<form id="change_status_form-{$order->id}" onsubmit="return false;" method="post"></form>
<form id="archivize_form-{$order->id}" onsubmit="return false;" method="post"></form>
<tr class="table-active" id="order-{$order->id}">
    <th scope="row">{$order->id}</th>
    <td>{$order->data}</td>
    <td>{$order->nazwa_zamawiajacego}</td>
    <td>{math equation=$order->wartosc_zamowienia/100 format="%.2f"} zł</td>
    <td>{math equation=$order->koszt_przesylki/100 format="%.2f"} zł</td>
    <td>
        <input type="hidden" form="change_status_form-{$order->id}" name="orderId" value="{$order->id}">
        <input type="hidden" form="archivize_form-{$order->id}" name="orderId" value="{$order->id}">
        <select form="change_status_form-{$order->id}" name="status" class="form-select form-select-sm" 
            onchange="ajaxPostForm('change_status_form-{$order->id}','{$conf->app_root}/changeOrderStatus','order-{$order->id}')"
            >
            {foreach $orderStatuses as $status}
            <option 
            {if $status eq $order->status}
                selected
            {/if}
            >{$status}</option>
            {/foreach}
        </select>
    </td>
    <td>
        {if $order->status eq 'wysłane' or $order->status eq 'anulowane'}
            <button class="btn btn-warning btn-sm" onclick="ajaxPostFormWithConfirmation('archivize_form-{$order->id}','{$conf->app_root}/archivizeOrder','order_table');">Archiwizuj</button>
        {else}
            <button class="btn btn-sm disabled btn-secondary">Archiwizuj</button>
        {/if}
    </td> 
</tr>
