@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a  class="btn btn-primary" href="{{ route('company.create')}}">Shto Kompani</a></div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Emri</th>
                                <th scope="col">Email</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Website</th>
                                <th scope="col">Edito</th>
                                <th scope="col">Fshi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $key => $company)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td><a href="{{ asset('storage/'.$company->logo) }}" target="_blank" ><img class="img-fluid img-thumbnail" src="{{ asset('storage/'.$company->logo) }}" alt="Logo e fshire"></a></td>
                                <td>{{ $company->website }}</td>
                                <td><a class="btn btn-primary" href="{{ route('company.edit', ['id' => $company->id]) }}">Edit</a></td>
                                <td class="text-center">
                                    <a class="btn btn-danger" href="#">
                                        <form class="form-delete" method="POST" action="{{ route('company.destroy') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $company->id }}">
                                            <button style="border: none; background-color: transparent;" name="id" value="{{ $company->id }}">Fshij</button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection