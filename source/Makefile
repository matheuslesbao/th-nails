# Variáveis de configuração
DOCKER_COMPOSE = docker-compose
DOCKER = docker
# Regras de compilação e execução
.PHONY: all show clean start stop restart

all: start

show-all:
	$(DOCKER) ps -a

show:
	$(DOCKER_COMPOSE) ps

log:
	$(DOCKER_COMPOSE) logs

start:
	$(DOCKER_COMPOSE) up -d

stop:
	$(DOCKER_COMPOSE) stop
down:
	$(DOCKER_COMPOSE) down
nginx:
	$(DOCKER) exec -it 1d6c5266c57d bash
db-docker:
	$(DOCKER_COMPOSE) exec mysql mysql -u alphard -p

restart: stop start

clean:
	$(DOCKER_COMPOSE) down --volumes --remove-orphans
