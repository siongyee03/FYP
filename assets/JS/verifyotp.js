const validator = new window.JustValidate('#checkotpfrm');

validator
.addField('#emailotp',[
    {
        rule: 'required'
    }
])

.onSuccess((event)=> {
    document.getElementById("checkotpfrm").submit();
});