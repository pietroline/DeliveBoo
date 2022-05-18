<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DeliveBoo</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        
        <div id="root">
        
        </div>

        {{-- inizio Braintree --}}
        <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
        {{-- fine Braintree --}}

        <script type="text/javascript" src="{{asset('js/front.js')}}"></script>
    </body>
</html>