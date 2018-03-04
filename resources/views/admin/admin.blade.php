@extends('admin.main-admin')

@section('title', '| Home')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{Route('onas.update')}}" class="btn btn-primary btn-block btn-h1-spacing btn-lg " style="margin-top: 20px;">О Нас</a>
                        </div>

                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{Route('portfolio.index')}}" class="btn btn-primary btn-block btn-h1-spacing btn-lg" style="margin-top: 20px;">Портфолио</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection