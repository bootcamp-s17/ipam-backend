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
- Change Directory into ipam-backend and open it, $ subl .
- $ createdb ipam_back 
- $ psql ipam_back
- $ CREATE USER ipam_back WITH PASSWORD 'ipam_back';
- Set up database connections. 
	- Open .env.example and copy it's contents.
	- In the terminal create .env file, $ touch .env
	- Open in .env in sublime and paste contents.  
	- Set DB_DATABASE, DB_USERNAME, DB_PASSWORD and DB_CONNECTION to "ipam_back"
	- Set port to 5432. 
	- Generate APP_KEY by typing "php artisan key:generate"
- $ composer update
- $ npm install   
- $ php artisan migrate
- $ php artisan db:seed

## API Endpoints

### Sites

- `sites/` - (GET) returns all of the site information for dashboard view
- `sites/{sites}` - (GET) returns detailed information for a specific site
- `sites/` - (POST) adds a site to the database
- `sites/{sites}` - (PUT) edits a specific site in the database
- `sites/{sites}` - (DELETE) removes a specific site from the database

- `subnets/` - (GET) returns all of the subnet information for dashboard view
- `subnets/{subnets}` - (GET) returns detailed information for a specific subnet
- `subnets/` - (POST) adds a subnet to the database
- `subnets/{subnets}` - (PUT) edits a specific subnet in the database
- `subnets/{subnets}` - (DELETE) removes a specific subnet from the database

- `equipment/` - (GET) returns all of the equipment information for dashboard view
- `equipment/{equipment}` - (GET) returns detailed information for the specific equipment
- `equipment/` - (POST) adds a equipment to the database
- `equipment/{equipment}` - (PUT) edits a specific equipment in the database
- `equipment/{equipment}` - (DELETE) removes a specific equipment from the database