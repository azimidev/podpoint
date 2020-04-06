<p align="center">
    <img alt="Pod Point" height="150" src="../support/logo.png" title="Pod Point" width="498" />
</p>

# Back end Part

***

**Table of Contents**

* [API dev environment](#api-dev-environment)
    * [Accessing the database](#api-dev-environment--accessing-db)
* [The task](#the-task)
    * [Database](#the-task--db)
    * [API](#the-task--api)
    * [To do](#the-task--to-do)
    * [Bonus](#the-task--bonus) (optional)

***

<a id="api-dev-environment"></a>
## API dev environment

The API container reads from the `api` folder.

This is the section starting the API container in `bin/docker-run.sh` script:

```bash
docker run -d --name podpoint-api \
    -p 8000:80 \
    -w /var/www/html/ \
    -v ${API_BOOTSTRAP_SCRIPT_PATH}:/bin/dev-start-api.sh \
    -v ${PROJECT_DIR}/api:/var/www/html/ \
    -it fauria/lamp bash /bin/dev-start-api.sh
```

> ***Note: The start script `dev-start-api.sh` will run `composer install` to boot your project***

<a id="api-dev-environment--accessing-db"></a>
### Accessing the database

The API container will be able to connect to the database by using the following credentials:
* database name: `podpointapi`
* username: `podpointapi`
* password: `azertyuiop1234567890!`

<a id="the-task"></a>
## The task

<a id="the-task--db"></a>
### Database
* Create the database schema.
* Create `Charge` & `Unit` models.
* Inject some units in the database in order to be able to list something in the front end.

<a id="the-task--api"></a>
### API
The API has 4 routes in total.
You can see the details of each one in the [API docs](http://localhost:8001/).

You need to implement all of them in order to:
* handle the `start` of a charge on a unit.
* handle the `stop` of a charge on a unit.
* List all units.

> *You can update the unit status from `Available` to `Charging` when receiving a `start` or `stop` event.*

<a id="the-task--to-do"></a>
### To do

We’d like you to take this simple API, and:
* Supply all of your source files.
* Use MVC pattern.
* Follow coding standards & best practices.
* Make use of any framework (Laravel, Symfony...).
* Create needed models (e.g. `Charge` & `Unit`).

<a id="the-task--bonus"></a>
### Bonus (optional)

* Add some unit and/or functional tests to your implementation.
* Have a nice file structure and class/variable naming.
* Code is documented.

***

<p align="center">
    <a href="../README.md">
        Back to README
    </a>
</p>

***
