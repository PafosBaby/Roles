@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">{{__("All genres")}}</h1>
    @if ($categories->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{__("Genre")}}</th>
                    <th>{{__("Action")}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('edit.category', $cat) }}"class='btn btn-sm btn-warning'>{{__("Edit")}}</a>
                            <form action="{{ route('delete.category', $cat) }}" method="POST" class="mx-2">
                                @csrf
                                @method('DELETE')
                                <button class='btn btn-sm btn-danger btn-remove'>{{__("Delite")}}</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else()
        <h2>{{__("There is not one genre yet")}}!</h2>
    @endif()
@endsection

@section('scripts')
    @include('layouts.admin-templates.script')
@endsection
