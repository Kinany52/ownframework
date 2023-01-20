# ownframework
My own framework following the common MVC software architectural pattern.

The framework has a Model-View-Controller design, with a front controller as 
the only access into the application software for security reason. Database and router
are also defined for the framework. The database server, being MySQL/MariaDB, is under 
the abstact layer of PDO to make it further secure as well as to facilitatequerying. 
The DB, extending the PDO class and representing a connection between PHP anda database 
server: https://www.php.net/manual/en/class.pdo.php, implements the Singleton design pattern 
to limit single instances. The router is equipped with security measures to protect 
against XSS while implementing single responsibility principle. This framework is inspired 
by the lectures of Spain-based web application developer and IT trainer, Dave Holligworth.
