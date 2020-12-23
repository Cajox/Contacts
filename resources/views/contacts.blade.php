@extends('layouts.home')

@section('content')


{{--
    @if($kursevi->isNotEmpty())
--}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Tabela Svih kurseva
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr class="text-center">
                            <th>Ime Kursa</th>
                            <th>Minimalan uzrast</th>
                            <th>Opis</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>

{{--                        @foreach($kursevi as $kurs)

                            <tr >
                                <td class="text-center" >{{$kurs->name}}</td>
                                <td class="text-center">{{$kurs->min_age}}</td>
                                <td class="text-center">{{$kurs->description}}</td>
                                <td class="text-center">
                                    <a href="{{route('course.edit', $kurs->id)}}" class=" btn btn-dark text-center">
                                        Edit
                                    </a>
                                </td>
                            </tr>

                        @endforeach--}}
{{--
                        @endif
--}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

        <div style="padding-top: 20px">
            <a class="nav-link text-center btn btn-info col-sm-6 offset-3" href="{{--{{route('course.index')}}--}}">
                <div class="sb-nav-link-icon"><i class=""></i></div>
                Kreirajte kurs
            </a>
        </div>
        </div>

@stop
