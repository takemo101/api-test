default: help

## バックエンドアプリケーションのパス
BACKEND_PATH = backend

#### other ####
.PHONY: setup
setup: ## コマンド実行に必要なセットアップをする
	cd ${BACKEND_PATH} && make setup

.PHONY: help
help: ## ヘルプの表示をする
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

#### for laravel composer ####
.PHONY: start
start: ## sailのdockerコンテナを起動する
	cd ${BACKEND_PATH} && make start

.PHONY: stop
stop: ## sailのdockerコンテナを停止する
	cd ${BACKEND_PATH} && make stop

.PHONY: shell
shell: ## sailのdockerコンテナのシェルを起動する
	cd ${BACKEND_PATH} && make shell

.PHONY: test
test: ## sailでテストコードを実行する [filter=class-name]
ifdef filter
	cd ${BACKEND_PATH} && make test filter=${filter}
else
	cd ${BACKEND_PATH} && make test
endif

.PHONY: install
install: ## パッケージをインストールする（--ignore-platform-reqsは非推奨だがインストールのみと言うことで目をつぶる）
	docker compose run --rm composer install --ignore-platform-reqs

.PHONY: update
update: ## パッケージをアップデートする
	docker compose run --rm composer update --ignore-platform-reqs

.PHONY: autoload
autoload: ## パッケージのオートロードをする
	docker compose run --rm composer dump-autoload

.PHONY: require
require: ## 新しいパッケージを追加する [option=composer-option] [package=composer-package]
ifdef package
	docker compose run --rm composer require ${option} ${package}
else
	@echo "error: Please set the [package] variable!"
endif

.PHONY: remove
remove: ## 既存パッケージを削除する [option=composer-option] [package=composer-package]
ifdef package
	docker compose run --rm composer remove ${option} ${package}
else
	@echo "error: Please set the [package] variable!"
endif

#### for standalone php ####
.PHONY: php-start
php-start: ## スタンドアロンのphpコンテナを起動する
	docker compose up -d php

.PHONY: php-stop
php-stop: ## スタンドアロンのphpコンテナを停止する
	docker compose down

.PHONY: php-shell
php-shell: ## スタンドアロンのphpコンテナのシェルを起動する
	docker compose exec php bash
