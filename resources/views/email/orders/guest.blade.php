<x-mail::message>
# Ordine andato a buon fine

L'ordine contenente: 
@foreach ($order->dishes as $dish)
- {{ $dish->name }} x {{ $dish->pivot->quantity }}   
@endforeach

è andato a buon fine.

Vi auguriamo buon appetito.

{{ $order->created_at }}
</x-mail::message>
