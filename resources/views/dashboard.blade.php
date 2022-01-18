@extends('layouts.main')

@section('title') Dashboard @endsection

@section('css')
@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Selamat Datang</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
 <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <img src="{{ asset('image/smk-imud.png') }}" alt="welcome" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection