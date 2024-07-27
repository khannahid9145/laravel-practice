@extends('layout.masterlayout')
@section('content')
    <div class="d-flex justify-content-center align-items-center " style="height: 100vh;">
        <main class="shadow-lg p-3 mb-5 bg-body rounded">
            <h1>REGISTRATION</h1>
            <form id="registrationForm">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <label class="col-md-6">User Name : </label>
                <input class="col-md-12" type="text" name="uname" id="uname" required><br /><br />
                <label class="col-md-6">Email : </label>
                <input class="col-md-12" type="text" name="email" id="email" required><br /><br />
                <input type="submit" class="btn btn-primary" onclick="checkCredential()"></input>
            </form>
        </main>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function checkCredential(event) {
                event.preventDefault();
                var name = $("#uname").val();
                var email = $("#email").val();
                var data = {
                    name: name,
                    email: email
                };
                console.log(data);
                $.ajax({
                    url: '/check_credential',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        "Content-Type": "application/json",
                    },
                    data: JSON.stringify(data),
                    success: function(response) {
                        if (response.redirect) {
                            // Redirect to the new page
                            localStorage.setItem('jwt_token', response.token);
                            window.location.href = response.redirect;
                        } else if (response.error) {
                            // Show error message
                            show_snack(response.error);
                        }
                        console.log(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            $('#registrationForm').on('submit', checkCredential);
        });
    </script>
@endpush
