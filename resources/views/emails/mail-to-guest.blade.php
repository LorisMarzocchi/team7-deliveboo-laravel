<h1 style="text-align:center; font-family:sans-serif;font-size:2rem;padding-top:2rem;">Ciao {{$order->name}} il tuo ordine #{{$order->id}} sta per arrivare da te!</h1>

<div style="font-family:sans-serif;padding-top:1rem;">
    <h3 style="text-align:center;">Riepilogo dei tuoi dati</h3>

    <ul>
        <li>Nome: {{$order->name}}</li>
        
        <li>Cognome: {{$order->surname}}</li>
        
        <li>Email: {{$order->email}}</li>

        <li>Messaggio per il ristoratore: {{$order->message}}</li>
    </ul>

    <p>Totale ordine: {{$order->total_price}} € effettuato il {{$order->payment_date}}.</p>

    <p>Grazie per aver acquistato da noi &#x1F60D</p>

    <p><a href="http://localhost:5173/">Deliveboo</a>: Gusta i Sapori del Mondo Comodamente a Casa Tua!</p>

</div>

