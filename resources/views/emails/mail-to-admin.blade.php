<h1 style="text-align:center; font-family:sans-serif;font-size:2rem;padding-top:2rem;">Nuovo Ordine Ricevuto</h1>

<div style="font-family:sans-serif;">
    <h2 style="font-size:2rem;padding-bottom:0.5rem;">Dati Utente</h2>

    <ul>
        <li>Nome Cliente: {{$order->name}}</li>
        
        <li>Cognome Cliente: {{$order->surname}}</li>
        
        <li>Email Cliente: {{$order->email}}</li>

        <li>Messaggio Cliente: {{$order->message}}</li>
    </ul>

    <h3>Totale Ordine: {{$order->total_price}} €, effettuato il: {{$order->payment_date}}</h3>
</div>
