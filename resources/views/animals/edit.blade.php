@extends('base')

@section('content')
    <div class="container">
        <h1>Edit</h1>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('animals.update', $animal) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="{{ $animal->name }}" class="form-control" placeholder="Enter the name">
                    </div>
                    <div class="form-group">
                        <label for="species">Species:</label>
                        <input type="text" name="species" id="species" value="{{ $animal->species }}" class="form-control" placeholder="Enter the species">
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" name="age" id="age" value="{{ $animal->age }}" class="form-control" placeholder="Enter the age">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
