@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        {{-- <example-component></example-component> --}}
        <search-component></search-component>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        new Vue({
            el: '#app',
        });
    </script>
@endsection
