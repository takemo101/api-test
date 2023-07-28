default: help

## MySQLのデータを格納するディレクトリパス
MYSQL_DATA_PATH = sail-mysql

## カレント
CURRENT := $(shell pwd)

#### other ####
.PHONY: setup
setup: ## コマンド実行に必要なセットアップをする
	cp .env.example .env

.PHONY: help
help: ## ヘルプの表示をする
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

#### for sail ####
.PHONY: start
start: ## sailのdockerコンテナを起動する
	./vendor/bin/sail up -d

.PHONY: stop
stop: ## sailのdockerコンテナを停止する
	./vendor/bin/sail down

.PHONY: shell ## sailのdockerコンテナのシェルを起動する
shell:
	./vendor/bin/sail shell

.PHONY: install ## sailでcomposerのインストールを実行する
install:
	./vendor/bin/sail composer install --ignore-platform-reqs

.PHONY: autoload
autoload: ## sailでcomposerのdump-autoloadを実行する
	./vendor/bin/sail composer dump-autoload

.PHONY: test
test: ## sailでテストコードを実行する [filter=class-name]
ifdef filter
	./vendor/bin/sail test --coverage-text --filter ${filter}
else
	./vendor/bin/sail test --coverage-text
endif
