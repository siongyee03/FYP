const validation = new JustValidate("#changemailfrm");

validation
    
    .addField("#cemail", [
        {
            rule:"required"
        },
        {
            rule:"email"
        },
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
        }
        
    ])

    .onSuccess((event)=> {
        document.getElementById("changemailfrm").submit();
    });