import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import Button from '../components/Button';
import CartItem from '../components/CartItem';
import { useCart } from '../context/CartContext';
import { generatePDF } from '../utils/pdfGenerator';
import { FileText, ShoppingBag, ArrowLeft } from 'lucide-react';

const CartPage: React.FC = () => {
  const { items, removeItem, getTotal, clearCart } = useCart();
  const navigate = useNavigate();
  const [isGenerating, setIsGenerating] = useState(false);
  
  const handleGenerateBill = () => {
    setIsGenerating(true);
    setTimeout(() => {
      generatePDF(items);
      setIsGenerating(false);
    }, 1000);
  };
  
  if (items.length === 0) {
    return (
      <div className="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-4">
        <ShoppingBag size={64} className="text-gray-300 mb-4" />
        <h1 className="text-2xl font-medium text-gray-700 mb-2">Your cart is empty</h1>
        <p className="text-gray-500 mb-6">Add some beautiful jewelry to your cart</p>
        <Button onClick={() => navigate('/')}>
          Continue Shopping
        </Button>
      </div>
    );
  }
  
  return (
    <div className="min-h-screen bg-gray-50">
      <div className="container mx-auto px-4 py-8">
        <div className="flex justify-between items-center mb-8">
          <h1 className="text-3xl font-serif font-bold text-gray-800">
            Shopping Cart
          </h1>
          <Button 
            variant="outline" 
            onClick={() => navigate('/')}
            className="flex items-center gap-2"
          >
            <ArrowLeft size={16} />
            Continue Shopping
          </Button>
        </div>
        
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <div className="lg:col-span-2">
            <div className="space-y-4">
              {items.map((item) => (
                <CartItem
                  key={item.id}
                  item={item}
                  onRemove={removeItem}
                />
              ))}
            </div>
          </div>
          
          <div className="lg:col-span-1">
            <div className="bg-white rounded-lg shadow-md p-6 sticky top-4">
              <h2 className="text-xl font-medium text-gray-800 mb-4">Bill Summary</h2>
              
              {items.length > 0 && (
                <div className="mb-4">
                  <p className="text-gray-600 mb-2">Customer: {items[0].customer.name}</p>
                  <p className="text-gray-600">Phone: {items[0].customer.phone}</p>
                </div>
              )}
              
              <div className="border-t border-gray-200 pt-4 mb-4">
                <div className="space-y-2">
                  {items.map((item) => (
                    <div key={item.id} className="flex justify-between">
                      <span className="text-gray-600">
                        {item.type} ({item.category === 'gold' ? 'Gold' : 'Silver'})
                      </span>
                      <span className="font-medium">₹{item.total.toFixed(2)}</span>
                    </div>
                  ))}
                </div>
              </div>
              
              <div className="border-t border-gray-200 pt-4 mb-6">
                <div className="flex justify-between items-center text-lg font-bold">
                  <span>Total Amount</span>
                  <span>₹{getTotal().toFixed(2)}</span>
                </div>
              </div>
              
              <div className="space-y-3">
                <Button
                  className="w-full flex items-center justify-center gap-2"
                  onClick={handleGenerateBill}
                  disabled={isGenerating}
                >
                  {isGenerating ? (
                    <span>Generating...</span>
                  ) : (
                    <>
                      <FileText size={18} />
                      Generate Bill
                    </>
                  )}
                </Button>
                
                <Button
                  variant="outline"
                  className="w-full"
                  onClick={() => clearCart()}
                >
                  Clear Cart
                </Button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default CartPage;