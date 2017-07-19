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
- $ php artisan migrate
- $ php artisan db:seed

