# Equip

Equip is a PSR-7 compliant [Action Domain Responder](https://github.com/pmjones/adr)
(ADR) system. While it may look like a micro-framework (and it is), it is more like a
wrapper around the real logic of your application domain. It's also [PSR-1](http://www.php-fig.org/psr/psr-1/),
[PSR-2](http://www.php-fig.org/psr/psr-2/), and [PSR-4](http://www.php-fig.org/psr/psr-4/) compliant.

Check out the source project [here](http://github.com/equip/framework).

## Installing Equip

You will need [Composer](https://getcomposer.org) to install Equip.

Pick a project name, and use Composer to create it with Equip. Let's create
one called `equip-project`:

```bash
composer create-project -s dev equip/project equip-project
```

Confirm the installation by changing into the project directory and starting a
development web server:

```bash
cd equip-project
bin/serve
```

You can then browse to <http://localhost:8000/hello> and see JSON output:

```json
{"hello": "world"}
```

You can also browse to <http://localhost:8000/hello/nancy> and see modified JSON output:

```json
{"hello":"nancy"}
```
