<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @include('admin.includes.header');

    <main>
        @yield ('contents');
    </main>

    @include('admin.includes.footer');

</body>
</html>