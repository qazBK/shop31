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
                    <form action="{{route('categories.update')}}" method="post" id="addCategory">
                        @csrf

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

{{--@push('scripts')--}}
{{--    <script>alter('test')</script>--}}
{{--@endpush--}}
