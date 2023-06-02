const validator = new JustValidate('#addfrm');

validator
.addField('#input-address',[
    {
        rule: 'required',
    },
])

.addField('#input-city',[
    {
        rule: 'required',
    },
])

.addField('#input-state', [
    {
      rule: 'required',
    },
  ])

.addField('#input-postal-code',[
    {
        rule: 'required',
    },
    {
        rule: 'number',
    },
])

.onSuccess((event)=> {
    document.getElementById("addfrm").submit();
});