@extends('admin.layouts.admin_layout')
@section('content')

<div class="content-wrapper vh-100">
    <div class="row">
      <div class="col-xl-3 col-sm-4 grid-margin stretch-card">

        <div class="card">
            <p style="margin-left: 6rem;">Fishing</p>
            <a href="{{ route('game_add', ['type' => 'fishing']) }}"  class="btn btn-success"><i class="fa fa-plus" style="font-size:25px"></i></a>
            <img class="card-img" src="{{asset('font_assets/img/add.jpg')}}" alt="Card image cap">

        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">

        <div class="card">
            <p style="margin-left: 5rem;">Password Attack</p>
            <a href="{{ route('game_add', ['type' => 'password_attack']) }}" class="btn btn-success"><i class="fa fa-plus" style="font-size:25px"></i></a>
            <img class="card-img" src="{{asset('font_assets/img/add.jpg')}}" alt="Card image cap">

        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">

        <div class="card">
            <p style="margin-left: 6rem;">Malware</p>
            <a href="{{ route('game_add', ['type' => 'malware']) }}" class="btn btn-success"><i class="fa fa-plus" style="font-size:25px"></i></a>
            <img class="card-img" src="{{asset('font_assets/img/add.jpg')}}" alt="Card image cap">

        </div>
    </div>
    </div>
</div>
@endsection
