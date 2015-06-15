@extends('admin.layouts.master')

@section('admin')
    <div class="well">
        <h2 class="h2">{{ $user->name }} <small>{{ $user->email }}</small></h2>
    </div>
@endsection