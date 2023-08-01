@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Sliders ') }}
                        <a href="{{ route('sliders.create') }}">Create</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('common.session_flash')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $slider->title }}</td>
                                        <td>Otto</td>
                                        <td>
                                            <a href="{{ $slider->link}}" target="_blank">Visit</a>
                                        </td>
                                        <td>
                                            @if ($slider->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">In Active</span>
                                            @endif
                                        </td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <form action="{{ route('sliders.destroy', $slider->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
