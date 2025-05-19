import React from 'react';
import { useNavigate } from 'react-router-dom';
import Card from '../components/Card';

const HomePage: React.FC = () => {
  const navigate = useNavigate();
  
  return (
    <div className="min-h-screen bg-gradient-to-b from-white to-gray-100">
      <div className="container mx-auto px-4 py-8">
        <div className="text-center mb-12">
          <h1 className="text-4xl md:text-5xl font-serif font-bold text-gray-800 mb-4">
            Luxury Jewelry
          </h1>
          <p className="text-lg text-gray-600 max-w-2xl mx-auto">
            Explore our exclusive collection of fine jewelry crafted with precision and elegance.
          </p>
        </div>
        
        <div className="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16 max-w-4xl mx-auto">
          <Card 
            title="Gold Jewelry" 
            image="https://images.unsplash.com/photo-1610375461246-83df859d849d?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z29sZHxlbnwwfHwwfHx8MA%3D%3D"
            onClick={() => navigate('/products/gold')}
            category="gold"
          />
          
          <Card 
            title="Silver Jewelry" 
            image="https://media.istockphoto.com/id/468068368/photo/stack-of-shiny-silver-bars-inside-a-bank-vault.jpg?s=612x612&w=0&k=20&c=Ih6RWZBoJL_zPABbjHV1aJ2EZpcrliruDDGpr3G9y0Q=" 
            onClick={() => navigate('/products/silver')}
            category="silver"
          />
        </div>
      </div>
    </div>
  );
};

export default HomePage;