const handleRegistration = (event) => {
    let input = event.target;
    input.value = registrationMask(input.value);
}

const registrationMask = (value) => {
    if (!value) return "";
    value = value.replace(/\D/g,'');
    value = value.replace(/^(\d{2})(\d{3})(\d)/g,"$1.$2-$3");
    return value;
}