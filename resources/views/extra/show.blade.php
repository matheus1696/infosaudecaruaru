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
<body class="bg-gradient-to-r from-green-400 to-green-600 min-h-screen flex flex-col items-center justify-start px-4 py-6 mt-10">
    <!-- Logo -->
    <a href=" {{route('extras.index')}} " class="flex justify-center mb-6">
        <img src="assets/img/logo_sms_mono_branco.png" alt="Prefeitura de Caruaru" class="w-96 h-auto">
    </a>  
    
    <h1 class="text-3xl font-bold text-white mb-4">Plantão Extra</h1>
    <h2 class="text-lg text-white mb-6">Informações dos Profissionais</h2>

    <div class="grid grid-cols-1 gap-6 w-full max-w-4xl">
        @foreach ($dbProfessionais as $dbProfessional)
            <div class="bg-white py-6 px-6 rounded-2xl shadow-lg transition-transform transform">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-green-600 mb-1">{{ $dbProfessional->nome }}</h3>
                        <p class="text-green-500 text-sm mb-1">Matrícula: <span class="font-semibold">{{ $dbProfessional->matricula }}</span></p>
                        <p class="text-green-500 text-sm mb-1">CPF: <span class="font-semibold">{{ $dbProfessional->cpf }}</span></p>
                        <p class="text-green-500 text-sm mb-1">Lotação: <span class="font-semibold">{{ $dbProfessional->lotacao }}</span></p>
                        <p class="text-green-500 text-sm mb-1">Cargo: <span class="font-semibold">{{ $dbProfessional->cargo }}</span></p>
                        <p class="text-green-500 text-sm">Apto para Extra? 
                            <span class="font-semibold {{ $dbProfessional->apto_extra ? 'text-green-600' : 'text-red-600' }}">
                                {{ $dbProfessional->apto_extra ? 'Sim' : 'Não' }}
                            </span>
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('extras.edit', $dbProfessional->id) }}" 
                           class="{{ $dbProfessional->apto_extra ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }} text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300">
                            {{ $dbProfessional->apto_extra ? 'Remover da Lista' : 'Fazer Plantão' }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</body>
</html>
