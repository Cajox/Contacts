<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contacts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<!-- As a link -->
@if(Auth::check() && Auth::user()->role->name == 'admin')
    <nav class="navbar navbar-dark bg-dark">
        <a class=" navbar-brand btn btn-outline-danger" style="width: 100px" href="\dashboard">Home</a>
        <a class=" navbar-brand btn btn-outline-info" style="width: 100px" href="\contacts\create">Admin</a>

    </nav>
@endif


@if($contacts->isNotEmpty())

<table class="table">
    <tbody>
    @foreach($contacts as $contact)

        <tr class="thead-dark">
        <th scope="row">{{$contact->id}}</th>
        <td><b>Name</b>: {{$contact->first_name}}</td>
        <td><b>Surname</b>: {{$contact->last_name}}</td>
            @if($contact->numbers->isNotEmpty())
                @foreach($contact->numbers as $phone)
                    <td>
                        <ul>
                            <li>Phone Type: {{$phone->type}}</li>
                            <li>Number: {{$phone->phone_number}}</li>
                        </ul>
                    </td>
                @endforeach
            @else
                <td><ul><p class="">Contact doesnt have numbers </p></ul></td>
            @endif

    @endforeach
@else
    <h1 class="text-center">No contacts</h1>
@endif
      </tr>
    </tbody>
</table>

</html>
