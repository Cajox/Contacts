<script src = "https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js"
        type = "text/javascript"></script>
{{--<head>
    <title>KnockoutJS Submit Binding</title>
    <script src = "https://ajax.aspnetcdn.com/ajax/knockout/knockout-3.3.0.js"
            type = "text/javascript"></script>
</head>--}}
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
                        <td><input data-bind='value: type' /></td>
                        <td><input data-bind='value: number' /></td>
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
    <button data-bind='click: save, enable: contacts().length > 0'>Save to JSON</button>
</p>

<textarea data-bind='value: lastSavedJson' rows='5' cols='60' disabled='disabled'> </textarea>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>

    var initialData = [
        { first_name: "Danny", last_name: "LaRusso", phones: [
                { type: "Mobile", number: "(555) 121-2121" },
                { type: "Home", number: "(555) 123-4567"}]
        },
        { first_name: "Sensei", last_name: "Miyagi", phones: [
                { type: "Mobile", number: "(555) 444-2222" },
                { type: "Home", number: "(555) 999-1212"}]
        }
    ];

    var ContactsModel = function(contacts) {
        var self = this;
        self.contacts = ko.observableArray(ko.utils.arrayMap(contacts, function(contact) {
            return { first_name: contact.first_name, last_name: contact.last_name, phones: ko.observableArray(contact.phones) };
        }));

        self.addContact = function() {
            self.contacts.push({
                first_name: "",
                last_name: "",
                phones: ko.observableArray()
            });
        };

        self.removeContact = function(contact) {
            self.contacts.remove(contact);
        };

        self.addPhone = function(contact) {
            contact.phones.push({
                type: "",
                number: ""
            });
        };

        self.removePhone = function(phone) {
            $.each(self.contacts(), function() { this.phones.remove(phone) })
        };



        // $.post("/test", contacts, function(returnedData) {
        //     alert(1231)
        //     // This callback is executed if the post was successful
        // })

        self.save = function() {
            console.log(ko.toJS(self.contacts))
            // console.log(ko.toJS(self.contacts)/*, null, 2*/)
            var contacts = ko.toJS(self.contacts);
            $.ajax({
                type: "POST",
                url: '/contacts/create',
                data: { contacts, _token: '{{csrf_token()}}' },
                success: function () {
                    alert('success');
                },
                error: function () {
                    alert('error');
                },
            });






            // self.lastSavedJson(JSON.stringify(ko.toJS(self.contacts), null, 2));
        };

        self.lastSavedJson = ko.observable("")
    };

    ko.applyBindings(new ContactsModel(initialData));
</script>
