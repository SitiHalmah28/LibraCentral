<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Anggota Perpustakaan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #e6ebe0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .card {
            display: flex;
            flex-direction: row;
            margin: 20px;
        }
        .font, .back {
            height: 375px;
            width: 250px;
            position: relative;
            border-radius: 10px;
            margin: 0 10px;
        }
        .top {
            height: 30%;
            width: 100%;
            background-color: #8338ec;
            position: relative;
            z-index: 5;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .bottom {
            height: 70%;
            width: 100%;
            background-color: white;
            position: absolute;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        .top img {
            height: 100px;
            width: 100px;
            background-color: #e6ebe0;
            border-radius: 10px;
            position: absolute;
            top: 60px;
            left: 75px;
        }
        .bottom p {
            position: relative;
            top: 60px;
            text-align: center;
            text-transform: capitalize;
            font-weight: bold;
            font-size: 20px;
            text-emphasis: spacing;
        }
        .bottom .desi {
            font-size: 12px;
            color: grey;
            font-weight: normal;
        }
        .bottom .no {
            font-size: 15px;
            font-weight: normal;
        }
        .barcode img {
            height: 65px;
            width: 65px;
            text-align: center;
            margin: 5px;
        }
        .barcode {
            text-align: center;
            position: relative;
            top: 70px;
        }
        .back {
            background-color: #8338ec;
        }
        .qr img {
            height: 80px;
            width: 100%;
            margin: 20px;
            background-color: white;
        }
        .Details {
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 25px;
        }
        .details-info {
            color: white;
            text-align: center;
            padding: 5px;
            font-size: 16px;
            margin-top: 20px;
            line-height: 22px;
        }
        .logo {
            height: 40px;
            width: 150px;
            padding: 50px;
        }
        .logo img {
            height: 100%;
            width: 100%;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        @foreach($data as $value)
        <div class="card">
            <div class="font" style="padding-top: 60px;">
                <div class="top">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmjpd2NIE_OFIRYZEwlaFXpL6akEq7CefuEA&s" alt="logo">
                </div>
                <div class="bottom">
                    <p>{{$value->nama}}</p>
                    <p class="desi">Anggota</p>
                    <div class="barcode" style="margin-left:96px">
                        {!! DNS2D::getBarcodeHTML($value->nis, 'QRCODE', 3, 3) !!}
                    </div>
                </div>
            </div>
            <div class="back">
                <h1 class="Details">Informasi</h1>
                <hr class="hr">
                <div class="details-info">
                    <p><b>Email:</b></p>
                    <p>mafifah.usr@gmail.com</p>
                    <p><b>No. HP:</b></p>
                    <p>+62 85334695164</p>
                    <p><b>Alamat:</b></p>
                    <p>Jl. Rungkut Asri Utara No. 21B, Surabaya</p>
                </div>
                <div class="logo">
                    {!! DNS1D::getBarcodeHTML($value->nis, 'C128') !!}
                </div>
                <hr>
            </div>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        @endforeach
    </div>
</body>
</html>
