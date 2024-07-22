# main.py
from inventory import Inventory
from sales import Sales
from customer import Customer
from reporting import generate_report

def main():
    inventory = Inventory()
    sales = Sales(inventory)
    customer = Customer()

    # Add products to the database
    inventory.add_product("001", "Widget", 10.0, 100)
    inventory.add_product("002", "Gadget", 15.0, 50)

    # View products from the database
    products = inventory.view_products()
    print("Products in Inventory:")
    for product in products:
        print(product)

    # Process a sale
    sales.process_sale("001", 2)
    print(generate_report(sales.sales))

if __name__ == "__main__":
    main()
