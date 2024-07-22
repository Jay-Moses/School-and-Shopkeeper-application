# sales.py
from inventory import Inventory

class Sales:
    def __init__(self, inventory):
        self.inventory = inventory
        self.sales = []

    def process_sale(self, product_id, quantity):
        product = self.inventory.view_products().get(product_id)
        if product and product['quantity'] >= quantity:
            total_price = product['price'] * quantity
            self.sales.append({"product_id": product_id, "quantity": quantity, "total_price": total_price})
            self.inventory.update_product(product_id, quantity=product['quantity'] - quantity)
            return total_price
        else:
            return "Not enough inventory"
