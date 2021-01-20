## Configuração

Altere o arquivo `config/app.php` no índice `'Datasources'` com as configurações de acesso do banco de dados

## Instalação

1º Se o Composer estiver instalado globalmente execute:

```bash
composer install
```

2º Executar o migrate

```bash
bin/cake migrations migrate --no-lock
```

3º Registrar valores default na tabela pedido_status

```bash
bin/cake migrations seed --seed PedidoStatusSeed
```

4º Criar modelos e entidades

```bash
bin/cake bake model all -f
```

## Execução

```bash
bin/cake server -p 8765
```

Então visite `http://localhost:8765`
