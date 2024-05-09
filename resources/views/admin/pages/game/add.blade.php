@extends('admin.layouts.admin_layout')
@section('content')

<div class="content-wrapper" style="overflow-y:auto">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Basic form elements</h4>
                <form class="forms-sample" action="{{Route('game_store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="{{$type}}">
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName2">1st Option</label>
                        <input type="text" class="form-control" name="option[]" id="exampleInputName2" placeholder="1st Option" required>
                        <input type="radio" name="correct_option" value="0" required> Correct
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName3">2nd Option</label>
                        <input type="text" class="form-control" name="option[]" id="exampleInputName3" placeholder="2nd Option" required>
                        <input type="radio" name="correct_option" value="1" required> Correct
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName4">3rd Option</label>
                        <input type="text" class="form-control" name="option[]" id="exampleInputName4" placeholder="3rd Option" required>
                        <input type="radio" name="correct_option" value="2" required> Correct
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName4">4th Option</label>
                        <input type="text" class="form-control" name="option[]" id="exampleInputName4" placeholder="4th Option" required>
                        <input type="radio" name="correct_option" value="3" required> Correct
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Table</h4>
            </p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th> SI</th>
                    <th> Title </th>
                    <th> First Option </th>
                    <th> Second Option </th>
                    <th> Third Option </th>
                    <th> Four Option </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{$data->title}}</td>
                        @foreach ($data->game_option as $option)
                        <td style="{{ $option->is_right ? 'color: green;' : '' }}">{{$option->option_name}}</td>
                        @endforeach
                        <td>
                            <div class="dropdown show">
                                <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <a class="dropdown-item" href="">Active</a>
                                  <a class="dropdown-item" href="{{Route('game_edit',$data->id)}}">Edit</a>
                                  <a class="dropdown-item" href="{{Route('game_delete',$data->id)}}">Delete</a>
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
<style>
    .form-group
    {
        margin-bottom: 1.5rem;
    }
</style>


@endsection
