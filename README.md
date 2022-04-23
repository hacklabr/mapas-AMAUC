# Mapas Culturais da AMAUC
Este é o repositório do ambiente do Mapas Culturais da AMAUC

## Estrutura de arquivos
- **compose**
    - **common** - arquivos comuns dos ambientes de desenvolvimento e produção
    - **local** - arquivos exclusivamente para o ambiente de desenvolvimento
    - **production** - arquivos exclusivamente para o ambiente de produção
- **dev-scripts** - scripts auxiliares para o desenvolvimento
    - **start-dev.sh** - script que inicializa o ambiente de desenvolvimento
    - **bash.sh** - entra no container da aplicação
    - **shell.sh** - entra no shell do mapas culturais
    - **psql.sh** - entra no banco de dados da aplicação
    - **docker-compose.local.yml** - arquivo de definição do docker-compose utilizado pelos scripts acima
- **plugins** - pasta com os plugins desenvolvidos exclusivamente para o projeto
    - **SamplePlugin** - esqueleto de plugin para demostração e para servir de base para o desenvolvimento de outros plugins
- **themes** - pasta com os temas desenvolvidos exclusivaente para o projeto
    - **SampleTheme** - esqueleto de tema filho de Subsite para demostração e para servir de base para o desenvolvimento de outros temas

### Ambiente de desenvolvimento

#### Iniciando o ambiente de desenvolvimento
Para subir o ambiente de desenvolvimento basta entrar na pasta `dev-scripts` e rodar o script `start-dev.sh`.

```
mapas-AMAUC/dev-scripts/$ sudo ./start-dev.sh
```

acesse no seu navegador http://localhost/

#### psysh
Este ambiente roda com o built-in web server do PHP, o que possibilita que seja utilizado o [PsySH](https://psysh.org/]), um console interativo para debug e desenvolvimento. 

no lugar desejado, adicione a linha `eval(\psy\sh());` e você obterá um console. `Ctrl + D` para continuar a execução do código.

#### Parando o ambiente de desenvolvimento
Para parar o ambiente de desenvolvimento usar as teclas `Ctrl + C`

#### Usuário super administrador da rede
O banco de dados inicial inclui um usuário de role `saasSuperAdmin` de **id** `1` e **email** `Admin@local`.
Este usuário possui permissão de criar, modificar e deletar qualquer objeto do banco.

- **email**: `Admin@local`
- **senha**: `mapas123`