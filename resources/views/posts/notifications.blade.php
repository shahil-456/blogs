@extends('layouts.master')
@section('title')
@lang('translation.analytics')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
Dashboards
@endslot
@slot('title')
Leads
@endslot
@endcomponent

{{-- document.getElementById('realtime-message').innerText = data; --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">All Notifications</h4>
            </div>
           <div class="card-body">
    <div class="row">
        @foreach ($notifications as $notification)
            <div class="col-md-12 mb-3">
                <div class="border rounded p-3">
                    <h6 class="mb-1">Lead Status Update</h6>
                    <p class="mb-1">{{ $notification->message }}</p>
                    <small class="text-muted">
                        <i class="mdi mdi-clock-outline"></i>
                        {{ $notification->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        @endforeach
    </div>
        </div>
    {{ $notifications->links() }}

        </div>
    </div>
    @endsection
    @section('script')


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
     <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/timeline.init.js') }}"></script>
    <script src="{{URL::asset('build/js/pages/flag-input.init.js')}}"></script>
       
    @endsection
