<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 API Template</h1>
    <br>
</p>

### Getting starter

```bash
# Init the application dev or prod
$ php yii init
# Generate tables in sqlite 
$ php run migrate
# Run the application
$ php yii serve --docroot="api/web/"
```

DIRECTORY STRUCTURE
-------------------

```
api
    assets/              contains application assets such as JavaScript and CSS
    config/              contains api configurations
    controllers/         contains Web controller classes
    models/              contains api-specific model classes
        definitions/     contains all swagger scheme definitions
    runtime/             contains files generated during runtime
    tests/               contains tests for api application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains api widgets
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in api
    tests/               contains tests for common classes    
    swagger/             contains swagger custom proccesors
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
