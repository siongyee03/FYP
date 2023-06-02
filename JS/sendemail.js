const validator = new window.JustValidate('#sendemailfrm');

validator
.addField('#resetemail',[
    {
        rule: 'required'
    },
    {
        rule: 'email'
    }
])

.onSuccess((event)=> {
    document.getElementById("sendemailfrm").submit();
});