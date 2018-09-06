@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Forme </div>

                    <div class="card-body">
                        <form action="{{ route('company.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Emri i kompanise</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }} " id="name" placeholder="Shkruani emri i kompanise">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="logo">Upload Logo</label>
                                <input type="text" name="logo" class="form-control" id="logo" placeholder="Upload">
                            </div>
                            <div class="form-group">
                                <label for="website">Upload Logo</label>
                                <input type="website" name="website" class="form-control" id="website" placeholder="Website">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection