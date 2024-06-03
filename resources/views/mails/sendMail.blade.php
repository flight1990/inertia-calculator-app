<!DOCTYPE html>
<html>
<head>
    <title>{{ $mailData['title'] }}</title>
</head>
<body>

<h1>{{ $mailData['title'] }}</h1>

@if(!empty($mailData['url']))
    <p>URL: {{ $mailData['url'] }}</p>
@endif

<p>{{ $mailData['message'] }} </p>

<p>form {{ $mailData['email'] }}</p>
</body>
</html>
