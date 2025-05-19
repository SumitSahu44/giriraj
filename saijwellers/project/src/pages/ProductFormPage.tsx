import React, { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import Input from '../components/Input';
import Button from '../components/Button';
import { useCart } from '../context/CartContext';
import { GOLD_PRICE_PER_GRAM, SILVER_PRICE_PER_GRAM } from '../data/jewelry';
import { calculateGST, calculateTotal } from '../utils/calculations';

const ProductFormPage: React.FC = () => {
  const { category, productType } = useParams<{ category: string; productType: string }>();
  const navigate = useNavigate();
  const { addItem } = useCart();
  
  // Customer state
  const [customer, setCustomer] = useState({ name: '', phone: '' });
  
  // Product state
  const [weight, setWeight] = useState(0);
  const [pricePerGram, setPricePerGram] = useState(0);
  const [makingCharges, setMakingCharges] = useState(0);
  const [discount, setDiscount] = useState(0);
  
  // Calculated values
  const [gst, setGst] = useState(0);
  const [total, setTotal] = useState(0);
  
  // Form validation
  const [errors, setErrors] = useState({
    name: '',
    phone: '',
    weight: ''
  });
  
  // Set default price per gram based on category
  useEffect(() => {
    if (category === 'gold') {
      setPricePerGram(GOLD_PRICE_PER_GRAM);
    } else if (category === 'silver') {
      setPricePerGram(SILVER_PRICE_PER_GRAM);
    }
  }, [category]);
  
  // Calculate GST and total when values change
  useEffect(() => {
    if (weight > 0 && pricePerGram > 0) {
      const subtotal = weight * pricePerGram + makingCharges;
      const discountAmount = subtotal * (discount / 100);
      const afterDiscount = subtotal - discountAmount;
      const calculatedGst = calculateGST(afterDiscount);
      
      setGst(calculatedGst);
      setTotal(afterDiscount + calculatedGst);
    } else {
      setGst(0);
      setTotal(0);
    }
  }, [weight, pricePerGram, makingCharges, discount]);
  
  const validateForm = (): boolean => {
    const newErrors = {
      name: '',
      phone: '',
      weight: ''
    };
    let isValid = true;
    
    if (!customer.name.trim()) {
      newErrors.name = 'Name is required';
      isValid = false;
    }
    
    if (!customer.phone.trim()) {
      newErrors.phone = 'Phone number is required';
      isValid = false;
    } else if (!/^\d{10}$/.test(customer.phone)) {
      newErrors.phone = 'Please enter a valid 10-digit phone number';
      isValid = false;
    }
    
    if (weight <= 0) {
      newErrors.weight = 'Weight must be greater than 0';
      isValid = false;
    }
    
    setErrors(newErrors);
    return isValid;
  };
  
  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    
    if (!validateForm()) return;
    
    const newItem = {
      id: Date.now().toString(),
      type: productType || '',
      category: category as 'gold' | 'silver',
      weight,
      pricePerGram,
      makingCharges,
      discount,
      gst,
      total,
      customer
    };
    
    addItem(newItem);
    navigate('/cart');
  };
  
  return (
    <div className="min-h-screen bg-gray-50">
      <div className="container mx-auto px-4 py-8">
        <div className="bg-white rounded-lg shadow-md p-6 max-w-3xl mx-auto">
          <h1 className="text-2xl font-serif font-bold text-gray-800 mb-6">
            Add {category === 'gold' ? 'Gold' : 'Silver'} {productType}
          </h1>
          
          <form onSubmit={handleSubmit}>
            <div className="mb-6">
              <h2 className="text-xl font-medium text-gray-700 mb-4">Customer Details</h2>
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <Input
                  id="customer-name"
                  label="Customer Name"
                  value={customer.name}
                  onChange={(e) => setCustomer({ ...customer, name: e.target.value })}
                  required
                  error={errors.name}
                />
                
                <Input
                  id="customer-phone"
                  label="Phone Number"
                  type="tel"
                  value={customer.phone}
                  onChange={(e) => setCustomer({ ...customer, phone: e.target.value })}
                  required
                  error={errors.phone}
                />
              </div>
            </div>
            
            <div className="mb-6">
              <h2 className="text-xl font-medium text-gray-700 mb-4">Product Details</h2>
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <Input
                  id="weight"
                  label="Weight (grams)"
                  type="number"
                  value={weight || ''}
                  onChange={(e) => setWeight(parseFloat(e.target.value))}
                  required
                  min={0.1}
                  step="0.01"
                  error={errors.weight}
                />
                
                <Input
                  id="price-per-gram"
                  label="Price Per Gram (₹)"
                  type="number"
                  value={pricePerGram || ''}
                  onChange={(e) => setPricePerGram(parseFloat(e.target.value))}
                  required
                  min={1}
                  step="0.01"
                />
                
                <Input
                  id="making-charges"
                  label="Making Charges (₹)"
                  type="number"
                  value={makingCharges || ''}
                  onChange={(e) => setMakingCharges(parseFloat(e.target.value))}
                  min={0}
                  step="0.01"
                />
                
                <Input
                  id="discount"
                  label="Discount (%)"
                  type="number"
                  value={discount || ''}
                  onChange={(e) => setDiscount(parseFloat(e.target.value))}
                  min={0}
                  max={100}
                  step="0.01"
                />
              </div>
            </div>
            
            <div className="mb-6 bg-gray-50 p-4 rounded-md">
              <h2 className="text-xl font-medium text-gray-700 mb-4">Price Summary</h2>
              <div className="grid grid-cols-2 gap-2">
                <div className="text-gray-600">Base Price:</div>
                <div className="text-right font-medium">₹{(weight * pricePerGram).toFixed(2)}</div>
                
                <div className="text-gray-600">Making Charges:</div>
                <div className="text-right font-medium">₹{makingCharges.toFixed(2)}</div>
                
                {discount > 0 && (
                  <>
                    <div className="text-gray-600">Discount ({discount}%):</div>
                    <div className="text-right font-medium text-red-600">
                      -₹{((weight * pricePerGram + makingCharges) * (discount / 100)).toFixed(2)}
                    </div>
                  </>
                )}
                
                <div className="text-gray-600">GST (3%):</div>
                <div className="text-right font-medium">₹{gst.toFixed(2)}</div>
                
                <div className="text-gray-800 font-bold text-lg">Total:</div>
                <div className="text-right font-bold text-lg">₹{total.toFixed(2)}</div>
              </div>
            </div>
            
            <div className="flex justify-end space-x-4">
              <Button
                variant="outline"
                onClick={() => navigate(`/products/${category}`)}
              >
                Cancel
              </Button>
              
              <Button type="submit">
                Add to Cart
              </Button>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};

export default ProductFormPage;