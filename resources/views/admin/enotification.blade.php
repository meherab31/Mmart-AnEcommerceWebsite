<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
</head>
<body>
    <h2>{{ $subject }}</h2>
    <p>{{ $body }}</p>

    @if ($attachmentPath)
        <p>Attachment: <a href="{{ asset($attachmentPath) }}">Download Attachment</a></p>
    @endif
</body>
</html>
