<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assinar Plano</title>

    @yield('css')
</head>
<body>
    @yield('content')

    {{-- Lib Stripe --}}
    <script src="https://js.stripe.com/v3/"></script>

    @yield('js')
</body>
</html>