
    var initialData = [];

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

    self.save = function() {
    var contacts = ko.toJS(self.contacts);
    $.ajax({
    type: "POST",
    url: '/contacts/store',
    data: { contacts,  "_token": $('#csrf-token')[0].content },
    success: function () {
        $("#res").text('Successfully added contact');
},
    error: function () {
        $("#res").text('Something went wrong, try again!');
},
});


};

    self.lastSavedJson = ko.observable("")
};

    ko.applyBindings(new ContactsModel(initialData));
