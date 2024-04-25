@extends('layout.masterlayout')
@section('content')
<div class="container">
    <div class="row">
        <h3>View User</h3>
        <div class="mb-3">
            <label class="form-label">Name :</label>
            <input type="text" value="{{ $data->name }}" class="form-control" name="name" id="name"
                disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">email :</label>
            <input type="text" value="{{ $data->email }}" class="form-control" name="email" id="email"
                disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">City :</label>
            <input type="text" value="{{ $data->city }}" class="form-control" name="city" id="city"
                disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Gender :</label>
            <input type="text" value="{{ $data->gender }}" class="form-control" name="gender" id="gender"
                disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">area :</label>
            <input type="text" value="{{ $data->area }}" class="form-control" name="area" id="area"
                disabled>
        </div>
    </div>
</div>
@endsection


