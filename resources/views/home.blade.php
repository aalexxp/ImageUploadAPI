@extends('layouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload New File</div>

                    <div class="card-body">
                        <form action="{{ route('uploadfile') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="file" id="">
                                <span class="help-block text-danger">{{$errors->first('file')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="title">User ID</label>
                                <input type="number" name="user_id" id="user_id" class="form-control"/>
                                <span class="help-block text-danger">{{$errors->first('user_id')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <textarea name="title" id="caption" class="form-control"></textarea>
                                <span class="help-block text-danger">{{$errors->first('title')}}</span>

                            </div>
                            <button class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{session('success')}}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{session('error')}}
                    </div>
                @endif
            </div>
            <div class="card">
                    <div class="card-header">Upload New File</div>

                    <div class="card-body">
                        <form action="{{ route('images') }}" enctype="multipart/form-data" method="get">
                            @csrf
                            <div class="form-group">
                                <label for="title">User ID</label>
                                <input type="number" name="user_id" id="user_id" class="form-control"/>
                            </div>
                            <button class="btn btn-primary">Get Images</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
