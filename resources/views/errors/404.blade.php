@extends('layout')
@section('pageHeader')
@endsection
@section('content')
<div class="pageError">
    <h2 class="pageError_message">{{ $exception->getMessage() }}</h2>
</div>
@endsection