@extends('theme.base')


@section('content')
    <style>
        .container {
            display: flex;
            justify-content: center;
            padding: 4rem 0;
        }

        .card {
            box-shadow: 4px 4px 4px #aeaec0, -4px -4px 4px #fff;
            border-radius: 4px;
        }

        .card-button {
            display: flex;
            justify-content: center;
            padding: 1rem 0;

        }

        .button {
            text-align: center;
            text-decoration-line: none;
            background-color: #2596be;
            height: 2rem;
            border: 1px solid #ccc;
            color: white;
            box-sizing: border-box;
            width: 30%;
            border-radius: 4px;
            box-shadow: 4px 4px 4px #aeaec0, -4px -4px 4px #fff;
        }
    </style>

    <div class="container">
        <div class="card" style="width: 18rem;">
            @foreach ($data as $item)
                <img src="https://w7.pngwing.com/pngs/770/378/png-transparent-user-profile-icon-contact-information-s-face-head-avatar.png"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['name'] }} {{ $item['last_name'] }} </h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Email: </strong>{{ $item['email'] }}</li>
                    <li class="list-group-item"><strong>Phone: </strong>{{ $item['phone'] }}</li>
                    <li class="list-group-item"><strong>Address: </strong>{{ $item['address'] }}</li>
                    <li class="list-group-item"><strong>Position: </strong>{{ $item['position'] }}</li>
                    <li class="list-group-item"><strong>Salary: </strong>{{ $item['salary'] }}</li>
                    <li class="list-group-item"><strong>Skills: </strong>{{ $item['skills'] }}</li>
                </ul>
                <div class="card-button">
                    <a href="{{ url('list') }}" class="button">Regresar</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
