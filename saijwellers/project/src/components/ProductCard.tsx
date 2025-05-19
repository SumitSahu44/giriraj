import React from 'react';

interface ProductCardProps {
  name: string;
  image: string;
  onClick: () => void;
}

const ProductCard: React.FC<ProductCardProps> = ({ name, image, onClick }) => {
  return (
    <div 
      className="relative overflow-hidden rounded-lg shadow-md cursor-pointer transition-all duration-300
                hover:shadow-lg group bg-white"
      onClick={onClick}
    >
      <div className="relative h-48 overflow-hidden">
        <img 
          src={image} 
          alt={name} 
          className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
        />
        <div className="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      </div>
      
      {/* Shimmer effect */}
      <div className="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
      
      <div className="p-4 text-center">
        <h3 className="text-lg font-medium text-gray-800">{name}</h3>
      </div>
    </div>
  );
};

export default ProductCard;