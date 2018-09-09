@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Forme </div>

                    <div class="card-body">
                        <form action="{{ route('emploee.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">Emri</label>
                                <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }} " id="first_name" placeholder="Shkruani emrin" value="{{ old('first_name') }}">
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="last_name">Mbiemri</label>
                                <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }} " id="last_name" placeholder="Shkruani mbiemrin" value="{{ old('last_name') }}">
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="company">Zgjidh Kompani</label>
                                <select class="form-control" id="company" name="company">
                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ (old('company') == $company->id)? 'selected':'' }}>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Numri i telefonit</label>
                                <input type="text" name="contact_number" class="form-control" id="contact_number" placeholder="Nr i telefonit">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection