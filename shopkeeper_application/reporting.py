# reporting.py
def generate_report(sales):
    total_sales = sum(sale['total_price'] for sale in sales)
    return f"Total Sales: {total_sales}"
