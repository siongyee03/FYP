const validator = new window.JustValidate('#resetfrm');

validator
.addField('#email',[
    {
        rule: 'required'
    },
    {
        rule: 'email'
    }
])

.addField('#newpass',[
    {
        rule: 'required'
    },
    {
        rule: 'password'
    }
])

.addField("#newpassConfirm", [
    {
        rule: 'required'
    },
    {
        rule: 'password'
    },
    {
        validator: (value, fields) => {
            return value === fields['#newpass'].elem.value;
        },
        errorMessage: "Password not match"
    }
])

.onSuccess((event)=> {
    document.getElementById("resetfrm").submit();
});