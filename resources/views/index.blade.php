<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .banner{
            height: calc(100vh - 82px);
            background-image: url(https://saudecaruaru.pe.gov.br/site/wp-content/uploads/2022/03/Adesivos-Mockup-1-980x450.png);
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>
</head>

<body>
    <main>
        <header class="bg-green-800 text-white shadow-lg mb-4">
            <nav class="flex flex-col md:flex-row justify-between items-center gap-3 px-2 md:px-12 py-4">
                <div class="flex justify-center items-center gap-4">
                    <span><img src="assets/img/logo_caruaru.png" alt="Logo InfoSaúde Caruaru" width="120"></span>
                    <span class="text-lg md:text-xl pl-4 font-semibold border-l-2 border-white -mt-1.5 hidden md:inline-block">Secretaria de Saúde de Caruaru</span>
                </div>

                <ul class="flex flex-col md:flex-row justify-center items-center gap-8 py-1 text-sm">
                    <li><a href="{{route('contacts.index')}}" class="hover:border-b border-white pb-1 transition-all ease-in-out duration-200">Contatos</a></li>
                    <li><a href="{{route('login')}}" class="hover:border-b border-white pb-1 transition-all duration-200">Login</a></li>
                </ul>
            </nav>
        </header>

        <section class="px-5">
            <div class="flex gap-10">
                <div class="flex-1">
                    <article class="banner">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus veniam provident aut sit tempora quae. Distinctio sed nihil, maxime ducimus libero, delectus tempore, repellendus commodi iusto et enim suscipit.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus veniam provident aut sit tempora quae. Distinctio sed nihil, maxime ducimus libero, delectus tempore, repellendus commodi iusto et enim suscipit.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus veniam provident aut sit tempora quae. Distinctio sed nihil, maxime ducimus libero, delectus tempore, repellendus commodi iusto et enim suscipit.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus veniam provident aut sit tempora quae. Distinctio sed nihil, maxime ducimus libero, delectus tempore, repellendus commodi iusto et enim suscipit.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus veniam provident aut sit tempora quae. Distinctio sed nihil, maxime ducimus libero, delectus tempore, repellendus commodi iusto et enim suscipit.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus veniam provident aut sit tempora quae. Distinctio sed nihil, maxime ducimus libero, delectus tempore, repellendus commodi iusto et enim suscipit.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus veniam provident aut sit tempora quae. Distinctio sed nihil, maxime ducimus libero, delectus tempore, repellendus commodi iusto et enim suscipit.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus veniam provident aut sit tempora quae. Distinctio sed nihil, maxime ducimus libero, delectus tempore, repellendus commodi iusto et enim suscipit.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus veniam provident aut sit tempora quae. Distinctio sed nihil, maxime ducimus libero, delectus tempore, repellendus commodi iusto et enim suscipit.
                    </article>
                </div>
                <div class="flex flex-col w-40">
                    <article class="w-full">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quae quidem autem ipsa, tenetur omnis! Voluptas nihil suscipit quaerat saepe error, maxime amet voluptatum ullam odio soluta tempora fugiat temporibus?
                    </article>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
