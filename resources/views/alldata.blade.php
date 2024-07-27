@extends('layout.masterlayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h1>All User's List</h1>
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add New</a>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>city</th>
                        <th>gender</th>
                        <th>area</th>
                        <th>view</th>
                        <th>UPDATE</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($data as $id => $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->area }}</td>
                            <td><button type="button" class="btn btn-primary"
                                    onclick= "updateData({{ $user->id }},'view')">View</button></td>
                            <td><button type="button" class="btn btn-primary"
                                    onclick= "updateData({{ $user->id }},'update')">update</button>
                            </td>
                            <td><a href="{{ route('delete.user', $user->id) }}" class="btn btn-danger">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="mt-5">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-10">
                                <h3>update new user</h3>
                                <form method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name :</label>
                                        <input type="text" class="form-control" name="fname" id="fname">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">email :</label>
                                        <input type="text" id="femail" class="form-control" name="femail"
                                            id="femail">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">City :</label>
                                        <input type="text" id="fcity" class="form-control" name="fcity"
                                            id="fcity">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Gender :</label>
                                        <input type="text" id="fgender" class="form-control" name="fgender"
                                            id="fgender">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">area :</label>
                                        <input type="text" id="farea" class="form-control" name="farea"
                                            id="farea">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="create()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">

                            <div class="col-10">
                                <h3>update new user</h3>
                                <form method="POST">
                                    @csrf
                                    <input type="hidden" id="id">
                                    <div class="mb-3">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <label class="form-label">Name :</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">email :</label>
                                        <input type="text" id="email" class="form-control" name="email"
                                            id="email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">City :</label>
                                        <input type="text" id="city" class="form-control" name="city"
                                            id="city">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Gender :</label>
                                        <input type="text" id="gender" class="form-control" name="gender"
                                            id="gender">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">area :</label>
                                        <input type="text" id="area" class="form-control" name="area"
                                            id="area">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closebtn" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" id="updatebtn" onclick="update()" class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function updateData(userId, param) {
            $.ajax({
                url: '/updatePage/' + userId,
                type: 'GET',
                dataType: 'json',

                success: function(response) {
                    if (response != '') {
                        if (param == 'view') {
                            $("#updatebtn").hide();
                            $("#closebtn").hide();
                        } else {
                            $("#updatebtn").show();
                            $("#closebtn").show();
                        }
                        $('#updateModal').modal('show');
                        var updatedata = response;
                        $("#id").val(response.id)
                        $("#name").val(response.name)
                        $("#email").val(response.email)
                        $("#city").val(response.city)
                        $("#gender").val(response.gender)
                        $("#area").val(response.area)
                    } else {
                        show_snack("no data found");
                    }
                    // debugger;
                    console.log(response);
                    // Handle the success response
                },
                error: function(error) {
                    console.log(error);
                    // Handle the error response
                }
            });
        }

        function update() {
            $("#msg1").html("");
            var id = document.getElementById("id").value;
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var city = document.getElementById("city").value;
            var gender = document.getElementById("gender").value;
            var area = document.getElementById("area").value;
            var data = {
                id,
                name,
                email,
                email,
                city,
                gender,
                area
            };
            $.ajax({
                url: '/update/' + id,
                method: "POST",
                timeout: 0,
                headers: {
                    "Content-Type": "application/json",
                },
                data: JSON.stringify(data),
                success: function(res) {
                    if (res != '') {
                        $('#updateModal').modal('hide');
                        location.reload();
                    }
                    $("#msg").html(res);

                },
            });
        }

        function create() {
            var name = document.getElementById("fname").value;
            var email = document.getElementById("femail").value;
            var city = document.getElementById("fcity").value;
            var gender = document.getElementById("fgender").value;
            var area = document.getElementById("farea").value;
            var data = {
                name,
                email,
                email,
                city,
                gender,
                area
            };
            $.ajax({
                url: '/adduser/',
                method: "POST",
                timeout: 0,
                headers: {
                    "Content-Type": "application/json",
                },
                data: JSON.stringify(data),
                success: function(res) {
                    if (res != '') {
                        $('#updateModal').modal('hide');
                        location.reload();
                    }
                    $("#msg").html(res);

                },
            });
        }
    </script>
@endpush
