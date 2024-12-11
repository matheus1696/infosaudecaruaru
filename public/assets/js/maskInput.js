const handleCPF = (event) => {
    let input = event.target;
    input.value = cpfMask(input.value);
}

const cpfMask = (value) => {
    if (!value) return "";
    value = value.replace(/\D/g,'');
    value = value.replace(/(\d{3})(\d)/,"$1.$2");
    value = value.replace(/(\d{3})(\d)/,"$1.$2");
    value = value.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    return value;
}

const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
}

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

const handleMatriculation = (event) => {
    let input = event.target;
    input.value = matriculationMask(input.value);
}

const matriculationMask = (value) => {
    if (!value) return "";
    value = value.replace(/\D/g,'');
    value = value.replace(/^(\d{2})(\d{3})(\d)/g,"$1.$2-$3");
    return value;
}