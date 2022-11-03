## Sobre esse projeto

O presente projeto se refere a um desafio para uma vaga, onde foi escolhido a linguagem PHP com o framework Laravel.

Link para a descricao do desafio: https://github.com/ByCodersTec/desafio-dev

## Como funciona

Basicamente e importado um arquivo txt com as informacoes necessarias para popular o banco de dados, apos a importacao
alem de popular o banco, o dashboard e atualizado mostrando o balanco e a soma dos valores positivos e negativos.

## O que fazer para o projeto funcionar

Recomendo ja ter baixado e instalado os seguintes links:
https://getcomposer.org/download/
https://www.php.net/downloads.php (caso nao saiba como instalar sugiro o seguinte link: https://blog.schoolofnet.com/como-instalar-o-php-no-windows-do-jeito-certo-e-usar-o-servidor-embutido/)
https://dev.mysql.com/downloads/installer/

Deixar criado uma base de banco de dados e guarde o nome desse banco criado.

Baixar o projeto e abrir ele no seu editor de arquivos (VsCode,PHPStorm,...) e alterar as informacoes do arquivo .env.example 
na parte do banco de dados (colocar o login, senha, o nome da database nova criada) e depois alterar o nome do arquivo para 
apenas .env e removendo assim a parte do .example

Abrir o terminal (cmd, powershell, ...) e abrir a pasta que baixou o arquivo, e rodar os seguintes comandos (cada linha e um):

composer install && npm install \n
php artisan migrate \n
npm run build \n
./vendor/bin/phpunit  (para ver se o teste unitario desenvolvido funciona, o teste tenta inserir infos no banco parecido de como vem no arquivo) \n
php artisan serve \n

e dar um crtl + click no link que aparecer (geralmente 127.0.0.1:8000)
