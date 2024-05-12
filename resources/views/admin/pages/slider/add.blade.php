@extends('admin.layouts.admin_layout')
@section('content')

<div class="content-wrapper" style="overflow-y:auto">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Slider</h4>
                <form class="forms-sample" action="{{Route('slider_store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputName1">Heading</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName1" value=""
                            placeholder="Heading" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName2">Description</label>
                        <input type="text" class="form-control" name="description" id="exampleInputName2" value=""
                            placeholder="Description" required>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputName4">Select Image</label>
                        <input type="file" class="form-control" name="image" value="" id="exampleInputName4"
                            placeholder="3rd Option" required>

                    </div>
                    <button type="submit" class="btn btn-primary me-2">Add Slider</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .form-group {
        margin-bottom: 1.5rem;
    }
</style>


@endsection
