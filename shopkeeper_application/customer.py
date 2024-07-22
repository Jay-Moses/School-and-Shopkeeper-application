# customer.py
class Customer:
    def __init__(self):
        self.customers = {}

    def add_customer(self, customer_id, name, contact_info):
        self.customers[customer_id] = {"name": name, "contact_info": contact_info}

    def view_customers(self):
        return self.customers

