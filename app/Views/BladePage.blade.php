

@foreach (range(1, $fizzbuzzCount) as $number)
    <li>{{\Controllers\FizzbuzzController::getFizzbuzzValue($number)}}</li>
@endforeach
