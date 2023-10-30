@extends('errors/layout')

@section('title')
{{trans($settings->title)}}
@endsection
@section('code', '404')
@section('message', __('Not Found'))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset ('logo.png')}}" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset ('frontend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <title>404 - FSA Not Found</title>
    <style>
        .marketing {
            margin: 3rem 0;
        }
        .footer {
            padding-top: 1.5rem;
            color: #777;
            border-top: 0.05rem solid #e5e5e5;
        }
        .img{
            width:45%;
            margin-bottom:20px;
        }
        .container{
            max-width: 900px;
        }
        h1{
            font-size:80px;
        }
    </style>
</head>
<body>
    
    <div class="container my-5">
        <div class="header clearfix text-center">
            <img src="{{ asset ('logo.png')}}" class="img img-responsive"><br>
            <h4 class="text-muted" style="text-align:center">FSA - NON-BANK FINANCIAL SERVICE AUTHORITY.</h4>
        </div>
        <div class="row marketing">
            <div class="col-lg-12 text-center">
                <h2>404</h2>
                <h5>The page you are looking for does not exist.</h5>
                <p>Please click <a href="{{ url('/') }}">Here</a> to be back to homepage or <br>go back to <a href="{{ url()->previous() }}">Previous Page</a>. Thanks!</p>
              
            </div>

            

        </div>

        <footer class="footer text-center">
            <p>©<script>document.write(new Date().getFullYear());</script>&nbsp; FSA - NON-BANK FINANCIAL SERVICE AUTHORITY. All Right Reserved.</p>
        </footer>

    </div>

</body>
</html>
