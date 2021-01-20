clear_cache:
	bin/cake cache clear_all
	sudo rm -R tmp/*
	sudo chmod -R 777 tmp

clear_project:
	sudo rm -rf vendor tmp logs node_modules \
			webroot/js/plugins/* \
			webroot/js/translations/* \
			composer.lock \
			package-lock.json

run_server:
	bin/cake server -p 5674

_models:
	sudo rm src/Model/Entity/*
	sudo rm src/Model/Table/*
	bin/cake bake model all -f
	sudo chmod -R 777 tmp

_snapshot:
	bin/cake bake migration_snapshot Initial --no-lock

_i18n:
	bin/cake i18n extract --extract-core yes

_migrations:
	bin/cake migrations migrate --no-lock

#make _maketable file=20150103081132
_migrate:
	bin/cake migrations migrate -t $(file)

#make _webpack env=dev
_webpack:
	npm run build-$(if $(env)=dev,dev,prd)

#make _schema model=Users
_schema:
	bin/cake bake migration Create$(model)

#make _seed_down model=Users
_seed_down:
	bin/cake bake seed --data $(model)

#make _seed_up model=Users
_seed_up:
	bin/cake migrations seed --seed $(model)Seed

up_initial:
	make _seed_up model=Users
	make _seed_up model=Groups
	make _seed_up model=GroupsCustomer
	make _seed_up model=UsersGroups
	make _seed_up model=UsersCustomer
	make _seed_up model=Permissions
	make _seed_up model=PermissionsGroups
	make _seed_up model=Customers
	make _seed_up model=Settings

down_initial:
	make _seed_down model=Users
	make _seed_down model=Groups
	make _seed_down model=GroupsCustomer
	make _seed_down model=UsersGroups
	make _seed_down model=UsersCustomer
	make _seed_down model=Permissions
	make _seed_down model=PermissionsGroups
	make _seed_down model=Customers
	make _seed_down model=Settings
