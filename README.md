# InfoSaúde Caruaru - Sistema de Gestão Interna

## Apresentação

O Sistema de Informação da Saúde de Caruaru é uma plataforma robusta e modular, desenvolvida para atender às necessidades específicas dos órgãos públicos, com foco inicial em Tecnologia da Informação e Comunicação (TIC). Este sistema oferece recursos avançados para a gestão eficiente de diversos departamentos, garantindo segurança, estabilidade e durabilidade.

Com tecnologia de ponta e uma estrutura flexível, o sistema se adapta às exigências dos órgãos públicos, promovendo a otimização de processos e um controle interno mais eficaz. Nossa solução é voltada para facilitar o gerenciamento interno, assegurando eficiência e resultados consistentes para a organização.

## Instalação

Para clonar um repositório para o seu repositório local, siga os seguintes passos:

<ol>
    <li>Abra o terminal ou prompt de comando no seu computador.</li>
    <li>Navegue até o diretório onde deseja clonar o repositório. Você pode usar o comando 'cd' seguido do caminho do diretório para navegar até ele.</li>
    <li>No GitHub, acesse o repositório que deseja clonar.</li>
    <li>Clique no botão "Code" (ou "Código") e copie a URL do repositório.</li>
    <li>Volte ao terminal ou prompt de comando e digite o comando git clone seguido da URL do repositório.</li>
</ol>

    git clone https://github.com/matheus1696/infosaudecaruaru.git

Para instalar dependências em um projeto, siga os seguintes passos:

    composer install

Setup configuração: Configurações sobre o nome do projeto, banco de dados e mais.

    cp .env.example .env

Gerar chave key da aplicação:

    php artisan key:generate

Migration - para criação de tabelas automáticas do sistema:

    php artisan migrate --seed

Iniciando sistema

    php artisan serve

## Usuários Padrões do Sistema

Usuários: `sysadmin@infosaude.com.br` <br>
Senha: `sysadmin`

Usuários: `admin@infosaude.com.br` <br>
Senha: `admin`

Usuários: `user@infosaude.com.br` <br>
Senha: `user`

## Bibliotecas Utilizadas no Projeto

- Tradução das mensagens para Laravel: https://github.com/lucascudo/laravel-pt-BR-localization
- Validadação PT-BR: https://github.com/LaravelLegends/pt-br-validator
- Gerenciamento de Permissões: https://spatie.be/
