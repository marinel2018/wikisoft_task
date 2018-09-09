# wikisoft_task

Admin panel to manage companies
•	Basic Laravel Auth: ability to log in as administrator
•	Use database seeds to create first user with email admin@admin.com and password “password”
•	CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and emploees.
•	Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
•	emploees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone
•	Use database migrations to create those schemas above
•	Store companies logos in storage/app/public folder and make them accessible from public
•	Use basic Laravel resource controllers with default methods – index, create, store etc.
•	Use Laravel’s validation function, using Request classes
•	Use Laravel’s pagination for showing Companies/emploees list, 10 entries per page
•	Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register

Extra features 
•	Use Datatables.net library to show table – with our without server-side rendering
•	Email notification: send email whenever new company is entered (use Mailgun or Mailtrap)
•	Make the project multi-language (using resources/lang folder)
