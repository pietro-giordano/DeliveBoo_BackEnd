<x-mail::message>
# Nuovo ordine ricevuto

In data {{ $order->created_at }} sono stati ordinati i seguenti piatti:
@foreach ($order->dishes as $dish)
- {{ $dish->name }} x {{ $dish->pivot->quantity }}   
@endforeach

per un totale di {{ $order->total_price }} €

da spedire a {{ $order->customer_name }} {{ $order->customer_surname }}
in {{ $order->customer_address }} 
recapito telefonico {{ $order->phone_number }}

</x-mail::message>
