const validator = new window.JustValidate('#updatefrm');

validator
.addField('#uemail',[
    {
        validator: (value)=> () => {
            return fetch("validate_email.php?uemail=" + encodeURIComponent(value))
            .then(function(response){
                return response.json();
            })
            .then(function(json){
                return json.available;
            });
        },
        errorMessage: "Email already taken"
    },
    {
        rule: 'required'
    }
])

.addField('#uname',[
    {
        rule: 'required'
    }
])

.onSuccess((event)=> {
    document.getElementById("updatefrm").submit();
});