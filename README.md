# Gcode Laravel Case Study

## Installation

1. Clone the repository

```bash
  git clone https://github.com/muammertopcu/gcode-case-study.git
```

2. Change the working directory

```bash
  cd gcode-case-study
```

3. Install dependencies

```bash
  composer install
```

4. Install NPM dependencies

```bash
  npm install
```

5. Build assets

```bash
  npm run build
```

6. Create a copy of the .env file

```bash
  cp .env.example .env
```

7. Generate an app encryption key

```bash
  php artisan key:generate
```

8. Create an empty database for our application
9. In the .env file, add database information to allow Laravel to connect to the database
10. Migrate the database

```bash
  php artisan migrate
```

11. Seed the database

```bash
  php artisan db:seed
```

12. Start the local development server

```bash
  php artisan serve
```

13. You can now access the server at http://localhost:8000

14. Visit http://localhost:8000/login and login with the following credentials:

```text
  email: test@example.com
  password: password
```
