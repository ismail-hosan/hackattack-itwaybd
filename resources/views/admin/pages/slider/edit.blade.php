@extends('admin.layouts.admin_layout')
@section('content')

<div class="content-wrapper" style="overflow-y:auto">
    <div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Video</h4>
                <form class="forms-sample" action="{{Route('slider_update')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$slider->id}}">
                    <div class="form-group">
                        <label for="exampleInputName1">Heading</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName1" value="{{$slider->title}}"
                            placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName4">Description</label>
                        <input type="text" class="form-control" name="description" id="exampleInputName1" value="{{$slider->description}}"
                        placeholder="Video Url" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName2">Image</label>
                        <input type="file" class="form-control" name="image" value="" id="exampleInputName2"
                            placeholder="">

                    </div>
                    <div class="form-group">
                        <img src="{{asset($slider->image)}}" alt="" style="height: 68px;width:122px;border-radius:10px;">

                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update Slider</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
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
