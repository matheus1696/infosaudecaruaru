# InfoSaúde Caruaru - Sistema de Gestão Interna

## Apresentação

Apresentamos ao sistema de infomação da saúde de caruaru, uma solução abrangente de gestão interna projetada sob medida para atender às exigências dos órgãos públicos, com foco inicial no setor de Tecnologia da Informação e Comunicação (TIC).

Com uma estrutura modular cuidadosamente elaborada, nosso sistema oferece uma gama de recursos avançados para o eficiente gerenciamento de diversos departamentos. Incorporando tecnologia de ponta no desenvolvimento de software e um robusto gerenciador de banco de dados, garantimos segurança e estabilidade excepcionais, assegurando uma solução de gerenciamento confiável e duradoura.

Nosso compromisso é proporcionar o que há de melhor em termos de tecnologia e funcionalidades, adaptando-nos às demandas específicas dos órgãos públicos. Buscamos oferecer uma solução completa e eficaz para o gerenciamento interno, promovendo eficiência e resultados positivos.

Conte conosco para otimizar os processos de sua organização e assegurar um controle interno efetivo. Estamos aqui para fornecer suporte e orientação, rumo ao sucesso de sua instituição.

## Módulos

### Módulo de Gerenciamento de Controle de Acesso do Sistema

O módulo de controle de acesso do nosso sistema é cuidadosamente projetado para proporcionar facilidade e segurança aos usuários. Ele permite que cada indivíduo crie seu próprio perfil, utilizando o endereço de e-mail como identificador para acessar o sistema.

Priorizando a segurança, implementamos verificações de conta para o acesso às páginas e para a recuperação de senha. Essas etapas adicionais são acionadas pelo próprio usuário, garantindo um nível adicional de proteção.

Além disso, o módulo oferece uma gama abrangente de recursos, incluindo o gerenciamento de estabelecimentos, organograma e criação de logs. Essas funcionalidades são fundamentais para o controle e organização eficiente dos processos.

Por padrão, incluímos algumas permissões predefinidas:

- sysadmin: Permissão de administrador do sistema

- admin: Permissão de administrador

- user: Permissão de usuário

Essas permissões oferecem uma estrutura sólida para o controle de acesso e garantem que cada usuário tenha as autorizações apropriadas para realizar suas tarefas de maneira eficaz.

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
