@extends('layout.masterlayout')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-4">
                <h3>update new user</h3>
                {{-- <form action="" method="POST"> --}}
                <form action="{{ route('update.user', $updatedata->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name :</label>
                        <input type="text" value="{{ $updatedata->name }}" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">email :</label>
                        <input type="text" value="{{ $updatedata->email }}" class="form-control" name="email"
                            id="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City :</label>
                        <input type="text" value="{{ $updatedata->city }}" class="form-control" name="city"
                            id="city">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender :</label>
                        <input type="text" value="{{ $updatedata->gender }}" class="form-control" name="gender"
                            id="gender">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">area :</label>
                        <input type="text" value="{{ $updatedata->area }}" class="form-control" name="area"
                            id="area">
                    </div>
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
@endsection
