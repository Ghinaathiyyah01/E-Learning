@extends('layouts.guru')
@section('content')
<div class="row" style="margin: 10px;">
    <div class="col-xl-12">
        <!-- Area Chart -->
        <div class="card shadow mb-3">
            <div class="card-body">
                {!! $guruchart->container() !!}
            </div>
        </div>
    </div>
</div>

<script src="{{ $guruchart->cdn() }}"></script>

{{ $guruchart->script() }}
@endsection
