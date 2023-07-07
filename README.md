# Core-plan-marketing

## Instalação
1. Clone o repositório do projeto:
   ```shell
   git clone https://github.com/paulovitorw1/core-plan-marketing.git
   ```
2. Instale as dependências do projeto:
   ```shell
    composer install
   ```
3. Copie o arquivo de configuração .env:
     ```shell
        cp .env.example .env
      ```
4. Configure o arquivo .env com as informações do banco de dados e outras configurações:
     ```shell
    sed -i 's/DB_DATABASE=.*/DB_DATABASE=seu_banco_de_dados/' .env
    sed -i 's/DB_USERNAME=.*/DB_USERNAME=seu_usuario/' .env
    sed -i 's/DB_PASSWORD=.*/DB_PASSWORD=sua_senha/' .env
      ```
5. Gere a chave da aplicação:
    ```shell
    php artisan key:generate
    ```
6. Crie o banco de dados no servidor de banco de dados.

7. Execute as migrações para criar as tabelas no banco de dados:
    ```shell
    php artisan migrate
    ```
8. Execute os seeders para popular o banco de dados com dados:
    ```shell
    php artisan db:seed --class=DatabaseSeeder
    ```
  
  ## Executando o projeto
1. Inicie o servidor de desenvolvimento do Laravel na porta: 7667:
     ```shell
    php artisan serve --port=7667 
    ```
2. Acesse o projeto no navegador através do endereço http://localhost:7667:

# Documentação da API de Produtos

## Obter lista de produtos
Endpoint: `GET /api/product`
Este endpoint é usado para obter a lista de produtos.
### Entrada
Não são necessários parâmetros de entrada além do método GET.
### Retorno
Exemplo de retorno:
```json
{
  "data": [
    {
      "id": "53564aa3-8ca8-48c6-aa73-03e8d6084d74",
      "name": "Geladeira",
      "description": "Este produto é totalmente versátil. Tudo para ser
        personalizado para comportar o que você preferir.",
      "voltage": "220V",
      "productBrand": "Electrolux"
    },
    // Outros produtos...
  ],
  	"response": {
		"success": true,
		"message": "Product successfully listed"
	}
}
```
## Criar um novo produto

Endpoint: `POST /api/product`

Este endpoint é usado para criar um novo produto.

### Entrada

Os dados de entrada devem ser enviados no corpo da requisição no formato JSON.

Exemplo de corpo da requisição:

```json
{
  "name": "Nome do Produto",
  "productBrand": "Marca do Produto",
  "description": "Descrição do Produto",
  "voltage": "Voltagem do Produto",
  "imageProduct": "<arquivo de imagem>"
}
```
### Retorno

O retorno será um objeto JSON que representa o produto recém-criado. Por exemplo:

```json
{
  "data": {
    "id": "b3f1c855-db1d-4d9e-9fbf-cadd449fb385",
    "name": "Paulo Vitor",
    "product_brand_id": "3f64a5f6-a63d-499e-8627-d76907e5c3a5",
    "description": "dadasd131231231",
    "voltage": "220V",
    "url_image_product": "b9464a12-e2be-421e-ba94-264d76055bef.png",
    "updated_at": "2023-07-07T16:24:58.000000Z",
    "created_at": "2023-07-07T16:24:58.000000Z"
  },
  "response": {
    "success": true,
    "message": "Products successfully created"
  }
}
```
### Obter detalhes de um produto

Endpoint: `GET /api/product/{id}/edit`

Este endpoint é usado para obter os detalhes de um produto específico com o ID especificado.

### Parâmetros de URL

- `id` (obrigatório): ID do produto a ser obtido.

### Retorno

O retorno será um objeto JSON que representa os detalhes do produto. Por exemplo:

```json
{
  "data": {
    "id": "26569ab4-1878-4cb8-a8bf-45de4381bae4",
    "name": "Paulo Vitor",
    "description": "dadasd131231231",
    "voltage": "qweqweqweqweq",
    "productBrand": {
      "id": "3f64a5f6-a63d-499e-8627-d76907e5c3a5",
      "name": "Electrolux"
    }
  },
  "response": {
    "success": true,
    "message": "Produtos listado com sucesso."
  }
}
```
### Atualizar um produto existente

Endpoint: `PATCH|PUT /api/product/{id}`

Este endpoint é usado para atualizar um produto existente com o ID especificado.

### Parâmetros de URL

- `id` (obrigatório): ID do produto a ser atualizado.

### Entrada

Os dados de entrada devem ser enviados no corpo da requisição no formato JSON.

Exemplo de corpo da requisição:

```json
{
  "id:"b3f1c855-db1d-4d9e-9fbf-cadd449fb385"
  "name": "Nome do Produto",
  "productBrand": "3f64a5f6-a63d-499e-8627-d76907e5c3a5",
  "description": "Descrição do Produto",
  "voltage": "Voltagem do Produto",
  "imageProduct": "<arquivo de imagem>",
  "imageProductURL": "URL da imagem registrada"
}
```
### Retorno

O retorno será um objeto JSON que representa o produto atualizado. Por exemplo:

```json
{
  "data": {
    "id": "b3f1c855-db1d-4d9e-9fbf-cadd449fb385",
    "name": "Paulo VItor",
    "productBrand": "3f64a5f6-a63d-499e-8627-d76907e5c3a5",
    "description": "Descrição do Produto",
    "voltage": "Voltagem do Produto",
    "url_image_product": "b9464a12-e2be-421e-ba94-264d76055bef.png",
  },
  "response": {
    "success": true,
    "message": "Produtos listado com sucesso."
  }
}
```
### Excluir um produto

Endpoint: `DELETE /api/product/{id}`

Este endpoint é usado para excluir um produto com o ID especificado.

### Parâmetros de URL

- `id` (obrigatório): ID do produto a ser excluído.

### Retorno

O retorno será um objeto JSON indicando se a exclusão foi bem-sucedida. Por exemplo:

```json
{
  "data": true,
  "response": {
    "success": true,
    "message": "Produto excluído com sucesso."
  }
}
```
### Obter marcas de produtos

Endpoint: `GET /api/brand`

Este endpoint é usado para obter a lista de marcas de produtos disponíveis.

### Retorno

O retorno será um objeto JSON que contém uma chave `"data"` com uma lista de marcas de produtos. Por exemplo:

```json
{
  "data": [
    {
      "id": "14b7ce57-039a-44c0-95a0-9abfdfef495c",
      "name": "Brastemp",
      "created_at": "2023-07-06T03:22:08.000000Z",
      "updated_at": "2023-07-06T03:22:08.000000Z"
    }
  ],
  "response": {
    "success": true,
    "message": "Product successfully listed"
  }
}
