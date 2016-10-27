<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <style type="text/css" rel="stylesheet" media="all">
            /* Media Queries */
            @media  only screen and (max-width: 500px) {
                .button {
                    width: 100% !important;
                }
            }
        </style>
    </head>
    <body>
        <h1>A potential customer just sent you a message!</h1>
        <p>Message from: {{$name}}</p>
        <p>Email address: {{$email}}</p>
        <p>Phone number: {{$phone}}</p>
        <p>Message: {{$msg}}</p>
    </body>
</html>
