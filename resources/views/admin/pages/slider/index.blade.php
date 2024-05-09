@extends('admin.layouts.admin_layout')
@section('content')
<div class="content-wrapper" style="overflow-y:auto">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Slider Table</h4>
            <button href="" class="card-title text-right btn btn-success">Add New</button>
            </p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th> Si</th>
                    <th> Title </th>
                    <th> First Option </th>
                    <th> Second Option </th>
                    <th> Third Option </th>
                    <th> Four Option </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>

                    <tr>
                        <td> </td>
                        <td> </td>

                        <td></td>

                        <td>
                            <div class="dropdown show">
                                <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <a class="dropdown-item" href="">Active</a>
                                  <a class="dropdown-item" href="">Edit</a>
                                  <a class="dropdown-item" href="">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>



                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
