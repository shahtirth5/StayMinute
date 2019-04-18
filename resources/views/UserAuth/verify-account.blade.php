<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email</title>
</head>
<body class="bg-white">
    <div class="mt-1" style="margin-left: 35%;">
        <h3>StayMinute Account Verification</h3>
        <a href={{ URL::to('activate-user/'. $code) }} class="btn btn-info ml-3 mt-2">Verify Account</a>
    </div>
</body>
</html>
