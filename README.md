

# API persons

# Apresentação

Documentação para utilização da API Persons

# Autenticação

Não é preciso utilizar autenticação para fazer requisições a esta API.

# Error Codes

404 – Not Found

O servidor não pode encontrar o recurso solicitado. Este código de resposta talvez seja o mais famoso devido à frequência com que acontece na web.

406 – Forbidden

Sem autorização suficiente para acessar o recurso desejado

# Persons
Está pasta representa um objeto do tipo Usuário na API Persons

# GET
- Listar usuários

http://localhost/api-persons/api/persons

Lista todos os usuários da lista.

- Listar usuário pelo id

http://localhost/api-persons/api/persons/id

Buscar usuário pelo número do id.

Exemplo:

http://localhost/api-persons/api/persons/1

# POST

- Cadastrar usuários

http://localhost/api-persons/api/persons

Cadastra um usuário.

Bodyraw (json)
json
{
  "email": "Jurassic@gmail",
  "password": "1230004",
  "name": "Jurassic"
}

# PUT

- Editar usuário

http://localhost/api-persons/api/persons

Editar usuário pelo número do id.

Bodyraw (json)
json
{
  "id": "1",
  "email": "Jiraia@gmail",
  "password": "1230004",
  "name": "Jiraia"
}

# DEL

- Deletar usuário

http://localhost/api-persons/api/persons

Make things easier for your teammates with a complete request description.

Bodyraw (json)
json
{
  "id": "1"
}
