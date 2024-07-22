# inventory.py
import mysql.connector
from mysql.connector import Error

class Inventory:
    def __init__(self):
        self.connection_config = {
            'host': 'localhost',
            'database': 'shopkeeper',
            'user': 'root',
            'password': 'Jaymoses_#942'  
        }

    def _execute_query(self, query, params=()):
        try:
            conn = mysql.connector.connect(**self.connection_config)
            cursor = conn.cursor()
            cursor.execute(query, params)
            conn.commit()
        except Error as e:
            print(f"Error: {e}")
        finally:
            if conn.is_connected():
                cursor.close()
                conn.close()

    def add_product(self, product_id, name, price, quantity):
        query = '''
            INSERT INTO products (product_id, name, price, quantity)
            VALUES (%s, %s, %s, %s)
            ON DUPLICATE KEY UPDATE
                name = VALUES(name),
                price = VALUES(price),
                quantity = VALUES(quantity)
        '''
        self._execute_query(query, (product_id, name, price, quantity))

    def update_product(self, product_id, **kwargs):
        set_clause = ', '.join(f"{key} = %s" for key in kwargs)
        query = f'UPDATE products SET {set_clause} WHERE product_id = %s'
        self._execute_query(query, (*kwargs.values(), product_id))

    def delete_product(self, product_id):
        query = 'DELETE FROM products WHERE product_id = %s'
        self._execute_query(query, (product_id,))

    def view_products(self):
        try:
            conn = mysql.connector.connect(**self.connection_config)
            cursor = conn.cursor()
            cursor.execute('SELECT * FROM products')
            products = cursor.fetchall()
            return products
        except Error as e:
            print(f"Error: {e}")
            return []
        finally:
            if conn.is_connected():
                cursor.close()
                conn.close()
