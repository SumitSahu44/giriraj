import { jsPDF } from 'jspdf';
import autoTable from 'jspdf-autotable';
import { CartItem } from '../types';
import logo from '../assets/giriraj.png'; // <-- import logo image

export const generatePDF = (items: CartItem[]): void => {
  const doc = new jsPDF();

  // ✅ Add logo image (top-left corner)
  doc.addImage(logo, 'PNG', 14, 10, 30, 15); // (image, type, x, y, width, height)

  // Add title
  doc.setFontSize(20);
  doc.text('Jewelry Bill', 105, 15, { align: 'center' });

  // Customer info
  if (items.length > 0) {
    const customer = items[0].customer;
    doc.setFontSize(12);
    doc.text(`Customer: ${customer.name}`, 14, 30);
    doc.text(`Phone: ${customer.phone}`, 14, 38);
  }

  // Date
  const today = new Date().toLocaleDateString();
  doc.text(`Date: ${today}`, 14, 46);

  // Item table
  const tableColumn = ['Item Type', 'Category', 'Weight (g)', 'Price/g', 'Making', 'Discount %', 'GST', 'Total'];
  const tableRows = items.map(item => [
    item.type,
    item.category.charAt(0).toUpperCase() + item.category.slice(1),
    item.weight.toString(),
    `₹${item.pricePerGram.toFixed(2)}`,
    `₹${item.makingCharges.toFixed(2)}`,
    `${item.discount}%`,
    `₹${item.gst.toFixed(2)}`,
    `₹${item.total.toFixed(2)}`
  ]);

  autoTable(doc, {
    head: [tableColumn],
    body: tableRows,
    startY: 55,
    theme: 'striped',
    styles: { fontSize: 10, cellPadding: 3 }
  });

  // Total
  const finalY = (doc as any).lastAutoTable.finalY + 10;
  const total = items.reduce((sum, item) => sum + item.total, 0);
  doc.setFontSize(12);
  doc.setFont('helvetica', 'bold');
  doc.text(`Total Amount: ₹${total.toFixed(2)}`, 150, finalY, { align: 'right' });

  // Footer
  doc.setFont('helvetica', 'normal');
  doc.setFontSize(10);
  doc.text('Thank you for your purchase!', 105, finalY + 15, { align: 'center' });

  // Save the PDF
  doc.save('jewelry-bill.pdf');
};
