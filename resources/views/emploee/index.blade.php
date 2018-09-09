@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a  class="btn btn-primary" href="{{ route('emploee.create') }}">Shto Punonjes</a></div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Emri</th>
                                <th scope="col">Mbiemri</th>
                                <th scope="col">Kompania</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nr. telefoni</th>
                                <th scope="col">Edito</th>
                                <th scope="col">Fshi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emploees as $key => $emploee)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $emploee->first_name }}</td>
                                    <td>{{ $emploee->last_name }}</td>
                                    <td>{{ $emploee->category_id }}</td>
                                    <td>{{ $emploee->email }}</td>
                                    <td>{{ $emploee->phone }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('emploee.edit', ['id' => $emploee->id]) }}">Edit</a></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-danger">
                                            <form class="form-delete" method="POST" action="{{ route('emploee.destroy') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $emploee->id }}">
                                                <button style="border: none; background-color: transparent;" name="id" value="{{ $emploee->id }}">Fshij</button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $emploees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection