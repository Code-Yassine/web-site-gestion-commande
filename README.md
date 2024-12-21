# Gestion des Commandes

This project is a web-based application for managing clients, products, and orders. It includes functionalities for adding, editing, and deleting records, as well as user authentication.


## Files and Directories

- **client/**: Contains files related to client management.
  - add_client.php: Form to add a new client.
  - client.php: Displays the list of clients and handles client deletion.
  - edit_client.php: Form to edit an existing client.

- **commande/**: Contains files related to order management.
  - add_commande.php: Form to add a new order.
  - commande.php: Displays the list of orders and handles order deletion and updates.
  - edit_commande.php: Form to edit an existing order.
  - table2excel.js: Script to export table data to Excel.

- **produit/**: Contains files related to product management.
  - add_produit.php: Form to add a new product.
  - edit_produit.php: Form to edit an existing product.
  - produit.php: Displays the list of products and handles product deletion and updates.

- **login/**: Contains files related to user authentication.
  - connection.php: Handles user login.
  - deconnection.php: Handles user logout.
  - login.css: Styles for the login page.
  - login.php: Login form.

- **connect_sql.php**: Database connection script.
- **Add_Edit.css**: Styles for add and edit forms.
- **Lists.css**: Styles for list pages.
- **alert.js**: Script for displaying alerts.
- **alert_confirm_style.php**: Script for displaying confirmation dialogs.

## Usage

1. **Login**: Navigate to the login.php page and enter your credentials to log in.
2. **Manage Clients**: Use the client.php page to view, add, edit, or delete clients.
3. **Manage Products**: Use the produit.php page to view, add, edit, or delete products.
4. **Manage Orders**: Use the commande.php page to view, add, edit, or delete orders.

## Database

The project uses a MySQL database. The connection details are specified in the [`connect_sql.php`](connect_sql.php ) file.

