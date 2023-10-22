@extends('base')

@section('content')
    <div class="container">
        <h1>List</h1>
        <a href="{{ route('animals.create') }}" class="btn btn-success mb-3">Add</a>

        @if(count($animals) > 0)
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Species</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($animals as $animal)
                        <tr>
                            <td>{{ $animal->name }}</td>
                            <td>{{ $animal->species }}</td>
                            <td>{{ $animal->age }}</td>
                            <td>
                                <a href="{{ route('animals.edit', $animal) }}" class="btn btn-info">Edit</a>
                                <form method="POST" action="{{ route('animals.destroy', $animal) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No animals found.</p>
        @endif
    </div>
@endsection
