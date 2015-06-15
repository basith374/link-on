@extends('admin.layouts.master')

@section('title', 'Admin Console')

@section('csslinks')
<style>
.popover {
	max-width: 500px;
}
.popover-content {
	word-wrap: break-word;
}
</style>
@endsection

@section('admin')
    <ul id="myTab" class="nav nav-tabs">
        @foreach($pages as $page)
            <li><a href="#{{$page}}Tab" data-toggle="tab">{{ucwords($page)}}</a></li>
        @endforeach
    </ul>
    <div id="myTabContent" class="tab-content">
        @foreach($pages as $page)
            @if($page == $showpage)
            <div class="tab-pane fade in active" id="{{$page . 'Tab'}}">
                @include('/admin/dashboard/' . $showpage)
            </div>
            @else
            <div class="tab-pane fade" id="{{$page . 'Tab'}}">
            </div>
            @endif
        @endforeach
    </div>
@stop

@section('jslinks')
<script type="text/javascript" src="{{ asset('/js/Chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/dashboard-app.js') }}"></script>
@stop