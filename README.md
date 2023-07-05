# Sistema de gerenciamento de produtos

Um cliente nos pediu para criar um sistema de gerenciamento de produtos. O sistema deve permitir usuários
cadastrarem seus produtos. Um usuário só pode ter acessso aos produtos que ele cadastrou, ou seja,
um usuário não pode ver os produtos que outro usuário cadastrou. O sistema deve ter um endpoint
que mostre todos os produtos cadastrados do sistema. O sistema também deve ter um endpoint
que mostre os produtos que um usuário cadastrou.

## Pré-requisitos

Antes de começar, certifique-se de ter os seguintes requisitos instalados em sua máquina:

- PHP (versão 8.1 ou superior)
- Composer

Observações: Vamos utilizar o banco de dados SQLite para este projeto.

## Instalação

Siga os passos abaixo para configurar e executar o projeto:

1. Clone o repositório: 

    ```bash
    git clone https://github.com/Rapha2013/sistema-de-gerenciamento-de-produtos.git
    ```

2. Instale as dependências do Composer:

    ```bash
    composer install
    ```

3. Configure o arquivo .env: 

    ```bash
    Faça uma cópia do arquivo .env.example e renomeie-o para .env.
    ```

4. Gere uma nova chave de aplicativo:

    ```bash
    php artisan key:generate
    ```

4. Execute as migrações do banco de dados:

    ```bash
    php artisan migrate
    ```

5. Execute as sementes (seeds):

    ```bash
    php artisan db:seed
    ```

6. Inicie o servidor de desenvolvimento: 
   
    ```bash
    php artisan serve
    ```

O servidor será executado em http://localhost:8000. Você pode acessar o aplicativo em seu navegador.


## APIS

- GET /api/produtos  que retorne a lista de produtos em JSON.
- GET /api/usuarios/{usuario}  que retorne um usuário junto da lista de produtos de um usuário em JSON.


Exemplo:
- GET /api/produtos
```bash
[
    {
        "id": 1,
        "nome": "Refrigerante Cola",
        "valor": 10.00,
        "categoria": {
            "id": 1,
            "nome": "Bebidas"
        },
        "usuario": {
            "id": 1,
            "nome": "Fulano da Silva"
        }
    },
    {
        "id": 2,
        "nome": "Salgadinho",
        "valor": 2.5,
        "categoria": {
            "id": 2,
            "nome": "Alimentos"
        },
        "usuario": {
            "id": 1,
            "nome": "Fulano da Silva"
        }
    },
    {
        "id": 3,
        "nome": "Farinha de Trigo",
        "valor": 30.00,
        "categoria": {
            "id": 2,
            "nome": "Alimentos"
        },
        "usuario": {
            "id": 2,
            "nome": "Ciclano dos Santos"
        }
    }
]
```

- GET /api/usuario/2/produtos
```bash
{
    "usuario": {
        "id": 2,
        "nome": "Ciclano dos Santos"
        "produtos": [
            {
                "id": 3,
                "nome": "Farinha de Trigo",
                "valor": 30.00,
                "categoria": {
                    "id": 2,
                    "nome": "Alimentos"
                }
            }
        ]
    }
}
```