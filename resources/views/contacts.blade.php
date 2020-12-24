@extends('layouts.home')

@section('content')

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                <h1>Contacts</h1>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr class="text-center">
                            <th>First name</th>
                            <th>Last name</th>

                        </tr>
                        </thead>

                        <tbody>

                        @foreach($contacts as $contact)

                            <tr>
                                <td class="text-center" >{{$contact->first_name}}</td>
                                <td class="text-center">{{$contact->last_name}}</td>
                            @if($contact->numbers)
                                @foreach($contact->numbers as $phone)
                                    <td>
                                        <ul>
                                            <li>Phone Type: {{$phone->type}}</li>
                                            <li>Number: {{$phone->phone_number}}</li>
                                        </ul>
                                    </td>
                                @endforeach
                            @else
                                <td>User doesnt have number</td>
                            @endif
                        @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
        </div>

@stop
