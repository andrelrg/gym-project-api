# Projeto Estrutura de dados II UNESP - Bauru

## Instruções
Para Iniciar o projeto, é necessário inicialmente ter o docker instalado.
Depois disso será necessário contruir a imagem do php:
```docker build docker-php ```

Depois é dar deploy da stack que irá subir: nginx, php e mysql
```docker stack deploy -c docker-compose.yml es2```
