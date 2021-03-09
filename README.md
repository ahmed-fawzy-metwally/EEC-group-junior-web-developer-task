# EEC-group-junior-web-developer-task

## installation
1. Clone repository

    ```
        1.1-git clone https://github.com/ahmed-fawzy-metwally/EEC-group-junior-web-developer-task
        1.2- cd project-directory 
        1.3- composer install
        1.4- npm install
        1.5- cp .env.example .env
        1.6- php artisan key:generate
    ```
2. Database 
    
    2.1 Create database in DBMS via this query
    ``` sql
        create database `eec-task`;
    ```
    2.2 Database Configuration in .env file in application root
    ``` 
        DB_DATABASE=eec-task
        DB_USERNAME=
        DB_PASSWORD=
        Put your database user after DB_USERNAME, and your user password after DB_PASSWORD
    ```
    2.3 Migration
    ``` 
        php artisan migrate

    ```
    2.4 Seed data
    ```
        php artisan db:seed
    ```


---
## Contributing

[Ahmed Fawzy](https://github.com/ahmed-fawzy-metwally)
I encourage you to contribute to Invoice task . 

**First off, thanks for taking the time to contribute.**

When contributing to this repository, please first discuss the change you wish to make via issue. 
with the owners of this repository before making a change.
---
## Contributing Guidelines

1. **Create** a new issue discussing what changes you are going to make.
2. **Fork** the repository to your own Github account.
3. **Clone** the project to your own machine.
4. **Create** a branch locally with a succinct but descriptive name.
5. **Commit** Changes to the branch.
6. **Follow** any formatting and testing guidelines specific to this repo.
7. **Push** changes to your fork.
8. **Open** a Pull Request in 
---
## License

 Invoice task Copyright © 2021 Ahmed Fawzy. It is a free software and redistributed under under the [MIT license](https://opensource.org/licenses/MIT).

