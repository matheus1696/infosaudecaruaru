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

<body class="bg-gradient-to-r from-[#42B029] to-[#004B43] px-4 min-h-screen flex flex-col items-center px-4 py-6 mt-10 overflow-hidden"
    x-data="{ openModal: false, checked: false }">
    
    <!-- Logo -->
    <div class="flex justify-center mb-10">
        <img src="https://infosaude.saudecaruaru.pe.gov.br/assets/img/logo_sms_mono_branco.png"
            alt="Prefeitura de Caruaru" class="w-96 h-auto">
    </div>

    <h1 class="text-2xl font-bold text-center text-white mb-2">Cadastro de Intenção </h1>
    <h2 class="text-lg font-medium text-center text-white">Secretaria de Saúde de Caruaru</h2>
    <h2 class="text font-medium text-center text-white mb-4">Plantões Extraordinários e Eventos Extras</h2>

    <div class="grid grid-cols-1 gap-6 w-full max-w-4xl">

        @if ($dbProfessionais->isEmpty())
        
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg shadow-md">
                <p class="font-semibold">Atenção:</p>
                <p>No momento, você não está apto a participar dos plantões extraordinários e eventos extras.</p>
            </div>
        
        @else    

            @foreach ($dbProfessionais as $dbProfessional)
                <div class="bg-white py-6 px-6 rounded-2xl shadow-lg">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-[#004B43] mb-1">{{ $dbProfessional->nome }}</h3>
                            <p class="text-[#42B029] text-sm mb-1">Matrícula: <span
                                    class="font-semibold">{{ $dbProfessional->matricula }}</span></p>
                            <p class="text-[#42B029] text-sm mb-1">CPF: <span
                                    class="font-semibold">{{ $dbProfessional->cpf }}</span></p>
                            <p class="text-[#42B029] text-sm mb-1">Lotação: <span
                                    class="font-semibold">{{ $dbProfessional->lotacao }}</span></p>
                            <p class="text-[#42B029] text-sm mb-1">Cargo: <span
                                    class="font-semibold">{{ $dbProfessional->cargo }}</span></p>
                            <p class="text-[#42B029] text-sm">Inscrito na lista de plantões extras?
                                <span
                                    class="font-semibold {{ $dbProfessional->apto_extra ? 'text-[#004B43]' : 'text-red-600' }}">
                                    {{ $dbProfessional->apto_extra ? 'Sim' : 'Não' }}
                                </span>
                            </p>
                        </div>
                        <div>
                            @if ($dbProfessional->apto_extra)
                                <a href="{{ route('extras.edit', $dbProfessional->id) }}" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                    Sair da Lista
                                </a>
                            @else
                                <!-- Botão que abre o modal -->
                                <button @click="openModal = true"
                                    class="bg-[#42B029] hover:bg-[#004B43] text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                    Entrar na Lista
                                </button>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach        

            <!-- Modal -->
            <div>
                <div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-[.90] flex items-center justify-center px-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg max-w-xl w-full">
                        <div class="flex justify-between border-b border-gray-200 pb-2.5">
                            <h2 class="text-lg font-semibold text-gray-800">Confirmação</h2>
                            <button @click="openModal = false" class="px-2.5 bg-gray-500 text-white rounded-lg"> X </button>
                        </div>
                        <p class="text-sm text-center text-gray-600 mt-4">
                            Para prosseguir, marque a caixa abaixo e confirme sua inscrição na lista de plantões extraordinários e eventos extras.
                        </p>

                        <div class="flex items-start mt-4">
                            <input type="checkbox" id="confirmCheckbox" x-model="checked"
                                class="w-5 h-5 text-[#004B43] border-gray-300 rounded focus:ring-[#42B029]">
                            <label for="confirmCheckbox" class="ml-2 text-sm text-gray-700">
                                <p class="text-justify">
                                    Declaro estar ciente do disposto na <strong>Lei nº 6.915, de 28 de novembro de 2022</strong> e manifesto interesse em integrar a lista de plantões extraordinários e eventos extras da Secretaria Municipal de Saúde e dá outras providências.
                                </p>
                                <p class="mt-2">
                                    <a href="https://leismunicipais.com.br/a/pe/c/caruaru/lei-ordinaria/2022/692/6915/lei-ordinaria-n-6915-2022-institui-e-regulamenta-o-pagamento-de-plantoes-extraordinarios-e-eventos-extras-no-ambito-da-secretaria-da-saude-do-municipio-de-caruaru-e-da-outras-providencias" class="text-green-700 underline" target="_blank">Acesse a Lei nº 6.915</a>
                                </p>
                            </label>
                        </div>

                        <div class="flex justify-end space-x-3 mt-6">
                            <button type="button" class="bg-gray-300 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300" x-show="!checked">
                                Confirmar
                            </button>

                            <a href="{{ route('extras.edit', $dbProfessional->id) }}" class="bg-[#42B029] hover:bg-[#004B43] text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300" x-show="checked">
                                Confirmar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>

    <!-- Botão Voltar -->
    <div class="mt-10">
        <a href="{{ route('extras.index') }}"
            class="bg-gray-100 hover:bg-gray-400 text-black hover:text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
            Voltar
        </a>
    </div>

</body>

</html>
