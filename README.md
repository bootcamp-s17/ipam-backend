# IPAM - Backend

## Things on our checklist:

(1) User Access(layers)
(2) RESTful API info
	-Amason Web Services
	-Controller/model/view architecture
	-Testing & Error Codes
(3) Data Structure for tables
(4) Data validation
(5) Data Storage format
(6) Git branching


## Running Backend on Port 7000
php artisan serve --port=7000

# IPAM - Backend instructions.

- Clone repository to you computer
- Change Directory into ipam-backend and open it in Sublime, or editor of choice
- $ createdb ipam_back 
- $ psql ipam_back
- $ CREATE USER ipam_back WITH PASSWORD 'ipam_back';
- Set up database connections. 
	- Open .env.example and copy it's contents.
	- In the terminal create .env file, `$ touch .env`
	- Open in .env in sublime and paste contents.  
	- Configure the following fields as follows:
	- ```DB_CONNECTION=pgsql
		DB_HOST=127.0.0.1
		DB_PORT=5432
		DB_DATABASE=ipam_back
		DB_USERNAME=ipam_back
		DB_PASSWORD=ipam_back
- Install dependencies via composer `$ composer update`
- Generate APP_KEY by typing `$ php artisan key:generate`
- `$ npm install` to install dependencies from package.json
- `$ php artisan migrate` - to create the tables in our database
- `$ php artisan db:seed` - seeds the tables in our database

## API Endpoints

### Sites

- `sites/` - (GET) returns all of the site information for dashboard view
- `sites/{sites}` - (GET) returns detailed information for a specific site
- `sites/` - (POST) adds a site to the database
- `sites/{sites}` - (PUT) edits a specific site in the database
- `sites/{sites}` - (DELETE) removes a specific site from the database

### Subnets

- `subnets/` - (GET) returns all of the subnet information for dashboard view
- `subnets/{subnets}` - (GET) returns detailed information for a specific subnet
- `subnets/` - (POST) adds a subnet to the database
- `subnets/{subnets}` - (PUT) edits a specific subnet in the database
- `subnets/{subnets}` - (DELETE) removes a specific subnet from the database

### Equipment

- `equipment/` - (GET) returns all of the equipment information for dashboard view
- `equipment/{equipment}` - (GET) returns detailed information for the specific equipment
- `equipment/` - (POST) adds a equipment to the database
- `equipment/{equipment}` - (PUT) edits a specific equipment in the database
- `equipment/{equipment}` - (DELETE) removes a specific equipment from the database

### IP Addresses

- `ip/` - (GET) returns all ip addresses currently being used on this network
- `ip/{subnet_id}/next` - (GET) returns the next available ip address in the specified subnet
- `ip/{subnet_id}/check/{new_ip_address}` - (GET) returns TRUE if the new ip address entered is available, FALSE if it is not
- `ip/{subnet_id}` - (GET) returns all ip addresses currently in use within the specified subnet




