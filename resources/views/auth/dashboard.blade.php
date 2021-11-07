@extends('layouts.auth')

@section('content')
    <x-header />

    <body>
        <div id="app" class="md:flex antialiased">
            <aside class="w-full md:h-screen md:w-64 bg-white md:flex md:flex-col">
                    {{-- <header class="border-b border-solid border-gray-800 flex-grow">
              <h1 class="py-6 px-4 text-gray-100 text-base font-medium">Buildings</h1>
            </header> --}}
                <x-sidebar />
            </aside>

            <main class="bg-gray-100 h-screen w-full overflow-y-auto">
                <section v-if="active === 'performance'" id="performance">
                    <header class="border-b border-solid border-gray-300 bg-white">
                      <div class="grid">
                        <div class="font-bold pt-4">
                          Esthera Jasckon
                        </div>
                        <div class="">
                          estherajasckon@simple.com
                        </div>
                      </div>
                    </header>

                    <section class="m-4 bg-white border border-gray-300 border-solid rounded shadow">
                        <div class="flex justify-between">
                            <div class="">
                                <header class="border-b border-solid border-gray-300 p-4 text-lg font-medium">
                                    Your Transactions
                                </header>
                            </div>
                            <div class="mt-8 mx-8">
                                <i class="fas fa-calendar-alt"> 23-30 November 2021</i>
                            </div>
                        </div>
                        <section class="overflow-x-auto w-full">
                            <div class="grid grid-cols-1">
                                <div class="ml-8 bg-text">
                                    <p class="text-gray-500">My transactions</p>
                                    <ul id="transactions" class="mb-4">

                                    </ul>
                                </div>
                            </div>
                        </section>
                    </section>

                    <section class="m-4 bg-white border border-gray-300 border-solid rounded shadow">
                        <div class="flex justify-between">
                            <div class="">
                                <header class="border-b border-solid border-gray-300 p-4 text-lg font-medium">
                                    Your Accounts
                                </header>
                            </div>
                            <div class="mt-8 mx-8">
                                <i class="fas fa-calendar-alt">{{ date('d-m-Y H:i:s') }}</i>
                            </div>
                        </div>
                        <section class="overflow-x-auto w-full">
                            <div class="grid grid-cols-1">
                                <div class="ml-8 bg-text">
                                    <p class="text-gray-500">My Accounts</p>
                                    <ul id="accounts" class="mb-4">

                                    </ul>
                                </div>
                            </div>
                        </section>
                    </section>

                    <section class="m-4 bg-white border border-gray-300 border-solid rounded shadow invisible">
                        <header class="border-b border-solid border-gray-300 p-4 text-lg font-medium">
                            Buildings Overview
                        </header>
                        <section
                            class=" flex flex-row flex-wrap items-center text-center border-b border-solid border-gray-300">
                            <div
                                class="p-4 w-full sm:w-1/2 lg:w-1/4 border-b border-solid border-gray-300 md:border-b-0 sm:border-r">
                                <span class="text-xs font-medium text-gray-500 uppercase">TOTAL REVENUE</span>
                                <div class="py-4 flex items-center justify-center text-center">
                                    <span class="mr-4 text-3xl">$485,985</span>
                                    <span
                                        class="inline-flex items-center bg-green-500 h-6 px-2 rounded text-white text-xs">+9.1%</span>
                                </div>
                            </div>
                            <div
                                class="p-4 w-full sm:w-1/2 lg:w-1/4 border-b border-solid border-gray-300 md:border-b-0 sm:border-r">
                                <span class="text-xs font-medium text-gray-500 uppercase">PREDICTED MONTHLY REVENUE</span>
                                <div class="py-4 flex items-center justify-center text-center">
                                    <span class="mr-4 text-3xl">$6,576</span>
                                    <span
                                        class="inline-flex items-center bg-green-500 h-6 px-2 rounded text-white text-xs">+12.0%</span>
                                </div>
                            </div>
                            <div
                                class="p-4 w-full sm:w-1/2 lg:w-1/4 border-b border-solid border-gray-300 md:border-b-0 sm:border-r">
                                <span class="text-xs font-medium text-gray-500 uppercase">ACTIVE RENTERS</span>
                                <div class="py-4 flex items-center justify-centeborder-b border-solid border-gray-300 p-4 text-lg font-mediumr text-center invisible">
                                    <span class="mr-4 text-3xl">152</span>
                                    <span
                                        class="inline-flex items-center bg-red-500 h-6 px-2 rounded text-white text-xs">-12</span>
                                </div>
                            </div>
                            <div
                                class="p-4 w-full sm:w-1/2 lg:w-1/4 border-b border-solid border-gray-300 md:border-b-0 sm:border-r flex flex-col items-center">
                                <span class="text-xs font-medium text-gray-500 uppercase">PENDING RENTS</span>
                                <span class="block py-4 text-gray-500 text-3xl">$930,10</span>

                            </div>
                        </section>
                        {{-- <section id="chart" class="p-4 flex justify-end">

                            <div class="font-bold text-lg">
                              Conervsations
                              <div class="grid  ">
                                <ul>
                                  <li class="">Ethera Jasckon <p class="text-sm text-gray-500 font-semibold">I need more informations ..</p></li>
                                  <li class="">Ethera Jasckon <p class="text-sm text-gray-500 font-semibold">I need more informations ..</p></li>
                                  <li class="">Ethera Jasckon <p class="text-sm text-gray-500 font-semibold">I need more informations ..</p></li>
                                  <li class="">Ethera Jasckon <p class="text-sm text-gray-500 font-semibold">I need more informations ..</p></li>
                                </ul>
                              </div>
                            </div>
                        </section> --}}
                    </section>

                    <div class="flex flex-wrap flex-row invisible">
                        <div class="w-full lg:w-1/2">
                            <section class="m-4 bg-white border border-gray-300 border-solid rounded shadow">
                                <header class="border-b border-solid border-gray-300 p-4 text-lg font-medium">
                                    Platform Settings
                                </header>
                                <section class="overflow-x-auto w-full">
                                    <div class="grid grid-cols-1">
                                        <div class="ml-8 bg-text">
                                            ACCOUNT
                                            <ul class="mb-4">
                                                <li class="text-gray-500 mt-4"><i
                                                        class="fas fa-toggle-on mr-2 bg-text"></i>Email me when someone
                                                    follows me</li>
                                                <li class="text-gray-500 mt-4"><i class="fas fa-toggle-on mr-2 "></i>Email
                                                    me when someone answers on my post</li>
                                                <li class="text-gray-500 mt-4"><i
                                                        class="fas fa-toggle-on mr-2 bg-text"></i>Email me when someone
                                                    mentions me</li>
                                            </ul>
                                            APPLICATION
                                            <ul class="mb-4">
                                                <li class="text-gray-500 mt-4"><i
                                                        class="fas fa-toggle-on mr-2 bg-text"></i>Mnthly products updates
                                                </li>
                                                <li class="text-gray-500 mt-4"><i
                                                        class="fas fa-toggle-on mr-2 bg-text"></i>New launches and projects
                                                </li>
                                                <li class="text-gray-500 mt-4"><i
                                                        class="fas fa-toggle-on mr-2 bg-text"></i>Subscribe to newsletter
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                            </section>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <section class="m-4 bg-white border border-gray-300 border-solid rounded shadow">
                                <header class="border-b border-solid border-gray-300 p-4 text-lg font-medium">
                                    Profile Information
                                </header>
                                <section class="overflow-x-auto w-full">
                                  <div class="grid ">
                                      <div class="font-xs text-gray-500 font-normal mx-4 mt-4">
                                        Hi I'm Alec ..Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula sem vel ex sollicitudin, sit amet posuere ante mattis. Sed pretium eu arcu quis sodales. Sed mattis varius ante, vel commodo erat lacinia non. Nunc congue, ante id semper semper, purus eros porta mauris, at accumsan tellus dui vel ante.
                                      </div>
                                      <ul class="mx-4">
                                          <li class="font-bold text-gray-500 mt-4">Full Name: Alice Thompsan</li>
                                          <li class="font-bold text-gray-500 mt-4">Mobile: (44) 123 1234 123</li>
                                          <li class="font-bold text-gray-500 mt-4">Email:  alicethompsan@mail.com</li>
                                          <li class="font-bold text-gray-500 mt-4">Location: United State</li>
                                          <li class="font-bold text-gray-500 mt-4">Social media: <i class="fab fa-facebook text-gray-300"></i>
                                            <i class="fab fa-instagram text-gray-300"></i>
                                            <i class="fab fa-twitter text-gray-300"></i></li>
                                      </ul>
                                  </div>
                                </section>
                            </section>
                        </div>
                </section>

                <section v-if="active === 'new'" id="new">
                    <header class="border-b border-solid border-gray-300 bg-white">
                        <h2 class="p-6">New</h2>
                    </header>
                </section>
              </main>
        </div>
    </body>
    </html>
    <x-footer />

