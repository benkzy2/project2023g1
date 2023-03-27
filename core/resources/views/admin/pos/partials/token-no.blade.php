<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Token No</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'VT323', monospace;
        }
        .receipt-title {
            text-align: center;
            border-bottom: 1px dashed #000;
            padding-bottom: 15px;
            margin-bottom: 12px;
        }
        .my-0 {
            margin-bottom: 0px;
            margin-top: 0px;
        }
        .mb-0 {
            margin-bottom: 0px;
        }
        .mt-0 {
            margin-top: 0px;
        }
        p, h1, h2, h3, h4, h5, h6 {
            margin: 0;
        }
        .token-no {
            text-align: center;
            font-size: 26px;
        }
    </style>
</head>
<body>

    <div>
        <div class="receipt-title">
            <h2 class="my-0">{{$bs->website_title}}</h2>
            <p class="my-0">{{\Carbon\Carbon::now()}}</p>
        </div>
        <div class="token-no">
            <h1>Token No.</h1>
            <h1>{{Session::get('pos_token_no')}}</h1>
        </div>
    </div>

</body>
</html>
