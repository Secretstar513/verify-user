<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email Address</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>Please click the link below to verify your email address:</p>
    <p><a href="{{ url('/verify-email/'.$user->id) }}">Verify Email</a></p>
</body>
</html>
