# What is this project?
This is an online storefront and backend database created with PHP. 

## Prerequists for running this project
MAMP installed on your local machine with Apache Server and MySQL Server

## File and Directory Breakdown
### top level directory
Here are various front end elements of the web store and a file to include various functions:

mainPage.php - this is the homepage of the webstore, here a table is generated with the various products. The table will list the product ids, product name, product image, a description and the price of the product in norwegian crowns. The user can click on individual names of the products and the user will be directed to the product page of that item.

productPage.php - this page will display individual items. The product id, name, image, description and price will be displayed, the user on this page has the option to choose a quantity of the item they wish to purchase. By clicking on the add to cart button, 2 things are then achieved. 1. a cookie will be generated which will set to expire in 7 days. 2. a JSON file will be either modified or created to add the quantity or the new item into a JSON file. 

shoppingCart.php - on this page will be displayed an overview of the items in the cart. A table with the product name, item price, quantity in cart, and subtotal of each item will be presented. Following this, the total price of all items in the cart will be displayed as well. The user has the ability to submit their order by filling out their first name, last name, address, and country. These fields are currently not functional. However, on submission an order will be submitted under the default user_id of 1. 

adminPage.php - this page displays the items of the product table of the ecommerce database. The user can also show a table displaying current orders. The user can also add new items to the database. NOTE: the image field takes in a image url instead of file upload. (I liked this method better). Once an item is submitted, it will be saved in the product table of the database. The final functionality of the admin page is to delete items. The user can select through a dropdown menu and delete the item from the database.  


### classes folder
This folder contains the various classes for this project.
### data folder
This folder contains a text file to setup the mySql Database, and eventually a json file will be generated and stored in this folder. 

## Classes Explanation
### Database
The class of database is the superclass of the various classes. Here we have various methods which manipulates and aids to basic functionalities. 

connect() - This function helps to establish a connection to the mysql database. This returns the database connection.

disconnect() - Disconnects the function and takes in the argument of connection. 


### Order

### Product

### User

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









