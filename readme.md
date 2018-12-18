

        Application Deployment Guide :
		
		Step 1.  Edit .env file and please change this following variable :
		
					APP_URL = PUT ACTUAL DOMAIN URL
			
					DB_HOST = [HOST NAME]
					DB_PORT = [HOST DB PORT]
					DB_DATABASE = [ PICK / MAKE ANY EMPTY DATABASE AND PUT THE DATABASE NAME HERE. ]
					DB_USERNAME = [ HOST DB USER NAME ]
					DB_PASSWORD = [ HOST DB PASSWORD ]
			
		Step 2.  If there is a possibility to run composer then it is required to follow the command below :
		
		           composer install [ This Command should run in actual laravel folder. ] 
				  
		
		Step 3.  Database Migration to do it follow the following command 
		
		            php artisan migrate
				   
				   
		Step 4.	 Fill the tables with data that needs to make it work properly. To do it follow this following command 
		
		            php artisan db:seed
				   
		
		Step 5.  A test Html, Css and js has given for testing purpose in example folder. 
		
					Note : 
