# 🕯️ Altar Oculto - Loja de Umbanda

![Status do Projeto](https://img.shields.io/badge/status-em%20desenvolvimento-yellow)
![Laravel](https://img.shields.io/badge/Laravel-11.x-red)
![PHP](https://img.shields.io/badge/PHP-8.2+-purple)
![MySQL](https://img.shields.io/badge/MySQL-Database-blue)
![License](https://img.shields.io/badge/license-MIT-green)

---

# 📋 Sobre o Projeto

O **Altar Oculto** é um sistema de e-commerce desenvolvido para a disciplina de **Desenvolvimento de Aplicações Web** do **IFSC - Câmpus Chapecó**.

O projeto consiste em uma loja virtual especializada em artigos espirituais, com foco em produtos relacionados à **Umbanda e religiões de matriz africana**, permitindo a visualização de categorias, produtos, informações espirituais e realização de encomendas.

O sistema foi desenvolvido utilizando:

- Laravel 11
- PHP 8.2+
- MySQL
- Blade
- Eloquent ORM
- MVC
- Bootstrap

---

# 🖼️ Telas do Sistema

## 🏠 Página Inicial

Tela principal da loja com apresentação dos produtos e categorias.

![Tela Inicial](assets/imagens/tela_inicial.png)


---

## 🕯️ Categorias

Exibição das categorias espirituais cadastradas no sistema.

![Tela Categorias](assets/imagens/tela_categorias.png)


---

# 👤 Credenciais de Acesso

## Administrador

Acesso ao gerenciamento do sistema:

- Produtos
- Categorias
- Usuários
- Encomendas
- Relatórios


```
E-mail:
admin@site.com

Senha:
admin123
```


---

## Cliente

Usuário comum para realizar compras:

```
E-mail:
cliente@site.com

Senha:
password
```

---

# 🚀 Funcionalidades

## 🛍️ Produtos

- Cadastro de produtos
- Categorias relacionadas
- Controle de estoque
- Imagens
- Preços
- Tags
- Produtos populares


---

## 🕯️ Categorias

Cada categoria possui informações detalhadas:

- Nome
- Descrição
- História
- Linha espiritual
- Cores
- Dia da semana
- Símbolos
- Elementos
- Datas importantes
- Observações


---

## 🛒 Encomendas

Sistema de pedidos contendo:

- Cliente responsável
- Produtos
- Valor total
- Status
- Observações
- Dados de entrega


Status disponíveis:

```
pendente
enviado
concluido
```

---

## 👥 Usuários

Sistema possui usuários cadastrados com:

- Nome
- Email
- Senha
- Imagem
- Tipo de usuário

Tipos:

```
Administrador
Cliente
Fornecedor
```

---

# 🗄️ Estrutura do Banco

Principais tabelas:

```
usuarios
categorias
produtos
encomendas
sessions
fornecedor_produto
pontos
```

Relacionamentos:

```
Categoria
   |
   | 1:N
   |
Produtos


Usuário
   |
   | 1:N
   |
Encomendas


Fornecedor
   |
   | N:N
   |
Produtos
```

---

# 🛠️ Tecnologias Utilizadas

## Backend

- PHP 8.2+
- Laravel 11
- Eloquent ORM
- MySQL


## Frontend

- Blade
- HTML5
- CSS3
- Bootstrap
- JavaScript


## Ferramentas

- Composer
- NPM
- Git
- GitHub
- Visual Studio Code

---

# 📥 Como Executar o Projeto

## Pré-requisitos

Instale:

- PHP 8.2+
- Composer
- Node.js
- MySQL
- Git


Recomendado:

- Laravel Herd
- Laragon
- XAMPP


---

# 1️⃣ Clonar o projeto

Execute:

```bash
git clone https://github.com/Ravemuon/altar-oculto-laravel.git
```

Entre na pasta:

```bash
cd altar-oculto-laravel
```

---

# 2️⃣ Instalar dependências PHP

Execute:

```bash
composer install
```

---

# 3️⃣ Instalar dependências Front-end

Execute:

```bash
npm install
```

---

# 4️⃣ Criar arquivo de configuração

Copie o arquivo:

```bash
cp .env.example .env
```

No Windows:

```bash
copy .env.example .env
```

---

# 5️⃣ Gerar chave Laravel

Execute:

```bash
php artisan key:generate
```

---

# 6️⃣ Configurar Banco de Dados

Abra o arquivo:

```
.env
```

Configure:

```env
DB_DATABASE=altar_oculto
DB_USERNAME=root
DB_PASSWORD=
```

Crie o banco:

```
altar_oculto
```

no MySQL.

---

# 7️⃣ Executar migrations

Criar todas as tabelas:

```bash
php artisan migrate
```

---

# 8️⃣ Popular banco com dados iniciais

Executar os seeders:

```bash
php artisan db:seed
```

ou:

```bash
php artisan migrate:fresh --seed
```

Isso cria:

- Categorias
- Produtos
- Usuários
- Encomendas
- Pontos


---

# 9️⃣ Executar projeto

Inicie o Laravel:

```bash
php artisan serve
```

O sistema estará disponível em:

```
http://127.0.0.1:8000
```

---

# Front-end em desenvolvimento

Caso altere arquivos CSS ou JavaScript:

Execute:

```bash
npm run dev
```

---

# 📂 Estrutura do Projeto

```
altar_oculto/

├── app/
│   ├── Models/
│   ├── Controllers/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
│
├── public/
│
├── assets/
│   └── imagens/
│       ├── tela_inicial.png
│       └── tela_categorias.png
│
├── routes/
│   └── web.php
│
└── README.md
```

---

# 📌 Comandos Úteis

Limpar cache:

```bash
php artisan optimize:clear
```


Ver rotas:

```bash
php artisan route:list
```


Criar migration:

```bash
php artisan make:migration nome_da_migration
```


Criar model:

```bash
php artisan make:model Nome
```


Criar controller:

```bash
php artisan make:controller NomeController
```

---

# 📜 Licença

Este projeto está sob licença MIT.

---

# 👨‍💻 Desenvolvimento

Projeto acadêmico desenvolvido para o:

**IFSC - Instituto Federal de Santa Catarina  
Câmpus Chapecó**

Disciplina:

**Desenvolvimento de Aplicações Web**