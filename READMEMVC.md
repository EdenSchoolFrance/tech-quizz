# Project Setup

## Steps to Start the Project

1. **Replace the names**
    Replace the following placeholders with your name:

    Replace `YOUR_NAME` in the following line in `public/index.php`
    ```html
    <title>— YOUR_NAME —</title>
    ```
   
    Replace `your_name` in the following line in `composer.json`
    ```json
    "name": "you_name/your_name",
    ```
   
    Replace `your_db_name` in the following line in `config/config.php`
    ```php
    define('DATABASE', 'your_db_name');
    ```

2. **Install Composer Dependencies**:
    Open a terminal and navigate to the project directory. Run the following command to install the required dependencies:
    ```sh
    composer install
    ```
   
3. **Run the server**:
    Run the following command to start the server:
    ```sh
    cd ./public
    
    php -S localhost:8000
    ```

