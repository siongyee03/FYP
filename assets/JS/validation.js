const validation = new JustValidate("#signup");

validation
    .addField("#uname", [
      {
         rule :"required"
      }
    ])

    .addField("#uemail", [
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

    .addField("#customerpassword", [
        {
            rule:"required"
        },
        {
            rule:"password"
        }
    ])
    .addField("#password_confirmation", [
        
        {
            validator: (value, fields) => {
                return value === fields['#customerpassword'].elem.value;
            },
            errorMessage: "Password should match"
        }
    ])
    .onSuccess((event)=> {
        document.getElementById("signup").submit();
    });