<script src = "https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js" type = "text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link href="{{asset('css/contact.css')}}" rel="stylesheet" />

<div class='liveExample'>

<h2>Contacts</h2>
<div id='contactsList'>
    <table class='contactsEditor'>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Phone numbers</th>
        </tr>
        <tbody data-bind="foreach: contacts">
        <tr>

            <td>
                <input name="first_name" data-bind='value: first_name' />
                <div><a href='#' data-bind='click: $root.removeContact'>Delete</a></div>
            </td>

            <td><input data-bind='value: last_name' /></td>
            <td>

                <table>
                    <tbody data-bind="foreach: phones">
                    <tr>
                        <td><input placeholder="phone type" data-bind='value: type' /></td>
                        <td><input placeholder="phone number" data-bind='value: number' /></td>
                        <td><a href='#' data-bind='click: $root.removePhone'>Delete</a></td>
                    </tr>
                    </tbody>
                </table>
                <a href='#' data-bind='click: $root.addPhone'>Add number</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<p>
    <button data-bind='click: addContact'>Add a contact</button>
    <button data-bind='click: save, enable: contacts().length > 0'>Save Contact</button>
</p>

<p id="res"></p>

<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

<script src="{{asset('js/contact.js')}}"></script>

