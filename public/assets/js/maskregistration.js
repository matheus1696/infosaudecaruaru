const handleRegistration = (event) => {
    let input = event.target;
    input.value = registrationMask(input.value);
}

const registrationMask = (value) => {
    if (!value) return "";
    value = value.replace(/\D/g,''); // Remove todos os caracteres não numéricos

    if (value.length > 7) {
        value = value.replace(/^(\d{2})(\d{3})(\d)/, "$1.$2.$3");
    } else {
        value = value.replace(/^(\d{1})(\d{3})(\d)/, "$1.$2.$3");
    }

    return value;
}