import React from 'react';

interface CardProps {
  title: string;
  image: string;
  onClick: () => void;
  category?: 'gold' | 'silver';
}

const Card: React.FC<CardProps> = ({ title, image, onClick, category }) => {
  const cardStyle = category === 'gold' 
    ? 'bg-gradient-to-br from-amber-200 to-yellow-500 border-amber-500' 
    : category === 'silver' 
      ? 'bg-gradient-to-br from-gray-200 to-gray-400 border-gray-500'
      : 'bg-white';
  
  const textStyle = category ? 'text-gray-800 font-serif' : 'text-gray-800';
  
  return (
    <div 
      className={`${cardStyle} rounded-xl shadow-lg border overflow-hidden 
      transform transition-transform duration-300 hover:scale-105 hover:shadow-xl
      cursor-pointer max-w-xs w-full mx-auto`}
      onClick={onClick}
    >
      <div className="relative h-48 overflow-hidden">
        <img 
          src={image} 
          alt={title} 
          className="w-full h-full object-cover object-center transition-transform duration-500 hover:scale-110"
        />
        <div className="absolute inset-0 bg-black bg-opacity-30 flex items-end">
          <h3 className={`${textStyle} text-2xl font-bold p-4 text-white w-full text-center backdrop-blur-sm bg-black bg-opacity-30`}>
            {title}
          </h3>
        </div>
      </div>
    </div>
  );
};

export default Card;