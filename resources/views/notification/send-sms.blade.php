@extends('layouts.layout')

@section('title', 'send SMS')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    ارسال پیامک
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
                        </div>
                    @endif
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label for="user">کاربران</label>
                            <select name="user" class="form-control" id="user">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="text">متن پیامک</label>
                            <textarea name="text" id="text" rows="3" class="form-control"></textarea>
                        </div>
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <div class="small mb-2">
                                        <li class="text-danger">{{ $error }}</li>
                                    </div>
                                @endforeach
                            </ul>
                        @endif
                        <button type="submit" class="btn btn-info">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
