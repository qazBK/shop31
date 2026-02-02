@extends('layout')
@section('content')
    <section class="container">
        <div class="d-flex flex-column justify-content-center form-container category">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4 fs-1">Add category</h2>
                    <div class="alert alert-danger fs-2" id="errorMessage">
                        Both fields is required
                    </div>
                    <form action="{{route('categories.store')}}" method="post" id="addCategory">
                        @csrf
                        <div class="mb-5">
                            <label for="name" class="form-label fs-2">Name</label>
                            <input type="text" class="form-control fs-2 @error('title') is-invalid @enderror" id="name" name="title"
                                   placeholder="Enter category name">
                            @error('title')
                            <div class="invalid-feedback fs-3">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="mb-5">
                            <label for="description" class="form-label fs-2">Description</label>
                            <textarea class="form-control fs-2 @error('description') is-invalid @enderror" id="description" name="description"
                                      placeholder="Enter description"></textarea>
                            @error('description')
                            <div class="invalid-feedback fs-3">{{$message}}</div>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary w-100 my-2 fs-2">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

{{--@push('scripts')--}}
{{--    <script>alter('test')</script>--}}
{{--@endpush--}}
