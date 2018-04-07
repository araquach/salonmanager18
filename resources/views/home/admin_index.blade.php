@extends('layouts.main')

@section('head')

@include('layouts.partials.head')
	
@stop

@section('content')

@if(Auth::user())

<h2>Admin Menu</h2>

<h4>Welcome {{ Auth::user()->name }}</h4>

<div id="menuBox">
    
    <a href="{{ url('admin/holiday/index') }}">
        <div class="menu holiday">
            <h2><strong>Holidays</strong></h2>
            @include('widgets.admin.holiday')
        </div>
    </a>
    
    <a href="{{ url('admin/sick/index') }}">
        <div class="menu sickDay">
            <h2><strong>Sick Days</strong></h2>
            @include('widgets.admin.sickDay')
        </div>
    </a>
    
    <a href="{{ url('admin/lieu/index') }}">
        <div class="menu lieuHour">
            <h2><strong>Lieu Hours</strong></h2>
            @include('widgets.admin.lieuHour')
        </div>
    </a>
    
    <a href="{{ url('admin/freetime/index') }}">
        <div class="menu freeTime">
            <h2><strong>Free Time</strong></h2>
            @include('widgets.admin.freeTime')
        </div>
    </a>


</div>

@else

<h2>Welcome</h2>

@endif

@stop