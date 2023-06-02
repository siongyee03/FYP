const validator = new window.JustValidate('#sendcodefrm');

validator
.addField('#sendcode',[
    {
        rule: 'required'
    },
    {
        rule: 'email'
    }
])

.onSuccess((event)=> {
    document.getElementById("sendcodefrm").submit();
});