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

### Rode o projeto
```bash
php artisan serve
```

### Acesse o endereço do projeto
```bash
http://localhost:8000
```

---



