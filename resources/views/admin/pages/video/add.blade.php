@extends('admin.layouts.admin_layout')
@section('content')

<div class="content-wrapper" style="overflow-y:auto">
    <div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Video</h4>
                <form class="forms-sample" action="{{Route('video_store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName1" value=""
                            placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName2">Thamble Image</label>
                        <input type="file" class="form-control" name="thamble_image" value="" id="exampleInputName4"
                            placeholder="" required>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputName4">Video Url</label>
                        <input type="text" class="form-control" name="url" id="exampleInputName1" value=""
                        placeholder="Video Url" required>

                    </div>
                    <button type="submit" class="btn btn-primary me-2">Add Video</button>
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