@endsection

@section('afterScripts')
    <script>

        isNotTokenPresent();

        $(document).ready(function () {

            $.ajax({
                type: "GET",
                url: base_api_url + "/transactions",
                beforeSend: function(request) {
                    request.setRequestHeader("Accept", 'application/json');
                    request.setRequestHeader("'Content-Type'", 'application/json');
                    request.setRequestHeader("Authorization", `Bearer ${sessionStorage.getItem('token')}`);
                },
                dataType: "json",
                encode: true,
                success: function (data) {
                    console.log(data);
                    //

                    if(data.data) {
                        $.each(data.data, function (i, e) {
                            $('#transactions').append(`
                                <div class="text-black font-bold mt-4">
                                    <i class="far fa-arrow-alt-circle-down text-red-500"></i>${e.title}
                                    <div class="flex justify-between">
                                        <p class="text-xs text-gray-400 ml-6">${e.created_at}</p>
                                        <div class="mx-8 text-red-500">
                                            ${e.amount}
                                        </div>
                                    </div>
                                </div>
                            `)
                        })
                    }
                },
                error: function (xhr) {

                    alert(xhr.responseJSON.message);
                }
            }).done(function (data) {
                // console.log(data);
            });

            $.ajax({
                type: "GET",
                url: base_api_url + "/accounts",
                beforeSend: function(request) {
                    request.setRequestHeader("Accept", 'application/json');
                    request.setRequestHeader("'Content-Type'", 'application/json');
                    request.setRequestHeader("Authorization", `Bearer ${sessionStorage.getItem('token')}`);
                },
                dataType: "json",
                encode: true,
                success: function (data) {
                    console.log(data);

                    if(data.data) {
                        $.each(data.data, function (i, e) {
                            $('#accounts').append(`
                                <div class="text-black font-bold mt-4">
                                    <i class="far fa-arrow-alt-circle-down text-red-500"></i>${e.name}
                                    <div class="flex justify-between">
                                        <p class="text-xs text-gray-400 ml-6">${e.created_at}</p>
                                        <p class="text-xs text-gray-400 ml-6">${e.iban}</p>
                                        <p class="text-xs text-gray-400 ml-6">${e.number}</p>
                                        <div class="mx-8 text-red-500">
                                            ${e.current_balance}
                                        </div>
                                    </div>
                                </div>
                            `);
                        })
                    }
                },
                error: function (xhr) {

                    alert(xhr.responseJSON.message);
                }
            }).done(function (data) {
                // console.log(data);
            });
        });
    </script>

@endsection
