import React from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import ProductCard from '../components/ProductCard';
import { PRODUCT_TYPES } from '../data/jewelry';
import Button from '../components/Button';

const ProductTypesPage: React.FC = () => {
  const { category } = useParams<{ category: string }>();
  const navigate = useNavigate();
  
  const categoryTitle = category === 'gold' ? 'Gold' : 'Silver';
  
  return (
    <div className="min-h-screen bg-gray-50">
      <div className="container mx-auto px-4 py-8">
        <div className="flex justify-between items-center mb-8">
          <h1 className="text-3xl font-serif font-bold text-gray-800">
            {categoryTitle} Jewelry Collection
          </h1>
          <Button 
            variant="outline" 
            onClick={() => navigate('/')}
          >
            Back to Categories
          </Button>
        </div>
        
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {PRODUCT_TYPES.map((product) => (
            <ProductCard
              key={product.name}
              name={product.name}
              image={product.image}
              onClick={() => navigate(`/product-form/${category}/${product.name}`)}
            />
          ))}
        </div>
      </div>
    </div>
  );
};

export default ProductTypesPage;