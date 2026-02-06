# LG Desafio Técnico

O objetivo desse projeto é criar uma aplicação Laravel simples que exiba, em um Dashboard, a eficiência de produção da Planta A, permitindo visualizar:
- Todas as linhas juntas.
- Uma linha específica (filtro por linha de produção).

## Requisitos do sistema

- **Docker** instalada e configurada
- **Composer** instalado e configurado

---

## Instruções para rodar o projeto

### Instale as dependências
```bash
composer install
```

### Crie o arquivo .env

**Linha de comando**:
```bash
cp .env.example .env
```

**Outra opção**: 
- Crie um arquivo .env
- Copie os dados do arquivo .env.example
- Cole os dados no arquivo .env (criado na etapa anterior)
- Salve as alterações

### Suba os serviços da docker
```bash
docker compose up --build
```

### Rode as migrações com seed
```bash
php artisan migrate --seed
```

### Rode o projeto
```bash
php artisan serve
```

### Acesse o endereço do projeto
```bash
http://localhost:8000/productivities
```


### (OPCIONAL) Execute os teste automatizados
```bash
vendor/bin/phpunit
```
---

## Informações do projeto

### Considerações iniciais

- A fórmula de efetividade foi ajustada.
  - No desafio, ela estava anotada como: ```efetividade = ( produzida / defeitos ) ```
    - Isso levaria a problemas quando um produto não possuísse defeitos (divisão por zero)
  - Foi alterada para: ```efetividade = (( produzidas - defeitos ) / produzidas) ```
- O projeto segue os princípios do SOLID.
  - Mantendo o projeto o mais desacoplado possível.
- O projeto foi desenvolvido seguindo o TDD.
  - Então todas as entidades, serviços e casos de usos estão testados.
  - Os testes podem ser localizados em: ```test/Unit```

### Entidade Productivity
  
#### Dados

| Coluna    | Tipo              | Descrição                                                   |
|-----------|-------------------|-------------------------------------------------------------|
| id        | string            | Valor primário utilizado para identificar cada registro.    |
| product   | string            | Nome de um produto.                                         |
| produced  | int               | Quantidade de unidades produzidas de um produto.            |
| defects   | int               | Quantidade de unidades defeituosas de um produto.           |
| createdAt | DateTimeImmutable | Data de criação do registro.                                |
| updatedAt | DateTimeImmutable | Data da última atualização do registro.                     |


### Regras de negócio

- **id** não pode ser vazio
- **product** não pode ser vazio
- **produced** não pode ter valor negativo
- **defects**: não pode ter valor negativo
- A quantidade de produtos defeituosos não pode superior a quantidade de produtos produzidos.

### Estrutura

- O projeto foi desenvolvido seguindo o padrão: Domain, Application e Infra.
- A comunicação com o banco de dados se dá através dos repositórios.
- Domain:
  - Contém todas as regras de negócio.
  - Validações
  - Entidades
  - Tipos
  - Repositórios
- Application:
  - Contém ações disponíveis na plataforma
  - Casos de uso
  - Serviços
- Infra:
  - Contém implementações externas a plataforma.
  - Repositórios (in-memory / reais).
  
## Melhorias futuras

- Adicionar testes E2E.
- Adicionar uma tabela de produtos.
- Relacionar a tabela de produtos com o tabela "Productivities" já existente.
- Adicionar value objects como forma de validação em parâmetros de entidades. Como, por exemplo, ids.
- Adicionar opção de inserção de dados no front-end (caso de uso já desenvolvido).
- Adicionar opção de remoção de dados.
- Adicionar modais.
- Adicionar mais animações front-end.