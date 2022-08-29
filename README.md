# Teste Plan Grupo

## Objetivo:

**Backend**

Crie uma pequena API para cadastro de eletrodomésticos contendo recursos para
criação, listagem, edição e remoção de registros. Um registro de eletrodoméstico deve
conter, pelo menos, as seguintes informações:

- Nome (Ex: Geladeira Frost Free)
- Descrição (Ex: Este produto é totalmente versátil. Tudo para ser
personalizado para comportar o que você preferir.)
- Tensão (Ex: 220v)
- Marca

Listagem das possíveis marcas:
- Electrolux
- Brastemp
- Fischer
- Samsung
- LG

**Frontend**

Crie uma pequena aplicação frontend para utilizar a API desenvolvida.

Pontos importantes:

- Exiba mensagens para orientar o usuário (erros, avisos e alertas).

Requisitos Técnicos:
- Utilizar um framework Javascript, preferencialmente VueJS, mas pode ser utilizado outro exemplo: ReactJS, AngularJS, entre outros.

----------

#### tecnologias utilizadas
- Composer
- Wamp server
- VsCode
- PHP 8
- laravel 9x
- npm (gerenciador de pacotes)
- Postman (programa externo para gerenciar API´s)
  
#### Bibliotecas / Packages
- Jetstream (laravel/jetstream) + Livewire
- tailwindcss 3x
- Bootstrap 5
- JWT (Json Web Token)

----------

## Instalação
Para instalação, irei partir do pressuposto que já tenha instalado e configurado o básico para rodar o PHP com o Laravel. Lembrando que eu utilizei as tecnologias ja citadas a cima.

1º Faça o clone desse repositório

2º Crie um Banco de Dados MySql (aqui eu utilizei o PHPMyAdmin para a criação).

3º Duplique o arquivo ".env.example" e renomeie para ".env".

4º Dentro do arquivo ".env" procure as configurações de Banco de Dados 

```
DB_CONNECTION=mysql
DB_HOST=[NOME DO SEU HOST]
DB_PORT=3306
DB_DATABASE=[NOME DO BANCO CRIADO NA ETAPA 2]
DB_USERNAME=[USUARIO DO BANCO] DB_PASSWORD=[SENHA DO BANCO]
```

5º Irá precisar gerar uma "APP_KEY", abra em um terminal/CMD/Shell e navegue até a Raiz desse projeto, onde se localiza o arquivo artisan e execute o seguinte comando
````
php artisan key:generate
````

6º Agora precisa rodar as migration e para o banco não vir vazio pode rodar o seguinte comando
````
php artisan migrate:fresh --seed
````

Esse comando irá criar as tabelas no DB e popular com algumas marcas e um usuário Admin.
````
Usuário: admin@plan.com.br
Senha: admin
````

7º Rode o comando:

````
npm run dev
````
esse comando, ficará rodando no terminal, executando o pacote "Vite", do laravel 9 para monitorar os recursos do projeto.

8º Por final basta rodar o servidor local do Laravel com o comando:
````
php artisan serve
````
Por padrão o servidor iniciará no endereço: [http://127.0.0.1:8000](http://127.0.0.1:8000)

Se tudo ocorreu bem é para estar vendo a página inicial do Teste. Tela de Login.

----------

> Caso de algum erro ao rodar o npm run dev tente executar os seguintes comando:
> ````
> npm run install
> npm run build
> npm run dev
> ````
> Talvez seja necessário rodar o caomando '**npm audit fix**' ou '**npm audit fix --force**'.

----------

<br>

## API

Para usar as endpoints da api, é necessário ter uma conta na plataforma. por padão, existe o usuário admin, criado na 6ª etapa da instalação.

> Para fins de teste da API foi utilizado o **POSTAN**.

Com o Postman aberto dentro de Workspace, crie uma nova Collection, ou simplesmete uma nova aba.

<br>

> ## **Com o servidor rodando, faça os teste da api.**

<br>

## <u>**Endpoins**</u>

<br>

Antes de testar todos os endpoints, não esqueça de se logar para gerar o Token de autorização do JWT.

Todos os endipoints possuiem uma url base que por estar localmente deve ser: 
````
URL_Base = http://127.0.0.1:8000
````

> Todas as respostas dos endpoints são Json
> portanto para cada endpoint é necessário colocar na aba Headers os seguintes KEY e Value
> | KEY | VALUE |
> |-----|-------|
> | Accept | application/json |

<br>

### **para se Logar utilize o seguinte endpoint:**

<br>

> **Method**: <u>POST</u>
> - ````
>   {{url_base}}/api/login
>   ````

Na aba Body->form-data, insira os segintes KEY e Value:

| Key | Value |
|-----|-------|
|email|admin@plan.com.br|
|password|admin|

Clique em "Send", caso de tudo certo, receberá como resposta um Json com o Token, semelhante a esse:
````
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjYxNzg1NjMzLCJleHAiOjE2NjE3ODkyMzMsIm5iZiI6MTY2MTc4NTYzMywianRpIjoiTkc4WVpiRW12TEZOeTNlYyIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Bx9bKs6pceLiLxPBwvdIDDdgrs3xQV7jeBNQblPysK0",
    "token_type": "bearer",
    "expires_in": 3600
}
````

<br>

Com o Token em mãos, nos endpoints que precisam de autorização, será necessário inserir na gia de "Autorization", selecione o Type: "Bearer Token" e insira o Token gerado.

### **Lista os Eletrodomésticos**

- Lista todos os eletrodomesticos.

> **Method**: <u>GET|HEAD</u>
> - ````
>   {{url_base}}/api/v1/eletrodomesticos
>   ````

<br>

### **Selecione um Eletrodoméstico**

- Seleciona um eletrodomestico com base no seu ID.

> **Method**: <u>GET|HEAD</u>
> - ````
>   {{url_base}}/api/v1/eletrodomesticos/ID
>   ````

<br>

### **Criar um Eletrodoméstico**

- Crie um novo eletrodomestico.

> **Method**: <u>POST</u>
> - ````
>   {{url_base}}/api/v1/eletrodomesticos
>   ````

Para a criação é necessário preencher os campos em Body->x-www-urlencoded com os seguintes KEY e VALUE

| KEY | VALUE |
|-----|-------|
| nome | Nome do Eletrodoméstico |
| descricao | Descrição do eletrodoméstico |
| tensao | 110v ou 220v |
| maraca_id | ID da Marca |
| preco | preço (campo string, pode preecher ponto e virgula) |
| cor | Cor (string, insira o nome da Cor) |


<br>

### **Editar um Eletrodoméstico**

- Edita um eletrodomestico com base em seu ID.

> **Method**: <u>PUT|PATCH</u>
> - ````
>   {{url_base}}/api/v1/eletrodomesticos/ID
>   ````

Para editar é necessário preencher os campos em Body->x-www-urlencoded com os seguintes KEY e VALUE

| KEY | VALUE |
|-----|-------|
| id | ID do eletrodomestico a ser editado |
| nome | Nome do Eletrodoméstico |
| descricao | Descrição do eletrodoméstico |
| tensao | 110v ou 220v |
| maraca_id | ID da Marca |
| preco | preço (campo string, pode preecher ponto e virgula) |
| cor | Cor (string, insira o nome da Cor) |

<br>

### **Deletar um Eletrodoméstico**

- Deleta um eletrodomestico com base em seu ID.

> **Method**: <u>DELETE</u>
> - ````
>   {{url_base}}/api/v1/eletrodomesticos/ID
>   ````

<br>

Obrigado!

Mateus Brandt
