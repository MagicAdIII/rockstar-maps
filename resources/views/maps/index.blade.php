@extends('layouts.app')

@section('content')
    <div id="map" data-game="{{ $game }}"></div>
@endsection

{{-- @todo ugly as fuck! --}}
@push('scripts')
	<script>window.GAMESLUG = '{{ $game }}';</script>
@endpush
