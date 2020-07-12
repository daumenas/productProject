@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div style="width: 80%;margin: 0 auto;">
                        {{ $chart->container() }}
                    </div>
                    {{ $chart->script() }}
                </div>
            </div>
        </div>
    </div>
@endsection