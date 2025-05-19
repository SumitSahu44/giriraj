import React from 'react';
import { ShoppingBag, Home } from 'lucide-react';
import { Link } from 'react-router-dom';
import { useCart } from '../context/CartContext';
import logo from '../assets/giriraj.png';

const Navbar: React.FC = () => {
  const { items } = useCart();
  
  return (
    <header className="bg-white shadow-md">
      <div className="container mx-auto px-4 py-3">
        <div className="flex justify-between items-center">
          <Link to="/" className="flex items-center">
            <span className="text-xl font-serif font-bold bg-gradient-to-r w-[200px] from-amber-500 to-amber-700 bg-clip-text text-transparent">
              <img src={logo} alt="" />
            </span>
          </Link>
          
          <div className="flex items-center space-x-4">
            <Link to="/" className="text-gray-700 hover:text-amber-600 transition-colors">
              <Home size={20} />
            </Link>
            <Link to="/cart" className="text-gray-700 hover:text-amber-600 transition-colors relative">
              <ShoppingBag size={20} />
              {items.length > 0 && (
                <span className="absolute -top-2 -right-2 bg-amber-600 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                  {items.length}
                </span>
              )}
            </Link>
          </div>
        </div>
      </div>
    </header>
  );
};

export default Navbar;