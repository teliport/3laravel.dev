<!DOCTYPE html>
<html>
<head>
    <title>Kad Digital {{ $user->name }}</title>
</head>
<body>
    <h1>Kad Digital untuk {{ $user->name }}</h1>
    <p>Nombor WhatsApp: {{ $user->phone }}</p>

    <a href="https://wa.me/{{ $user->phone }}" target="_blank">
        Chat WhatsApp Sekarang
    </a>
</body>
</html>
