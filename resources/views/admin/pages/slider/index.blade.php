@extends('admin.layouts.admin_layout')
@section('content')
<div class="content-wrapper" style="overflow-y:auto">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Slider Table</h4>
        <a href="{{Route('slider_add')}}" class="card-title text-right btn btn-success">Add Slider</a>
        </p>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th> Si</th>
                <th>Heading </th>
                <th> Description </th>
                <th> Image </th>
                <th> Status</th>
                <th> Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($datas as $key=>$data)
              <tr>
                <td>{{ $key+1}} </td>
                <td>{{$data->title}} </td>

                <td>{{$data->description}}</td>
                <td>
                    <img src="{{$data->image}}" alt="" style="height: 50px;width:50px;border-radius:10px;">
                </td>

                <td>
                    @if($data->status == 1)
                        <p class="text-success">Active</p>
                    @else
                        <a href="" class="btn btn-warning">InActive</a>
                    @endif
                </td>
                <td>
                    <div class="dropdown show">
                        <a class="btn btn-success dropdown-toggle" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Action
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            @if($data->status == 1)
                                <a class="dropdown-item" href="">InActive</a>
                            @else
                                <a class="dropdown-item" href="">Active</a>
                            @endif
                            <a class="dropdown-item" href="{{Route('slider_show', $data->id)}}">Edit</a>
                            <a class="dropdown-item"
                                href="{{Route('slider_delete', $data->id)}}">Delete</a>
                        </div>
                    </div>
                </td>

              </tr>

              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
