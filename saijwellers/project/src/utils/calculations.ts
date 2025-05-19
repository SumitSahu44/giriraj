// Calculate GST (3%)
export const calculateGST = (amount: number): number => {
  return amount * 0.03;
};

// Calculate total price
export const calculateTotal = (
  weight: number,
  pricePerGram: number,
  makingCharges: number,
  discount: number
): number => {
  const subtotal = weight * pricePerGram + makingCharges;
  const discountAmount = subtotal * (discount / 100);
  const afterDiscount = subtotal - discountAmount;
  const gst = calculateGST(afterDiscount);
  return afterDiscount + gst;
};