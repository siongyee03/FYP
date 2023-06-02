const validator = new window.JustValidate('#cartupfrm');

validator
.addField('#qty',[
    {
        rule: 'required',
    },
    {
        rule: 'number',
    },
    {
        rule: 'minNumber',
        value: 1,
    }
])

.onSuccess((event)=> {
    document.getElementById("cartupfrm").submit();
});