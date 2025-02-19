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
<body class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-r from-green-400 to-green-600 px-4">
    <!-- Logo -->
    <div class="flex justify-center mb-10">
        <img src="assets/img/logo_sms_mono_branco.png" alt="Prefeitura de Caruaru" class="w-96 h-auto">
    </div>   
    
    <div class="w-full max-w-sm p-8 bg-white rounded-2xl shadow-xl transition-all duration-500 transform">
        <h1 class="text-2xl font-bold text-center text-green-700">Plantão Extra</h1>
        <h2 class="text-lg font-medium text-center text-green-600 mb-4">Secretaria de Saúde de Caruaru</h2>

        <p class="text-center text-gray-600 mb-6 text-sm">
            Este cadastro é exclusivo para servidores da Secretaria de Saúde de Caruaru que estão ativos.
        </p>
        
        <form action="{{ route('extras.store') }}" method="POST" x-data="{ loading: false }" @submit="loading = true">
            @csrf
            <div class="mb-4">
                <label class="pl-2 block text-green-700 font-medium mb-1" for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" 
                    class="w-full p-2 border border-green-300 rounded-xl focus:outline-none transition-all duration-300 shadow-sm @error('cpf') border-red-500 ring-red-500 @enderror" 
                    maxlength="14" inputmode="numeric" aria-label="Digite seu CPF" autofocus
                    oninput="handleCPF(event)" value="{{ old('cpf') }}">

                <!-- Mensagem de erro -->
                @error('cpf')
                    <p class="mt-2 text-sm text-red-500 text-center">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" 
                class="w-full bg-green-500 text-white font-bold py-3 rounded-xl shadow-lg hover:bg-green-600 transition-all duration-300 flex items-center justify-center active:scale-95 disabled:opacity-50"
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
