# What is this project?
This is an online storefront and backend database created with PHP. 

# Project Features In a Nutshell
Main Page where users get an overview of products.

Admin Page where users gets an overview of products, form to create new products, basic validation of form data (but no feedback), the option to delete items from database, and lastly, a table which displays current orders

Product Page where specific information about a product is displayed. The user can select quantity and add the item to the cart. 

Shopping Cart Page is where details about the contents of the shopping cart is displayed. 

Login Page creates 1 admin account and allows for basic creation of user accounts. A more thorough implementation was not created such as checking if an account exists. A basic mysql validation was also implemented. 

## Other project features
PHP constructions such as expressions and loops.

Functions, arrays and objects.

File management and JSON datastructure.

Forms handling.

HTTP GET and POST 

mySQL and PHP for database handling.

Sessions, Cookies, and basic security measures. 

## Prerequists for running this project
MAMP installed on your local machine with Apache Server and MySQL Server

## File and Directory Breakdown
### top level directory
Here are various front end elements of the web store and a file to include various functions:

mainPage.php - this is the homepage of the webstore, here a table is generated with the various products. The table will list the product ids, product name, product image, a description and the price of the product in norwegian crowns. The user can click on individual names of the products and the user will be directed to the product page of that item.

productPage.php - this page will display individual items. The product id, name, image, description and price will be displayed, the user on this page has the option to choose a quantity of the item they wish to purchase. By clicking on the add to cart button, 2 things are then achieved. 1. a cookie will be generated which will set to expire in 7 days. 2. a JSON file will be either modified or created to add the quantity or the new item into a JSON file. 

shoppingCart.php - on this page will be displayed an overview of the items in the cart. A table with the product name, item price, quantity in cart, and subtotal of each item will be presented. Following this, the total price of all items in the cart will be displayed as well. The user has the ability to submit their order by filling out their first name, last name, address, and country. These fields are currently not functional. However, on submission an order will be submitted under the default user_id of 1. 

adminPage.php - this page displays the items of the product table of the ecommerce database. The user can also show a table displaying current orders. The user can also add new items to the database. NOTE: the image field takes in a image url instead of file upload. (I liked this method better). Once an item is submitted, it will be saved in the product table of the database. The final functionality of the admin page is to delete items. The user can select through a dropdown menu and delete the item from the database.  

functions.php - This is many of the helper functions used throughout the project. 

### classes folder
This folder contains the various classes for this project.
### data folder
This folder contains a text file to setup the mySql Database, and eventually a json file will be generated and stored in this folder. 

## Classes Explanation
### Database
The class of database is the superclass of the various classes. Here we have various methods which manipulates and aids to basic functionalities. 

connect() - This function helps to establish a connection to the mysql database. This returns the database connection.

disconnect() - Disconnects the function and takes in the argument of connection. 

readFromTable($tableName) - Takes in the arguement tableName, establishes a connection and puts the resulting rows of data into an array. 

deleteRowInDB($table, $column) - This function deletes rows of data in the database. This function has not been used in the project.

showListOfOrders() - This function establishes a connection and joins the data from two tables to create a new table of data. This returns the results in an array. 



### Order
addOrder($customer_id, $id, $quantity) - This function takes in the customer id, id, and quantity as arguements. Establishes a connection, and inserts the new order which has been created into the database.

getTime() - This gets the time in milliseconds 

getQuantity() - This function gets the quantity of item the user has submitted. 

assembleOrder($customer_id, $id, $quantity) - This function takes in the arguments customer id, id, and quantity and calls on the previously protected function addOrder of the Order class. 

generateJSON($id) - This function does a variety of things. Mainly it checks to see if a JSON file has been created, if it has not been created, it will create a JSON file with the appropriate data. If a JSON file is there from before, it will then check for duplicate entries of the same data, and update the quantity of the items in the shopping cart. 

setCookie() - This sets a cookie, and sets it to expire in 7 days

### Product
addProductToDB() - This function establishes a connection, and adds the data the user submitted from the form into the database. 

deleteProduct() - This method calls on the deleteRowInDB method of the superclass Database and deletes a row of data from the database.

displayProducts($resArray) - This method takes the argument resArray and formats the data into a table and displays it on the page. 

getIndividualItem($item_id) - This method establishes a connection and uses the arguement item_id to get the data from just 1 row of the products table. The row of data returned is the individual product with the id item_id.

readTable($tableName) - This method takes in the argument tableName and calls on the protected method of readFromTable and returns the table data.

displayOrders() - Calls upon the showListOfOrders from the Database superclass and returns the table data. 

getNewItem() - Calls upon the addProductsToDB protected method 

getValue($id, $name) - This method takes in the arugments id and name and returns the specific value of a particular field from a table based on the id of that product. 



### User
createAdmin() - This method is called on when the user clicks on the login/create account page for the first time. It establishes connection and creates an entry of the user with the username admin, with the password of '0admin0' and email of 'admin@ecommerce.com' along with the id of 420 and a role of 0 signifying it is an admin account


addUser() - This method adds a user account to the database from the data submitted via the posting of the form data. 

createUser() - This calls on the protected method addUser method

genAdmin() - this calls on the protected method createAdmin

fixString($str) - This takes in the argument str and removes any html entities. This serves as a basic security measurments against SQL injection. 

## Testing Instructions
First put the ecommerce folder into your htdocs folder or equivalent for MAMP.

Next establish the database by navigating to 

http://localhost/phpMyAdmin/index.php

Then create the database using the DB.txt file provided in the data folder
NOTE: I have changed the following to fit my data values better:
Changed int(20) to int(32) for time in orders table 
Changed varchar(32) to varchar(256) for image_name 

Now you have a database which is formatted.

I suggest you then go into the admin page and begin adding products.

I have the following suggested test values:

Product name:
Nike Shoes
Image Url:
https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80
Description:
Shoes
Price:
2000

Product name:
Adidas
Image Url:
https://images.unsplash.com/flagged/photo-1556637640-2c80d3201be8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80
Description:
Cool shoes 
Price:
1500

Product name:
Chanel Nr. 5
Image Url:
https://images.unsplash.com/photo-1541643600914-78b084683601?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1904&q=80
Description:
Smells good
Price:
3456

Once these have been added, feel free to test out the deletion option. 

From here please navigate to the main page, and test out individual pages by clicking on individual items.

With the individual items you can test out adding them to the shopping cart. A JSON file called shoppingCart.json will be created in the data folder. 

The shopping cart page will display the number of items in the cart, the sub total, and the total. 

The shopping cart link in the navbar will also display the number of items in the cart.

Once the user clicks 'submit order' a order will be created, the shoppping cart will clear the JSON file and clear the results in the cart page.











