<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantão Extra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-r from-[#42B029] to-[#004B43] min-h-screen flex flex-col items-center justify-center px-4 overflow-hidden">
    <!-- Logo -->
    <div class="flex justify-center mb-10">
        <img src="https://infosaude.saudecaruaru.pe.gov.br/assets/img/logo_sms_mono_branco.png" alt="Prefeitura de Caruaru" class="w-96 h-auto">
    </div>   
    
    <div class="w-full max-w-sm p-8 bg-white rounded-2xl shadow-xl transition-all duration-500 transform">
        <h1 class="text-2xl font-bold text-center text-[#004B43] mb-2">Cadastro de Intenção </h1>
        <h2 class="text-lg font-medium text-center text-[#42B029]">Secretaria de Saúde de Caruaru</h2>
        <h2 class="text font-medium text-center text-[#42B029] mb-4">Plantões Extraordinários e Eventos Extras</h2>

        <p class="text-justify text-gray-600 mb-6 text-sm px-2 font-medium">
            Este cadastro é exclusivo para servidores ativos da Secretaria de Saúde de Caruaru, Previsto no Parágrafo Único, do Art. 2º, da Lei nº 6.915, de 28 de novembro de 2022. Que Institui e regulamenta o pagamento de plantões extraordinários e eventos extras no âmbito da Secretaria da Saúde do Município de Caruaru e dá outras providências.
        </p>
        
        <form action="{{ route('extras.store') }}" method="POST" x-data="{ loading: false }" @submit="loading = true">
            @csrf
            <div class="mb-4">
                <label class="pl-2 block text-[#42B029] font-medium mb-1" for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" 
                    class="w-full p-2 border border-[#42B029] focus:border-[#004B43] rounded-lg outline-none transition-all duration-300 shadow-sm @error('cpf') border-red-500 ring-red-500 @enderror" 
                    maxlength="14" inputmode="numeric" aria-label="Digite seu CPF" autofocus
                    oninput="handleCPF(event)" value="{{ old('cpf') }}">

                <!-- Mensagem de erro -->
                @error('cpf')
                    <p class="mt-1 pl-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" 
                class="w-full bg-[#42B029] hover:bg-[#004B43] text-white font-bold py-3 rounded-lg shadow-lg  transition-all duration-300 flex items-center justify-center active:scale-95 disabled:opacity-50"
                :disabled="loading">
                <span x-show="!loading">Buscar</span>
                <span x-show="loading" class="animate-spin border-t-2 border-white rounded-full w-5 h-5 ml-2"></span>
            </button>
        </form>
    </div>

    <script>
        const handleCPF = (event) => {
            let input = event.target;
            input.value = cpfMask(input.value);
        }

        const cpfMask = (value) => {
            if (!value) return "";
            value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
            value = value.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona o primeiro ponto
            value = value.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona o segundo ponto
            value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Adiciona o traço
            return value;
        }
    </script>
</body>
</html>
