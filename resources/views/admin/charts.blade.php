@extends('layouts.master')

@section('title', 'Example')

@section('content')
<div class="container">
	<div style="height:500px;width:500px;" id="myStocks">
	</div>
</div>
@endsection

@section('jslinks')
<script type="text/javascript" src="{{ asset('/js/jsapi.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/lava.js') }}"></script>
	{!! $chart->render('myStocks') !!}
@endsection