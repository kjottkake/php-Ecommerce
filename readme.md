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



