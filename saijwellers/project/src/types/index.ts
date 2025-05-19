export interface Customer {
  name: string;
  phone: string;
}

export interface JewelryItem {
  id: string;
  type: string;
  category: 'gold' | 'silver';
  weight: number;
  pricePerGram: number;
  makingCharges: number;
  discount: number;
  gst: number;
  total: number;
}

export interface CartItem extends JewelryItem {
  customer: Customer;
}