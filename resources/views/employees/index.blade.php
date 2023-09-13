@extends('theme.base')


@section('content')
    <style>
        .container {
            padding: 3rem 0;
        }

        .container>h1 {
            text-align: center;
        }

        .input-search {
            display: flex;
            flex-direction: row;
            justify-content: space-between
        }

        .input-search>form {
            display: flex;
            flex-direction: row;
        }

        .form-control {
            margin: 2rem 0;
            box-shadow: 4px 4px 4px #aeaec0, -4px -4px 4px #fff;
            height: 3rem;
            border-radius: 4px;
        }

        button {
            background-color: #2596be;
            height: 3rem;
            border: 1px solid #ccc;
            color: white;
            box-sizing: border-box;
            width: 15%;
            margin: 2rem 0;
            border-radius: 4px;
            box-shadow: 4px 4px 4px #aeaec0, -4px -4px 4px #fff;

        }

        .button_details {
            background-color: #2596be;
            height: 3rem;
            border: 1px solid #ccc;
            color: white;
            box-sizing: border-box;
            width: 100%;
            padding: 4px 8px;
            border-radius: 4px;
            text-decoration-line: none;
        }
    </style>

    <div class="container">
        <h1><strong style="color: #2596be">L</strong>ista Empleados</h1>
        <div class="input-search">
            <form action="{{ url('list/{email}') }}" method="get">
                <input type="text" style="width: 22rem;" class="form-control" placeholder="Email" name="email">
                <button class="button">Buscar</button>
            </form>
            <form action="{{ url('list/{min}/{max}') }}" method="get">
                <input type="number" style="width: 10rem;" class="form-control" placeholder="Valor Min" name="min"
                    value="{{ old('min') ?? @$array->salary }}">
                <input type="number" style="width: 10rem;" class="form-control" placeholder="Valor Max" name="max"
                    value="{{ old('max') ?? @$array->salary }}">
                <button class="button">Buscar</button>
            </form>
        </div>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><strong class="table_titles">N</strong>ame</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @if (@isset($array))
                    @foreach ($array as $item)
                        <tr>
                            <th scope="row">{{ $item['id'] }}</th>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['position'] }}</td>
                            <td>{{ $item['salary'] }}</td>
                            <td><a button_details href="{{ url('details', $item['id']) }}"
                                    class="button_details">Detalles</a></td>
                        </tr>
                    @endforeach
                @else
                    <button><a style="text-decoration-line: none; color: #fff;"
                            href="{{ url('list') }}">Regresar</a></button>
                    @forelse ($data as $item)
                        <tr>
                            <th scope="row">{{ $item['id'] }}</th>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['position'] }}</td>
                            <td>{{ $item['salary'] }}</td>
                            <td><a button_details href="{{ url('details', $item['id']) }}"
                                    class="button_details">Detalles</a></td>
                        </tr>
                    @empty
                        @if (Session::has('mensaje'))
                            <div class="alert alert-danger my-5 text-center">{{ Session::get('mensaje') }}</div>
                        @endif
                    @endforelse
                @endif
            </tbody>
        </table>
    </div>
@endsection
