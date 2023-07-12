@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Slider Create') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('common.errors')
                        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" name="link" class="form-control" id="link" value="{{ old('link') }}">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div>
                                    <label>
                                        <input type="radio" name="is_active" value="1" checked> Active
                                    </label>
                                    <label>
                                        <input type="radio" name="is_active" value="0"> In Active
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
