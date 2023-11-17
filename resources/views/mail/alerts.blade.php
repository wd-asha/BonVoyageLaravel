<p>Уважаемый(ая), {{ $name }}</p>
<p>Вы сделали заказ на сайте BonVoyage:</p>

@foreach($body as $row)
@if($row->weight === 0)
    Страна: {{ $row->options->country }}<br>
    Город: {{ $row->options->town }}<br>
    Отель: {{ $row->options->hotel }}<br>
    Номер: {{ $row->options->seats }}<br>
    Стандарт: {{ $row->options->standard }}<br>
    Количество дней: {{ $row->options->days }}<br>
@endif
@if($row->weight !== 0)
    Страна: {{ $row->options->country }}<br>
    Город: {{ $row->options->town }}<br>
    Отель: {{ $row->options->hotel }}<br>
    Номер: {{ $row->options->seats }}<br>
    Стандарт: {{ $row->options->standard }}<br>
    Количество дней: {{ $row->options->days }}<br>
@endif
@endforeach
<p>Стоимость предложения: ${{ $total }}</p>
<p>Номер вашего заказа: #{{ $orderid }}</p>
<p>Вы можете следить за статусом заказа в личном кабинете на сайте BonVoyage</p>
