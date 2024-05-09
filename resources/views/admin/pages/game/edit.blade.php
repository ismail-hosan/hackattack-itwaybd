@extends('admin.layouts.admin_layout')
@section('content')

<div class="content-wrapper" style="overflow-y:auto">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Basic form elements</h4>
                <form class="forms-sample" action="{{Route('game_update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$game->id}}">
                    <input type="hidden" name="type" value="{{$game->game_type}}">
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName1" value="{{$game->title}}" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName2">1st Option</label>
                        <input type="text" class="form-control" name="option[]" id="exampleInputName2" value="{{$game->game_option[0]['option_name']}}" placeholder="1st Option" required>
                        <input type="radio" name="correct_option" value="0" required {{ $game->game_option[0]['is_right'] == 1 ? 'checked' : '' }}> Correct
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName3">2nd Option</label>
                        <input type="text" class="form-control" name="option[]" value="{{$game->game_option[1]['option_name']}}" id="exampleInputName3" placeholder="2nd Option" required>
                        <input type="radio" name="correct_option" value="1" required {{ $game->game_option[1]['is_right'] == 1 ? 'checked' : '' }}> Correct

                    </div>
                    <div class="form-group">
                        <label for="exampleInputName4">3rd Option</label>
                        <input type="text" class="form-control" name="option[]" value="{{$game->game_option[2]['option_name']}}" id="exampleInputName4" placeholder="3rd Option" required>
                        <input type="radio" name="correct_option" value="2" required {{ $game->game_option[2]['is_right'] == 1 ? 'checked' : '' }}> Correct
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName4">4th Option</label>
                        <input type="text" class="form-control" name="option[]" value="{{$game->game_option[3]['option_name']}}" id="exampleInputName4" placeholder="4th Option" required>
                        <input type="radio" name="correct_option" value="3" required {{ $game->game_option[3]['is_right'] == 1 ? 'checked' : '' }}> Correct

                    </div>

                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
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
