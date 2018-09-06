@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Forme </div>

                    <div class="card-body">
                        <form action="{{ route('company.update') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $company->id }}" name="id">
                            <div class="form-group">
                                <label for="name">Emri i kompanise</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }} " id="name" value="{{ $company->name }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ $company->email }}">
                            </div>
                            <div class="form-group">
                                <label for="logo">Upload Logo</label>
                                <input type="text" name="logo" class="form-control" id="logo" value="{{ $company->logo }}">
                            </div>
                            <div class="form-group">
                                <label for="website">Upload Logo</label>
                                <input type="website" name="website" class="form-control" id="website" value="{{ $company->website }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection