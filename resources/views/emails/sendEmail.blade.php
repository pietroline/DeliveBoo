<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <body class="bg-light">
        <div class="container">
          <div class="card my-10">
            <div class="card-body">
              <h1 class="h3 mb-2 font-weight-bold">Ciao da Delive <span class="ms_text-orange">Boo</span> !</h1>
              <h5 class="text-teal-700">Hai ricevuto un nuovo ordine!</h5>
              <hr>
              <div class="space-y-3">
                <p class="text-gray-700">Questa è una mail generata automaticamente da Deliveboo S.r.l. </p>
                <p class="text-gray-700">Non è necessario che tu risponda</p>
                <p class="text-gray-700">
                  Siamo felici che tu abbia scelto di utilizzare i nostri servizi. Per qualsiasi inconveniente non esitare 
                  a contattarci alla mail <a href="#"> info@deliveboo.it</a>
                </p>
                <p class="text-gray-700">
                  Di seguito i dettagli primari del ordine ricevuto:
                </p>
                <p>
                    <strong>Nome:</strong> {{$leadName}}  <br>
                    <strong>Numero di telefono:</strong> {{$leadPhone}} <br>
                    <strong>Indirizzo:</strong> {{$leadAddress}} <br>
                </p>
                
              </div>
              <hr>
              <a class="btn btn-primary ms_mail-btn" href="#" target="_blank">Torna su DeliveBoo</a>
            </div>
          </div>
        </div>
      </body>
    
</body>
</html>

