import React from 'react';
import { Trash2 } from 'lucide-react';
import { CartItem as CartItemType } from '../types';

interface CartItemProps {
  item: CartItemType;
  onRemove: (id: string) => void;
}

const CartItem: React.FC<CartItemProps> = ({ item, onRemove }) => {
  return (
    <div className="border border-gray-200 rounded-md p-4 mb-4 bg-white shadow-sm">
      <div className="flex justify-between items-center">
        <div>
          <h3 className="font-medium text-gray-800">
            {item.type} - {item.category === 'gold' ? 'Gold' : 'Silver'}
          </h3>
          <div className="mt-1 text-sm text-gray-600">
            <p>Weight: {item.weight}g</p>
            <p>Price per gram: ₹{item.pricePerGram.toFixed(2)}</p>
            <p>Making charges: ₹{item.makingCharges.toFixed(2)}</p>
            {item.discount > 0 && <p>Discount: {item.discount}%</p>}
          </div>
        </div>
        
        <div className="flex flex-col items-end">
          <span className="font-bold text-gray-900">₹{item.total.toFixed(2)}</span>
          <span className="text-xs text-gray-500">GST: ₹{item.gst.toFixed(2)}</span>
          <button 
            className="mt-2 text-red-500 hover:text-red-700 transition-colors"
            onClick={() => onRemove(item.id)}
          >
            <Trash2 size={18} />
          </button>
        </div>
      </div>
    </div>
  );
};

export default CartItem;