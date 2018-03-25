# Galeria de Fotos

##Descrição
Sistema de galeria de fotos.

O sistema possibilita que o usuário:
* Cadastre novas fotos
* Visualize as fotos cadastradas em uma Galeria
* Visualize as fotos em uma lista onde também será possível fazer a exclusão de fotos cadastradas.

##Pré-requisito de Instalação
* [Git](https://git-scm.com/downloads)
* [Docker](https://docs.docker.com/install/)
* [Docker-Compose](https://docs.docker.com/compose/install/)

##Instalação do Projeto

1. Baixe o repositório como zip ou faça o clone do projeto.
2. Pelo terminal/prompt de comando acesse o diretório do projeto na raiz.
3. Para inicializar o servidor, execute pelo terminal o comando `docker-compose up -d`.
4. O sistema estará disponível em http://localhost

##Cobertura de testes

Para execução dos testes, execute pelo terminal o comando
docker exec -it galeria_php /bin/bash -c "vendor/bin/phpunit"
