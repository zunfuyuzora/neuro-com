#Environment

##Preparation
1. git clone https://github.com/zunkazaragi/neuro-com
2. composer update
3. copy .env.example and paste to .env
4. edit .env file for database access 
5. run php artisan key:generate

##For Storage Link
1. run php artisan storage:link

##For Database Migration & Seeding
1. run php artisan migrate
2. run php artisan db:seed

#Serving the Apps on local server

##Running the server 
1. run php artisan serve

##Running websocket for realtime chatting feature
1. run php artisan websocket:init