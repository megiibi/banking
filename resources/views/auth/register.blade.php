@extends('layouts.auth')

@section('content')
    <x-header />
    <div class="container ">
        <div class="flex justify-center">
            <form id="registerForm" class="w-full md:w-1/3 bg-white rounded-lg">
                    <div class="flex font-bold justify-center mt-6">
                        <img class="h-20 w-20"
                            src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
                    </div>
                    <h2 class="text-3xl text-center text-gray-700 mb-4">Welcome !!</h2>
                    <div class="px-12 pb-10">
                        <div class="w-full mb-2">
                            <div class="flex items-center">
                                <input type='text' name="name" placeholder="Name"
                                    class="w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                            </div>
                            <span><span/>
                        </div>
                        <div class="flex items-center pt-2">
                            <input type='text' name="email" placeholder="Email"
                                class="w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                        </div>
                        <div class="flex items-center pt-2">
                            <input type='password' name="password" placeholder="Password"
                                class="w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" />
                        </div>

                        <div class="pt-4">
                           <button type="submit" class="w-full py-2 rounded-full bg text-gray-100  focus:outline-none pt-2">Button</button>
                      </div>

                    </div>
            </form>
        </div>
    </div>
    <x-footer />
@endsection
@section('afterScripts')
    <script>

        isTokenPresent();

        $(document).ready(function () {
            $("#registerForm").submit(function (event) {
                event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: base_api_url + "/register",
                    beforeSend: function(request) {
                        request.setRequestHeader("Accept", 'application/json');
                        request.setRequestHeader("'Content-Type'", 'application/json');

                        $('.error').hide();
                        $('.error').siblings('input').removeClass('is-invalid');
                    },
                    data: $(event.currentTarget).serializeArray(),
                    dataType: "json",
                    encode: true,
                    success: function (data) {
                        console.log(data);
                        alert('You have been successfully register in!');
                        sessionStorage.setItem('token', data.access_token);
                        sessionStorage.setItem('user', JSON.stringify(data.user));
                        window.location = `${base_url}/dashboard`
                    },
                    error: function (xhr) {

                        $('.alert.alert-danger').show();
                        $('.alert p.alert__main').text(xhr.responseJSON.message);

                        if(xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function (key, valueAsArray) {
                                $(`input[name=${key}]`).addClass('is-invalid');
                                $(`input[name=${key}]`).siblings('span.error').text(valueAsArray.join("\n")).show();
                            })
                        }
                    }
                }).done(function (data) {
                    console.log(data);
                });

            });
        });
    </script>

@endsection
